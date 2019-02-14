<?php

namespace App\Http\Controllers;

use App\Anuidade;
use App\Contato;
use App\Documento;
use App\Empresa;
use App\Http\Requests\ColaboradorRequest;
use App\Http\Requests\DependenteRequest;
use App\Http\Requests\PacientesRequest;
use Illuminate\Support\Facades\Request as CVXRequest;
use App\User;
use App\VigenciaPaciente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Cidade;
use App\Endereco;
use App\Paciente;
use App\Atendimento;
use App\Agendamento;

/**
 * @author Frederico Cruz <frederico.cruz@s1saude.com.br>
 *
 */
class PacienteController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $action = Route::current();
            $action_name = $action->action['as'];

            $this->middleware("cvx:$action_name");
        } catch (\Exception $e) {}
    }

    /**
     * Método para mostrar a página de cadastro do paciente
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(){
        $arCargos        = \App\Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
        $arEstados       = \App\Estado::orderBy('ds_estado')->get();
        $arEspecialidade = \App\Especialidade::orderBy('ds_especialidade')->get();

        return view('paciente', ['arEstados' => $arEstados,
                                 'arCargos'=> $arCargos,
                                 'arEspecialidade'=>$arEspecialidade]);
    }

	/**
	 * Show the form for modal creating the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function createColaboradorModal($idEmpresa)
	{
		$modelEmpresa = Empresa::findOrFail($idEmpresa);

		$model = new Paciente();
		$model->empresa_id = $modelEmpresa->id;

		$anuidades = $modelEmpresa->anuidades()->where('cs_status', 'A')->whereNull('deleted_at')->get();

		return view('pacientes.modalCreateColaborador', compact('model', 'anuidades'));
	}

	/**
	 * Show the form for modal creating the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function createDependenteModal($idTitular, $idEmpresa)
	{
		$modelPaciente = Paciente::findOrFail($idTitular);
		$modelEmpresa = Empresa::findOrFail($idEmpresa);

		$model = new Paciente();
		$model->responsavel_id = $modelPaciente->id;
		$model->empresa_id = $modelEmpresa->id;

		$anuidades = $modelEmpresa->anuidades()->where('cs_status', 'A')->whereNull('deleted_at')->get();

		return view('pacientes.modalCreateDependente', compact('model', 'modelPaciente', 'anuidades'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ColaboradorRequest $request)
	{
		$access_token = UtilController::getAccessToken();
		$time_to_live = date('Y-m-d H:i:s');
		$dados = $request->all();

		########### STARTING TRANSACTION ############
		DB::beginTransaction();
		#############################################

		try {
			$validaPessoa = Paciente::validaPessoa($dados['email'], Documento::TP_CPF, $dados['cpf'], Contato::TP_CEL_PESSOAL, $dados['telefone']);

			/** Pessoa não cadastrada no sistema */
			if($validaPessoa['status']) {
				//Cria um pessoa
				$user 					= new User();
				$user->name 			= strtoupper($dados['nm_primario'].' '.$dados['nm_secundario']);
				$user->email 			= $dados['email'];
				$user->password 		= bcrypt(uniqid('empresa@newSenha'));
				$user->tp_user 			= 'COL';
				$user->cs_status 		= 'A';
				$user->avatar 			= 'users/default.png';
				$user->save();

				$paciente = new Paciente();
				$paciente->user_id 		= $user->id;
				$paciente->nm_primario 	= $dados['nm_primario'];
				$paciente->nm_secundario = $dados['nm_secundario'];
				$paciente->cs_sexo 		= $dados['cs_sexo'];
				$paciente->dt_nascimento = $dados['dt_nascimento'];
				$paciente->access_token = $access_token;
				$paciente->time_to_live = date('Y-m-d H:i:s', strtotime($time_to_live . '+2 hour'));
				$paciente->save();

				$documento = new Documento();
				$documento->tp_documento = Documento::TP_CPF;
				$cpf 					= UtilController::retiraMascara($dados['cpf']);
				$documento->te_documento = $cpf;
				$documento->save();

				$contato = new Contato();
				$contato->tp_contato 	= Contato::TP_CEL_PESSOAL;
				$contato->ds_contato 	= $dados['telefone'];
				$contato->save();

				if(!$paciente->documentos->contains($documento->id)) $paciente->documentos()->attach($documento->id);
				if(!$paciente->contatos->contains($contato->id)) $paciente->contatos()->attach($contato->id);
			} else {
				$documento_obj = new DocumentoController();
				$dadosPaciente = $documento_obj->getUserByCpf($dados['cpf'])->getData();

				if(!$dadosPaciente->status) {
					DB::rollback();
					return response()->json([
						'message' => $validaPessoa['mensagem'],
					], 500);
				}

				$user = User::findOrFail($dadosPaciente->pessoa->user_id);
				$paciente = Paciente::getPacienteByUserId($user->id);
				$documento = Documento::findOrFail($dadosPaciente->pessoa->documento_id);
				$contato = Contato::findOrFail($dadosPaciente->pessoa->contato_id);

				$vigencias = $paciente->vigenciaPacientes()->with(['anuidade'])
					->whereHas('anuidade', function($query) use($dados) {
						$query->where('empresa_id', $dados['empresa_id']);
					})
					->where(function($query) {
						$query->where('data_inicio', '<=', date('Y-m-d H:i:s'))
							->where('data_fim', '>=', date('Y-m-d H:i:s'))
							->orWhere(DB::raw('cobertura_ativa'), '=', true);
					});

				/** Colaborador já cadastrado na empresa **/
				if($vigencias->exists()) {
					DB::rollback();
					return response()->json([
						'message' => 'Colaborador já cadastrado na empresa.',
					], 401);
				}

				if($user) {
					$user->email = $dados['email'];
					$user->save();
				}

				if(!$paciente) {
					$paciente = new Paciente();
					$paciente->user_id 		= $user->id;
					$paciente->nm_primario 	= $dadosPaciente->pessoa->nm_primario;
					$paciente->nm_secundario = $dadosPaciente->pessoa->nm_secundario;
					$paciente->cs_sexo 		= $dadosPaciente->pessoa->cs_sexo;
					$paciente->dt_nascimento = $dadosPaciente->pessoa->dt_nascimento;
					$paciente->access_token = $access_token;
					$paciente->time_to_live = date('Y-m-d H:i:s', strtotime($time_to_live . '+2 hour'));
					$paciente->save();
				}

				if(!$paciente->documentos->contains($documento->id)) $paciente->documentos()->attach($documento->id);
				if(!$paciente->contatos->contains($contato->id)) $paciente->contatos()->attach($contato->id);
			}

			if(is_null($paciente->empresa_id)) {
				$paciente->empresa_id = $dados['empresa_id'];
				$paciente->save();
			}

			/** Desativa todas as vigencias do paciente */
			//VigenciaPaciente::where('paciente_id', $paciente->id)->update(['cobertura_ativa' => false, 'data_fim' => date('Y-m-d H:i:s')]);

			/** Seta a empresa nos dependentes ativos do paciente */
			Paciente::where(['responsavel_id' => $paciente->id, 'cs_status' => 'A'])->update(['empresa_id' => $paciente->empresa_id]);

			# dados do vigencia do paciente
			$vigencia           		= new VigenciaPaciente();
			$vigencia->paciente_id 		= $paciente->id;
			$vigencia->cobertura_ativa  = true;
			$vigencia->vl_max_consumo   = 0;
			$vigencia->anuidade_id     	= $dados['anuidade_id'];
			$vigencia->data_inicio 		= date('Y-m-d H:i:s');
			$vigencia->periodicidade 	= $dados['periodicidade'];
			$vigencia->data_fim 		= date('Y-m-d H:i:s', strtotime("+1 year", strtotime($vigencia->data_inicio)));
			$vigencia->save();
		} catch (\Exception $e) {
			########### FINISHIING TRANSACTION ##########
			DB::rollback();
			#############################################
			return response()->json([
				'message' => 'O Colaborador não foi cadastrado. Por favor, tente novamente.',
			], 500);
		}

		########### FINISHIING TRANSACTION ##########
		DB::commit();
		#############################################

		return response()->json([
			'status' => true
		], 201);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function storeDependente(DependenteRequest $request, $idTitular)
	{
		$access_token = UtilController::getAccessToken();
		$time_to_live = date('Y-m-d H:i:s');
		$dados = $request->all();

		$modelResponsavel = Paciente::findOrFail($idTitular);

		########### STARTING TRANSACTION ############
		DB::beginTransaction();
		#############################################

		try {
			$validaPessoa = Paciente::validaPessoa($dados['email'], $dados['tp_documento'], $dados['te_documento'], Contato::TP_CEL_PESSOAL, $dados['telefone']);

			if(!$validaPessoa['status']) {
				DB::rollback();
				return response()->json([
					'message' => $validaPessoa['mensagem'],
				], 500);
			}

			/** Pessoa não cadastrada no sistema */
			if($validaPessoa['status']) {
				//Cria um pessoa
				$user 					= new User();
				$user->name 			= strtoupper($dados['nm_primario'].' '.$dados['nm_secundario']);
				$user->email 			= $dados['email'];
				$user->password 		= bcrypt(uniqid('empresa@newSenha'));
				$user->tp_user 			= 'COL';
				$user->cs_status 		= 'A';
				$user->avatar 			= 'users/default.png';
				$user->save();

				$paciente = new Paciente();
				$paciente->user_id 			= $user->id;
				$paciente->nm_primario 		= $dados['nm_primario'];
				$paciente->nm_secundario 	= $dados['nm_secundario'];
				$paciente->cs_sexo 			= $dados['cs_sexo'];
				$paciente->dt_nascimento 	= $dados['dt_nascimento'];
				$paciente->access_token 	= $access_token;
				$paciente->time_to_live 	= date('Y-m-d H:i:s', strtotime($time_to_live . '+2 hour'));
				$paciente->responsavel_id 	= $modelResponsavel->id;
				$paciente->parentesco 		= $dados['parentesco'];
				$paciente->save();

				$documento = new Documento();
				$documento->tp_documento = $dados['tp_documento'];
				$documento->te_documento = UtilController::retiraMascara($dados['te_documento']);
				$documento->save();

				$contato = new Contato();
				$contato->tp_contato 	= Contato::TP_CEL_PESSOAL;
				$contato->ds_contato 	= $dados['telefone'];
				$contato->save();

				if(!$paciente->documentos->contains($documento->id)) $paciente->documentos()->attach($documento->id);
				if(!$paciente->contatos->contains($contato->id)) $paciente->contatos()->attach($contato->id);
			} else {
				$documento_obj = new DocumentoController();
				$dadosPaciente = $documento_obj->getUserByCpf($dados['cpf'])->getData();

				if(!$dadosPaciente->status) {
					DB::rollback();
					return response()->json([
						'message' => $validaPessoa['mensagem'],
					], 500);
				}

				$user = User::findOrFail($dadosPaciente->pessoa->user_id);
				$paciente = Paciente::getPacienteByUserId($user->id);
				$documento = Documento::findOrFail($dadosPaciente->pessoa->documento_id);
				$contato = Contato::findOrFail($dadosPaciente->pessoa->contato_id);

				if($user) {
					$user->email = $dados['email'];
					$user->save();
				}

				if(!$paciente) {
					$paciente = new Paciente();
					$paciente->user_id 		= $user->id;
					$paciente->nm_primario 	= $dadosPaciente->pessoa->nm_primario;
					$paciente->nm_secundario = $dadosPaciente->pessoa->nm_secundario;
					$paciente->cs_sexo 		= $dadosPaciente->pessoa->cs_sexo;
					$paciente->dt_nascimento = $dadosPaciente->pessoa->dt_nascimento;
					$paciente->access_token = $access_token;
					$paciente->time_to_live = date('Y-m-d H:i:s', strtotime($time_to_live . '+2 hour'));
					$paciente->save();
				}

				if(!$paciente->documentos->contains($documento->id)) $paciente->documentos()->attach($documento->id);
				if(!$paciente->contatos->contains($contato->id)) $paciente->contatos()->attach($contato->id);
			}

			if(is_null($paciente->empresa_id)) {
				$paciente->empresa_id = $dados['empresa_id'];
				$paciente->save();
			}

			$paciente->empresa_id = $dados['empresa_id'];
			$paciente->save();

			/** Desativa todas as vigencias do paciente */
			//VigenciaPaciente::where('paciente_id', $paciente->id)->update(['cobertura_ativa' => false, 'data_fim' => date('Y-m-d H:i:s')]);

			/** Seta a empresa nos dependentes ativos do paciente */
			Paciente::where(['responsavel_id' => $paciente->id, 'cs_status' => 'A'])->update(['empresa_id' => $paciente->empresa_id]);

			# dados do vigencia do paciente
			$vigencia           		= new VigenciaPaciente();
			$vigencia->paciente_id 		= $paciente->id;
			$vigencia->cobertura_ativa  = true;
			$vigencia->vl_max_consumo   = 0;
			$vigencia->anuidade_id     	= $dados['anuidade_id'];
			$vigencia->data_inicio 		= date('Y-m-d H:i:s');
			$vigencia->periodicidade 	= $dados['periodicidade'];
			$vigencia->data_fim 		= date('Y-m-d H:i:s', strtotime("+1 year", strtotime($vigencia->data_inicio)));
			$vigencia->save();
		} catch (\Exception $e) {
			########### FINISHIING TRANSACTION ##########
			DB::rollback();
			#############################################
			return response()->json([
				'message' => 'O Colaborador não foi cadastrado. Por favor, tente novamente.'.$e->getMessage(),
			], 500);
		}

		########### FINISHIING TRANSACTION ##########
		DB::commit();
		#############################################

		return response()->json([
			'status' => true
		], 201);
	}

	/**
	 * Display the specified resource on modal.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showColaboradorModal($id)
	{
		$model = Representante::findOrFail($id);
		return view('pacientes.modalColaboradorShow', compact('model'));
	}

	/**
	 * Show the form for modal editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function editColaboradorModal($id)
	{
		$model = Paciente::findOrFail($id);

		$modelEmpresa = Empresa::findOrFail($model->empresa_id);
		$anuidades = $modelEmpresa->anuidades()
			->where('cs_status', 'A')
			->whereNull('deleted_at')
			->where('plano_id', '>=', $model->plano_ativo->id)
			->get();

		return view('pacientes.modalEditColaborador', compact('model', 'anuidades'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function update(ColaboradorRequest $request, $id)
	{
		$paciente = Paciente::findOrFail($id);
		$dados = $request->all();

		########### STARTING TRANSACTION ############
		DB::beginTransaction();
		#############################################

		try {
			if($paciente->vigencia_ativa->anuidade_id != $dados['anuidade_id']) {
				/** Desativa todas as vigencias do paciente */
				VigenciaPaciente::where('paciente_id', $paciente->id)->update(['cobertura_ativa' => false, 'data_fim' => date('Y-m-d H:i:s')]);

				# dados do vigencia do paciente
				$vigencia           		= new VigenciaPaciente();
				$vigencia->paciente_id 		= $paciente->id;
				$vigencia->cobertura_ativa  = true;
				$vigencia->vl_max_consumo   = 0;
				$vigencia->anuidade_id     	= $dados['anuidade_id'];
				$vigencia->data_inicio 		= date('Y-m-d H:i:s');
				$vigencia->periodicidade 	= $dados['periodicidade'];
				$vigencia->data_fim 		= date('Y-m-d H:i:s', strtotime("+1 year", strtotime($vigencia->data_inicio)));
				$vigencia->save();
			}
		} catch (\Exception $e) {
			########### FINISHIING TRANSACTION ##########
			DB::rollback();
			#############################################
			return response()->json([
				'message' => 'O Colaborador não foi cadastrado. Por favor, tente novamente.',
			], 500);
		}

		########### FINISHIING TRANSACTION ##########
		DB::commit();
		#############################################

		return response()->json([
			'message' => 'O Colaborador foi editado com sucesso!',
		], 200);
	}

    /**
     *
     * @param PacientesRequest $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function gravar(PacientesRequest $request){
        DB::beginTransaction();

        try{
            $usuario = new \App\User();
            $usuario->name = strtoupper($request->input('nm_primario').' '.$request->input('nm_secundario'));
            $usuario->email = $request->input('email');
            $usuario->password = bcrypt($request->input('password'));
            $usuario->tp_user = 'PAC';
            $usuario->save();


            $documento = new \App\Documento($request->all());
            $documento->save();


            $endereco = new Endereco($request->all());
            $idCidade = Cidade::where(['cd_ibge'=>$request->input('cd_ibge_cidade')])->get(['id'])->first();
            $endereco->cidade_id = $idCidade->id;
            $endereco->save();


            # telefones ---------------------------------------------
            $arContatos = array();

            $contato1 = new \App\Contato();
            $contato1->tp_contato = $request->input('tp_contato1');
            $contato1->ds_contato = $request->input('ds_contato1');
            $contato1->save();
            $arContatos[] = $contato1->id;

            if(!empty($request->input('ds_contato2'))){
                $contato2 = new \App\Contato();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                $arContatos[] = $contato2->id;
            }


            if(!empty($request->input('ds_contato3'))){
                $contato3 = new \App\Contato();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                $arContatos[] = $contato3->id;
            }

            $paciente  = new \App\Paciente($request->all());
            $paciente->users_id = $usuario->id;
            $paciente->save();


            $paciente->contatos()->attach($arContatos);
            $paciente->enderecos()->attach([$endereco->id]);
            $paciente->documentos()->attach([$documento->id]);
            $paciente->save();

            DB::commit();

            return redirect()->route('home', ['nome' => $request->input('nm_primario')]);
        } catch (\Exception $e) {
            DB::rollBack();

            throw new \Exception($e->getCode().'-'.$e->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarPacientesAtivos()
    {
    	$num_consultas = Atendimento::distinct()->where(['atendimentos.procedimento_id' => null, 'atendimentos.cs_status' => 'A'])->count();
    	$num_arquivos_consulta = intval(ceil($num_consultas/2000));
    	
        $num_procedimentos = Atendimento::distinct()->where(['atendimentos.consulta_id' => null, 'atendimentos.cs_status' => 'A'])->count();
        $num_arquivos_proced = intval(ceil($num_procedimentos/2000));
        
        return view('pacientes.pacientes_ativos', compact('num_arquivos_proced', 'num_arquivos_consulta'));
    }

	public function destroyColaborador($id, $idEmpresa)
	{
		$paciente = Paciente::findOrFail($id);
		$empresa = Empresa::findOrFail($idEmpresa);

		/** Desativa todas as vigencias do paciente na empresa */
		VigenciaPaciente::with('anuidade')
			->where('paciente_id', $paciente->id)
			->where(function($query) {
				$query->where('data_inicio', '<=', date('Y-m-d H:i:s'))
					->where('data_fim', '>=', date('Y-m-d H:i:s'))
					->orWhere(DB::raw('cobertura_ativa'), '=', true);
			})
			->whereHas('anuidade', function($query) use($empresa) {
				$query->where('empresa_id', $empresa->id);
			})
			->update(['cobertura_ativa' => false, 'data_fim' => date('Y-m-d H:i')]);

		return redirect()->back()->with('success', 'O Colaborador excluído com sucesso!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$paciente = Paciente::with(['contatos', 'documentos', 'user'])->findorfail($id);

		DB::beginTransaction();

		$paciente->empresa_id = null;
		if (!$paciente->save()) {
			DB::rollBack();
			return redirect()->back()->withErrors('O Colaborador não foi excluído. Por favor, tente novamente.');
		}

		# Remove a empresa_id dos dependentes ativos
		Paciente::where(['responsavel_id' => $paciente->id, 'cs_status' => 'A'])->update(['empresa_id' => null]);

		$dependentes = $paciente->dependentes;
		foreach($dependentes as $dependente) {
			$vigencia = $dependente->vigencia_ativa;
			if(!is_null($vigencia)) {
				$vigencia->cobertura_ativa = false;
				$vigencia->data_fim = date('Y-m-d H:i');
				if(!$vigencia->save()) {
					DB::rollBack();
					return redirect()->back()->withErrors('O Colaborador não foi excluído. Por favor, tente novamente.')->withInput();
				}
			}
		}

		$vigencia = $paciente->vigencia_ativa;
		if(!is_null($vigencia)) {
			$vigencia->cobertura_ativa = false;
			$vigencia->data_fim = date('Y-m-d H:i');
			if(!$vigencia->save()) {
				DB::rollBack();
				return redirect()->back()->withErrors('O Colaborador não foi excluído. Por favor, tente novamente.');
			}
		}

		DB::commit();

		return redirect()->route('pacientes.index')->with('success', 'O Colaborador excluído com sucesso!');
	}

    /**
     * Gera relatório Xls a partir de parâmetros de consulta do fluxo básico.
     *
     */
    public function geraListaPacientesAtivosXls()
    {

    	Excel::create('DRHJ_RELATORIO_PACIENTES_ATIVOS_' . date('d-m-Y~H_i_s'), function ($excel) {
    		$excel->sheet('Consultas', function ($sheet) {

    			// Font family
    			$sheet->setFontFamily('Comic Sans MS');

    			// Set font with ->setStyle()`
    			$sheet->setStyle(array(
    					'font' => array(
    							'name' => 'Calibri',
    							'size' => 12,
    							'bold' => false
    					)
    			));

    			$cabecalho = array('Data' => date('d-m-Y H:i'));

    			$list_pacientes = Paciente::distinct()
    			->leftJoin('users',					function($join1) { $join1->on('pacientes.user_id', '=', 'users.id');})
    			->leftJoin('documento_paciente',	function($join2) { $join2->on('documento_paciente.paciente_id', '=', 'pacientes.id');})
    			->leftJoin('documentos',			function($join3) { $join3->on('documentos.id', '=', 'documento_paciente.documento_id');})
    			->leftJoin('contato_paciente',		function($join4) { $join4->on('contato_paciente.paciente_id', '=', 'pacientes.id');})
    			->leftJoin('contatos',				function($join5) { $join5->on('contatos.id', '=', 'contato_paciente.contato_id');})
    			->leftJoin('empresas',				function($join6) { $join6->on('empresas.id', '=', 'pacientes.empresa_id');})
    			->select('pacientes.id', 'pacientes.nm_primario as nome', 'pacientes.nm_secundario as sobrenome', 'pacientes.cs_sexo as genero', 'pacientes.dt_nascimento as data_nascimento', 'documentos.tp_documento as tipo_documento',
    					'documentos.te_documento as nr_documento', 'users.email as email_paciente', 'contatos.ds_contato as celular', 'pacientes.created_at as data_criacao_registro', 'pacientes.updated_at as data_ultimo_acesso', 'pacientes.responsavel_id',
    			         'empresas.nome_fantasia')
    			->where(['pacientes.cs_status' => 'A'])
//     			->limit(10)
    			->orderby('pacientes.nm_primario', 'asc')
    			->get();
    			
    			foreach ($list_pacientes as $item) {
    			    $plano_id = Paciente::getPlanoAtivo($item->id);
    			    switch ($plano_id) {
    			        case 2:
    			            $item->nome_plano = 'Premium';
    			        break;
    			        
    			        case 3:
    			            $item->nome_plano = 'Blue';
    			        break;
    			        
    			        case 4:
    			            $item->nome_plano = 'Black';
    			        break;
    			        
    			        case 5:
    			            $item->nome_plano = 'Plus';
    			        break;
    			        
    			        default:
    			            $item->nome_plano = 'Open';
    			        break;
    			    }
    			}
//     			dd($list_pacientes);
    			

//     			$sheet->setColumnFormat(array(
//     					'F6:F'.(sizeof($list_consultas)+6) => '""00"." 000"."000"/"0000-00'
//     			));

    			$sheet->loadView('pacientes.pacientes_ativos_excel', compact('list_pacientes', 'cabecalho'));
    		});
    	})->export('xls');
    }
    
    /**
     * Gera relatório Xls a partir de parâmetros de consulta do fluxo básico numa lista detalhada.
     *
     */
    public function geraListaPacientesDetalhadoXls()
    {
    	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    	date_default_timezone_set('America/Sao_Paulo');
    	
    	$data_inicio = CVXRequest::post('mes_inicio');
    	$data_fim 	= CVXRequest::post('mes_fim');
    	
    	$data_mes_inicio = explode('/', $data_inicio);
    	$data_mes_fim = explode('/', $data_fim);
    	
    	$mes_inicio = UtilController::getNumMesByNome($data_mes_inicio[0]);
    	$mes_fim = UtilController::getNumMesByNome($data_mes_fim[0]);

    	$dateBegin = date('Y-m-01 00:00:00', strtotime($data_mes_inicio[1].'-'.$mes_inicio.'-01 00:00:00'));
    	$dateEnd = date('Y-m-t 23:59:59', strtotime($data_mes_fim[1].'-'.$mes_fim.'-28 00:00:00'));

    	Excel::create('DRHJ_RELATORIO_PACIENTES_DETALHADO_' . date('d-m-Y~H_i_s'), function ($excel) use ($dateBegin, $dateEnd) {
    		$excel->sheet('Pacientes', function ($sheet) use ($dateBegin, $dateEnd) {
    
    			// Font family
    			$sheet->setFontFamily('Comic Sans MS');
    
    			// Set font with ->setStyle()`
    			$sheet->setStyle(array(
    					'font' => array(
    							'name' => 'Calibri',
    							'size' => 12,
    							'bold' => false
    					)
    			));
    
    			$cabecalho = array('Data' => date('d-m-Y H:i'));
    
    			/* $list_pacientes = Paciente::distinct()
    			->leftJoin('users',					function($join1) { $join1->on('pacientes.user_id', '=', 'users.id');})
    			->leftJoin('documento_paciente',	function($join2) { $join2->on('documento_paciente.paciente_id', '=', 'pacientes.id');})
    			->leftJoin('documentos',			function($join3) { $join3->on('documentos.id', '=', 'documento_paciente.documento_id');})
    			->leftJoin('contato_paciente',		function($join4) { $join4->on('contato_paciente.paciente_id', '=', 'pacientes.id');})
    			->leftJoin('contatos',				function($join5) { $join5->on('contatos.id', '=', 'contato_paciente.contato_id');})
    			->leftJoin('empresas',				function($join6) { $join6->on('empresas.id', '=', 'pacientes.empresa_id');})
    			->select('pacientes.id', 'pacientes.nm_primario as nome', 'pacientes.nm_secundario as sobrenome', 'pacientes.cs_sexo as genero', 'pacientes.dt_nascimento as data_nascimento', 'documentos.tp_documento as tipo_documento',
    					'documentos.te_documento as nr_documento', 'users.email as email_paciente', 'contatos.ds_contato as celular', 'pacientes.created_at as data_criacao_registro', 'pacientes.updated_at as data_ultimo_acesso', 'pacientes.responsavel_id',
    					'empresas.nome_fantasia')
    					->where(['pacientes.cs_status' => 'A'])
    					//     			->limit(10)
    			->orderby('pacientes.nm_primario', 'asc')
    			->get();
    			 
    			foreach ($list_pacientes as $item) {
    				$plano_id = Paciente::getPlanoAtivo($item->id);
    				switch ($plano_id) {
    					case 2:
    						$item->nome_plano = 'Premium';
    						break;
    						 
    					case 3:
    						$item->nome_plano = 'Blue';
    						break;
    						 
    					case 4:
    						$item->nome_plano = 'Black';
    						break;
    						 
    					case 5:
    						$item->nome_plano = 'Plus';
    						break;
    						 
    					default:
    						$item->nome_plano = 'Open';
    						break;
    				}
    			} */
    			//--tabela por numero de pacientes por dia--------------------------------
//     			DB::enableQueryLog();
    			$list_items = DB::table('pacientes')
    								->select(DB::raw("DATE(d) AS data") , DB::raw("COUNT(pacientes.id) AS num_pacientes"))
    								->from(DB::raw("generate_series(date_trunc('day', (TO_DATE('$dateEnd', 'YYYY-MM-DD HH24:MI:SS')))::date - ('$dateEnd'::date - '$dateBegin'::date),date_trunc('day', (TO_DATE('$dateEnd', 'YYYY-MM-DD HH24:MI:SS')))::date, '1 day') d"))
    								->leftJoin('pacientes', function($join) { $join->on(DB::raw("DATE(pacientes.created_at)"), '=', 'd');})
    								->groupBy(DB::raw("data"))
    								->orderBy(DB::raw("data"))
    								->get();
    								
//     			dd( DB::getQueryLog() );
    			
    			//--tabela com totalizacao do numero de pacientes por mes--------------------------------
    			$list_items_por_ano = [];
    			$list_items_por_ano_temp = [];
    			$ano_inicio = date('Y', strtotime($dateBegin));
    			$ano_fim = date('Y', strtotime($dateEnd));
    			
    			for ($ct_ano = $ano_inicio; $ct_ano <= $ano_fim; $ct_ano++) {
//     					DB::enableQueryLog();
    				$list_items_por_ano_temp = DB::table('pacientes')
	    				->select(DB::raw("to_char(created_at, 'YYYY-MM') AS data") , DB::raw("COUNT(pacientes.id) AS num_pacientes"))
	    				->from(DB::raw("pacientes"))
	    				->where(DB::raw("EXTRACT(YEAR FROM created_at)"), "=", $ct_ano)
	    				->groupBy(DB::raw("data"))
	    				->orderBy(DB::raw("data"))
	    				->get();
    				
	    			$total_pacientes = 0;
	    			for($i = 1; $i <= 12; $i++) {
	    				$tem_item_ano = false;
	    				foreach ($list_items_por_ano_temp as $item) {
	    					
	    					if($item->data == $ct_ano.'-'.sprintf("%02d", $i)) {
	    						$item_ano = $item;
	    						$tem_item_ano = true;
	    					}
	    				}
	    				
	    				if (!$tem_item_ano) {
	    					$item_ano = new \stdClass();
	    					$item_ano->data = $ct_ano.'-'.sprintf("%02d", $i);
	    					$item_ano->num_pacientes = 0;
	    					$list_items_por_ano_temp->splice($i-1, 0, [$item_ano]);
	    				}
	    				
	    				$total_pacientes = $total_pacientes+$list_items_por_ano_temp[$i-1]->num_pacientes;
	    			}
	    			
	    			$item_total = new \stdClass();
	    			$item_total->data = 'Total';
	    			$item_total->num_pacientes = $total_pacientes;
	    			$list_items_por_ano_temp->push($item_total);
// 	    				dd( DB::getQueryLog() );
					array_push($list_items_por_ano, $list_items_por_ano_temp);
    			}
    			$list_items_total = collect([]);
    			for ($i = 1; $i <= 13; $i++) {
    				$total_pacientes_por_mes = 0;
    				for($ct_ano = 0; $ct_ano < sizeof($list_items_por_ano); $ct_ano++) {
    					$total_pacientes_por_mes = $total_pacientes_por_mes+$list_items_por_ano[$ct_ano][$i-1]->num_pacientes;
    				}
    				
    				$item_total_ano = new \stdClass();
    				$item_total_ano->data = sprintf("%02d", $i);
    				$item_total_ano->nome_mes = $i < 13 ? ucfirst(strftime('%B', strtotime('2018-'.sprintf("%02d", $i).'-01 00:00:00'))) : 'Total';
    				$item_total_ano->num_pacientes = $total_pacientes_por_mes;
    				
    				$list_items_total->push($item_total_ano);
    			}
    			array_push($list_items_por_ano, $list_items_total);
    			
    			//--tabela por numero de pacientes por dia--------------------------------
    			//     			DB::enableQueryLog();
    			$list_num_pacientes_por_empresa = DB::table('empresas')
	    			->select('empresas.id', 'empresas.nome_fantasia', 'empresas.razao_social', DB::raw("COUNT(pacientes.id) AS num_pacientes"))
	    			->from(DB::raw("empresas"))
	    			->join('pacientes', function($join) { $join->on('pacientes.empresa_id', '=', 'empresas.id');})
	    			->groupBy(DB::raw("empresas.id"))
	    			->orderBy('nome_fantasia', 'asc')
	    			->get();
    			
    			//     			dd( DB::getQueryLog() );
//     			dd($list_items_por_ano);
//     			dd($list_items);
    			//     			dd($list_pacientes);
    
    			//     			$sheet->setColumnFormat(array(
    			//     					'F6:F'.(sizeof($list_consultas)+6) => '""00"." 000"."000"/"0000-00'
    			//     			));
	    			
    			$sheet->loadView('pacientes.pacientes_detalhado_excel', compact('list_num_pacientes_por_empresa', 'list_items', 'list_items_por_ano', 'cabecalho', 'dateBegin', 'dateEnd'));
    		});
    	})->export('xls');
    }
    
    /**
     * Gera relatório Xls a partir de parâmetros de consulta do fluxo básico numa lista de agendamentos.
     *
     */
    public function geraListaAgendamentoDetalhadoXls()
    {
    	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    	date_default_timezone_set('America/Sao_Paulo');
    	 
    	$data_inicio = CVXRequest::post('mes_inicio');
    	$data_fim 	= CVXRequest::post('mes_fim');
    	 
    	$data_mes_inicio = explode('/', $data_inicio);
    	$data_mes_fim = explode('/', $data_fim);
    	 
    	$mes_inicio = UtilController::getNumMesByNome($data_mes_inicio[0]);
    	$mes_fim = UtilController::getNumMesByNome($data_mes_fim[0]);
    
    	$dateBegin = date('Y-m-01 00:00:00', strtotime($data_mes_inicio[1].'-'.$mes_inicio.'-01 00:00:00'));
    	$dateEnd = date('Y-m-t 23:59:59', strtotime($data_mes_fim[1].'-'.$mes_fim.'-28 00:00:00'));
    
    	Excel::create('DRHJ_RELATORIO_AGENDAMENTOS_' . date('d-m-Y~H_i_s'), function ($excel) use ($dateBegin, $dateEnd) {
    		$excel->sheet('Pacientes', function ($sheet) use ($dateBegin, $dateEnd) {
    
    			// Font family
    			$sheet->setFontFamily('Comic Sans MS');
    
    			// Set font with ->setStyle()`
    			$sheet->setStyle(array(
    					'font' => array(
    							'name' => 'Calibri',
    							'size' => 12,
    							'bold' => false
    					)
    			));
    
    			$cabecalho = array('Data' => date('d-m-Y H:i'));
//     			DB::enableQueryLog();
    			$list_agendamentos = Agendamento::with(['itempedidos', 'itempedidos.pedido', 'atendimento', 'paciente', 'paciente.documentos', 'paciente.empresa'])
	    			->distinct('agendamentos.id')
	    			->join('itempedidos', function ($query) {$query->on('itempedidos.agendamento_id', '=', 'agendamentos.id');})
	    			->join('pedidos', function ($query) use($dateBegin, $dateEnd) {
	    			
	    				$query->on('pedidos.id', '=', 'itempedidos.pedido_id')->whereDate('pedidos.dt_pagamento', '>=', date('Y-m-d H:i:s', strtotime($dateBegin)))->whereDate('pedidos.dt_pagamento', '<=', date('Y-m-d H:i:s', strtotime($dateEnd)));
	    			
	    			})
	    			->join('clinicas', 		function ($query) {$query->on('clinicas.id', '=', 'agendamentos.clinica_id');})
    				->select('agendamentos.id', 'agendamentos.te_ticket', 'agendamentos.dt_atendimento', 'agendamentos.obs_agendamento', 'agendamentos.obs_cancelamento', 'agendamentos.cs_status',
	    					'agendamentos.bo_remarcacao', 'agendamentos.clinica_id', 'agendamentos.paciente_id', 'agendamentos.atendimento_id', 'agendamentos.profissional_id', 'agendamentos.convenio_id',
	    					'agendamentos.bo_retorno', 'agendamentos.cupom_id', 'agendamentos.filial_id', 'agendamentos.checkup_id', 'clinicas.nm_razao_social', 'pedidos.dt_pagamento', 'agendamentos.vigencia_paciente_id')
	    			->get();
	    			
	    		foreach ($list_agendamentos as $item) {
	    			$plano_id = $item->paciente->getPlanoAtivo($item->paciente->id);
	    			$item->plano_id = $plano_id;
	    			switch ($plano_id) {
	    				case 2:
	    					$item->nm_plano = 'Premium';
	    					break;
	    				case 3:
	    					$item->nm_plano = 'Blue';
	    					break;
	    				case 4:
	    					$item->nm_plano = 'Black';
	    					break;
    					case 5:
    						$item->nm_plano = 'Plus';
    						break;
	    				default:
	    					$item->nm_plano = 'Open';
	    			}
	    			
	    			if (!is_null($item->atendimento->precoAtivo)) {
	    				$vl_com = str_replace(',', '.', $item->atendimento->precoAtivo->vl_comercial);
	    				$vl_net = str_replace(',', '.', $item->atendimento->precoAtivo->vl_net);
	    				$vl_over = number_format(($vl_com-$vl_net)/$vl_com, 2)*100;
	    				
	    			} else {
	    				$item->vl_over = 0;
	    			}
	    			
	    		}
	    			
// 	    		dd( DB::getQueryLog() );
// 	    		dd($list_agendamentos);
    			//     			$sheet->setColumnFormat(array(
    			//     					'F6:F'.(sizeof($list_consultas)+6) => '""00"." 000"."000"/"0000-00'
    			//     			));
    
    			$sheet->loadView('pacientes.agendamento_detalhado_excel', compact('list_agendamentos', 'cabecalho', 'dateBegin', 'dateEnd'));
    		});
    	})->export('xls');
    }
}

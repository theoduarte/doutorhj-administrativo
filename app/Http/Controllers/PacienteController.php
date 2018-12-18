<?php

namespace App\Http\Controllers;

use App\Anuidade;
use App\Contato;
use App\Documento;
use App\Empresa;
use App\Http\Requests\ColaboradorRequest;
use App\Http\Requests\PacientesRequest;
use App\User;
use App\VigenciaPaciente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Cidade;
use App\Endereco;
use App\Paciente;

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
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ColaboradorRequest $request)
	{
		$empresa_id = session('empresa_id');
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
				$paciente->setDtNascimentoAttribute("{$dados['ano']}-{$dados['mes']}-{$dados['dia']}");
				$paciente->access_token = $access_token;
				$paciente->time_to_live = date('Y-m-d H:i:s', strtotime($time_to_live . '+2 hour'));

				$documento = new Documento();
				$documento->tp_documento = $dados['tp_documento'];
				$cpf 					= UtilController::retiraMascara($dados['te_documento']);
				$documento->te_documento = $cpf;
				$documento->save();

				$contato = new Contato();
				$contato->tp_contato 	= 'CP';
				$contato->ds_contato 	= $dados['ds_contato'];
				$contato->save();

				if(!$paciente->documentos->contains($documento->id)) $paciente->documentos()->attach($documento->id);
				if(!$paciente->contatos->contains($contato->id)) $paciente->contatos()->attach($contato->id);
			} else {
				$documento_obj = new DocumentoController();
				$user = $documento_obj->getUserByCpf($dados['cpf'])->getData();
				$user = User::findOrFail($user->pessoa->user_id);
				$paciente = Paciente::getPacienteByUserId($user->id);

				if(!is_null($paciente->empresa_id)) {
					DB::rollback();
					return response()->json([
						'message' => 'Paciente ja vinculado a empresa '.$paciente->empresa->razao_social,
					], 403);
				}

				$paciente->empresa_id = $dados['empresa_id'];
				$paciente->save();
			}

			/** Desativa todas as vigencias do paciente */
			VigenciaPaciente::where('paciente_id', $paciente->id)->update(['cobertura_ativa' => false, 'data_fim' => date('Y-m-d H:i:s')]);

			# dados do vigencia do paciente
			$vigencia           		= new VigenciaPaciente();
			$vigencia->paciente_id 		= $paciente->id;
			$vigencia->cobertura_ativa  = true;
			$vigencia->vl_max_consumo   = 0;
			$vigencia->anuidade_id     	= $dados['anuidade_id'];
			$vigencia->data_inicio 		= date('Y-m-d H:i:s');
			$vigencia->periodicidade 	= $dados['pediodicidade'];
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
				$vigencia->periodicidade 	= $dados['pediodicidade'];
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
        }catch (\Exception $e){
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
    	return view('pacientes.pacientes_ativos');
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

		$vigencia = $paciente->vigencia_ativa;
		if(!is_null($vigencia)) {
			$vigencia->cobertura_ativa = false;
			$vigencia->data_fim = date('Y-m-d H:i:s');
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
    					'documentos.te_documento as nr_documento', 'users.email', 'contatos.ds_contato as celular', 'pacientes.created_at as data_criacao_registro', 'pacientes.updated_at as data_ultimo_acesso', 'pacientes.responsavel_id',
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
}

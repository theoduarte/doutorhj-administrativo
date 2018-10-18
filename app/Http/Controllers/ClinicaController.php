<?php

namespace App\Http\Controllers;

use App\Plano;
use App\Preco;
use App\TipoPreco;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PrestadoresRequest;
use App\Http\Requests\EditarPrestadoresRequest;
use App\Http\Requests\PrecificacaoConsultaRequest;
use App\Http\Requests\PrecificacaoProcedimentoRequest;
use Illuminate\Support\Facades\Request as CVXRequest;
use LaravelLegends\PtBrValidator\Validator as CVXValidador;
use App\Clinica;
use App\User;
use App\Cargo;
use App\Cidade;
use App\Profissional;
use App\Atendimento;
use App\Estado;
use App\Especialidade;
use App\Documento;
use App\Contato;
use App\Endereco;
use App\Procedimento;
use App\Responsavel;
use App\RegistroLog;
use Illuminate\Support\Facades\Auth;
use App\Consulta;
use App\Filial;

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestadores = Clinica::where(function($query){
            if(!empty(Request::input('nm_busca'))){
                switch (Request::input('tp_filtro')){
                    case "nm_razao_social" :
                        $query->where(DB::raw('to_str(nm_razao_social)'), 'like', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
                        break;
                    case "nm_fantasia" :
                        $query->where(DB::raw('to_str(nm_fantasia)'), 'like', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
                        break;
                    default:
                        $query->where(DB::raw('to_str(nm_razao_social)'), 'like', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
                }
            }
        })->where(DB::raw('cs_status'), '=', 'A')->sortable()->paginate(10);

        $prestadores->load('contatos');
        $prestadores->load('responsavel');

        Request::flash();

        return view('clinicas.index', compact('prestadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::orderBy('ds_estado')->get();
        $cargos  = Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);

        $precoconsultas = null;
        $precoprocedimentos = null;

        $list_profissionals = [];

        return view('clinicas.create', compact('estados', 'cargos', 'precoprocedimentos', 'precoconsultas', 'list_profissionals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrestadoresRequest $request)
    {
        ########### STARTING TRANSACTION ############
        DB::beginTransaction();
        #############################################

        try {
            # dados de acesso do usuário que é o profissional responsável pela empresa
            $usuario            = new User();
            $usuario->name      = $request->input('name_responsavel');
            $usuario->email     = $request->input('email');
            $usuario->password  = bcrypt($request->input('password'));
            $usuario->tp_user   = 'CLI';
            $usuario->cs_status = 'A';
            $usuario->avatar = 'users/default.png';
            $usuario->perfiluser_id = 2;
            $usuario->save();

            # documento da empresa CNPJ
            $documentoCnpj      = new Documento();
            $documentoCnpj->tp_documento = $request->input('tp_documento');
            $documentoCnpj->te_documento = UtilController::retiraMascara($request->input('te_documento'));
            $documentoCnpj->save();
            $documento_ids = [$documentoCnpj->id];


            # endereco da empresa
            $endereco           = new Endereco($request->all());
            $cidade             = Cidade::where(['cd_ibge'=>$request->input('cd_cidade_ibge')])->get()->first();
            $endereco->nr_cep = UtilController::retiraMascara($request->input('nr_cep'));
            $endereco->cidade()->associate($cidade);
            $endereco->nr_latitude_gps = $request->input('nr_latitude_gps');
            $endereco->nr_longitute_gps = $request->input('nr_longitute_gps');
            $endereco->save();
            $endereco_ids = [$endereco->id];

            # responsavel pela empresa
            $responsavel      = new Responsavel();
            $responsavel->telefone = $request->input('telefone_responsavel');
            $responsavel->cpf = UtilController::retiraMascara($request->input('cpf_responsavel'));
            $responsavel->user_id = $usuario->id;
            $responsavel->save();

            # telefones
            $arContatos = array();

            $contato1             = new Contato();
            $contato1->tp_contato = $request->input('tp_contato');
            $contato1->ds_contato = $request->input('ds_contato');
            $contato1->save();
            array_push($arContatos, $contato1->id);

            if(!empty($request->input('ds_contato2'))){
                $contato2             = new \App\Contato();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                array_push($arContatos, $contato2->id);
            }

            if(!empty($request->input('ds_contato3'))){
                $contato3             = new \App\Contato();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                array_push($arContatos, $contato3->id);
            }

            # clinica
            $clinica = Clinica::create($request->all());
            $clinica->responsavel_id = $responsavel->id;
            if ($clinica->save()) {

                # registra log
                $user_obj           = $usuario->toJson();
                $clinica_obj        = $clinica->toJson();
                $documento_obj      = $documentoCnpj->toJson();
                $endereco_obj       = $endereco->toJson();
                $responsavel_obj    = $responsavel->toJson();
                $contato_obj        = $contato1->toJson();

                $log = "[$user_obj, $clinica_obj, $documento_obj, $endereco_obj, $responsavel_obj, $contato_obj]";

                $this->registrarLog('Adicionar Clinica', $log, 1);

            }

            $prestador = $this->setClinicaRelations($clinica, $documento_ids, $endereco_ids, $arContatos);
        } catch (\Exception $e) {
            ########### FINISHIING TRANSACTION ##########
            DB::rollback();
            #############################################
            //return response()->json(['status' => false, 'mensagem' => 'O Pedido não foi salvo, devido a uma falha inesperada. Por favor, tente novamente.']);
            return redirect()->route('clinicas.index')->with('error-alert', 'O prestador não foi cadastrado. Por favor, tente novamente.');
        }

        ########### FINISHIING TRANSACTION ##########
        DB::commit();
        #############################################

        return redirect()->route('clinicas.index')->with('success', 'O prestador foi cadastrado com sucesso!');
    }

    /**
     * Registra os logs of specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function registrarLog($titulo, $descricao, $tipo_log)
    {
        $log = new RegistroLog();
        $log->titulo = $titulo;
        $log->descricao = $descricao;
        $log->tipolog_id = $tipo_log;
        $log->user_id = Auth::user()->id;
        $log->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idClinica)
    {
        $estados = Estado::orderBy('ds_estado')->get();
        $cargos  = Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);


        $prestador = Clinica::findorfail($idClinica);
        $prestador->load('enderecos');
        $prestador->load('contatos');
        $prestador->load('documentos');
        $prestador->load('profissionals');
        
        $list_filials = Filial::with('endereco')->where('clinica_id', $prestador->id)->where('cs_status', '=', 'A')->orderBy('eh_matriz','desc')->get();

        $list_profissionals = $prestador->profissionals;
        $list_especialidades = Especialidade::orderBy('ds_especialidade', 'asc')->get();

        $user   = User::findorfail($prestador->responsavel->user_id);
        $cidade = Cidade::findorfail($prestador->enderecos->first()->cidade_id);
        $documentoprofissional = [];


        $precoprocedimentos = Atendimento::where(['clinica_id'=> $idClinica, 'consulta_id'=> null])->get();
        $precoprocedimentos->load('procedimento');

        $precoconsultas = Atendimento::where(['clinica_id'=> $idClinica, 'procedimento_id'=> null])->get();
        $precoconsultas->load('consulta');


        return view('clinicas.show', compact('estados', 'cargos', 'prestador', 'user', 'cargo', 'list_filials', 'list_profissionals', 'list_especialidades', 'cidade', 'documentoprofissional', 'precoprocedimentos', 'precoconsultas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idClinica)
    {
        $estados = Estado::orderBy('ds_estado')->get();
        $cargos  = Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);

        $get_term = CVXRequest::get('search_term');
        $search_term = UtilController::toStr($get_term);

        $prestador = Clinica::findorfail($idClinica);
        $prestador->load('enderecos');
        $prestador->load('contatos');
        $prestador->load('documentos');
        $prestador->load('filials');
        
        $list_filials = Filial::with('endereco')->where('clinica_id', $prestador->id)->where('cs_status', '=', 'A')->orderBy('eh_matriz','desc')->get();

        $documentosclinica = $prestador->documentos;

        $user   = User::findorfail($prestador->responsavel->user_id);
		$planos = Plano::pluck('ds_plano', 'id');

//		$precoprocedimentos = Atendimento::where('atendimentos.clinica_id', $idClinica)
//			->where('atendimentos.procedimento_id', '<>', null)
//			->where('atendimentos.cs_status', '=', 'A')
//			->select( DB::raw("atendimentos.procedimento_id, replace(ds_preco,'''','`') as ds_preco, atendimentos.clinica_id") )
//			->orderBy('atendimentos.procedimento_id')
////			->join('precos', 'precos.atendimento_id', '=', 'atendimentos.id')
//			->groupBy('atendimentos.id')
//			->with('precos')
//			->get();

		$precoprocedimentos = Atendimento::where(['clinica_id' => $idClinica, 'cs_status' => 'A'])
			->whereNotNull('procedimento_id')
			->get();

		$precoconsultas = Atendimento::where(['clinica_id' => $idClinica, 'cs_status' => 'A'])
			->whereNotNull('consulta_id')
			->get();

        $documentoprofissional = [];

        if($search_term != '') {
            $list_profissionals = Profissional::where(DB::raw('to_str(nm_primario)'), 'LIKE', '%'.$search_term.'%')->where('clinica_id', $prestador->id)->where('cs_status', '=', 'A')->orderBy('nm_primario', 'asc')->get();
        } else {
            $list_profissionals = Profissional::where('clinica_id', $prestador->id)->where('cs_status', '=', 'A')->orderBy('nm_primario', 'asc')->get();
        }

        $list_profissionals->load('documentos');

        //$list_especialidades = Especialidade::orderBy('ds_especialidade', 'asc')->pluck('ds_especialidade', 'cd_especialidade', 'id');
        $list_especialidades = Especialidade::orderBy('ds_especialidade', 'asc')->get();

        return view('clinicas.edit', compact('estados', 'cargos', 'prestador', 'user', 'planos',
            'documentoprofissional', 'precoprocedimentos',
            'precoconsultas', 'documentosclinica', 'list_profissionals', 'list_especialidades', 'list_filials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrestadoresRequest $request, $idClinica)
    {
        $prestador = Clinica::findOrFail($idClinica);
        $ct_clinica_obj        = $prestador->toJson();

        $prestador->update($request->all());

        //--atualizar usuário-----------------
        $usuario_id         = CVXRequest::post('responsavel_user_id');
        $usuario            = User::findorfail($usuario_id);

        $ct_user_obj        = $usuario->toJson();
        $usuario->name      = $request->input('name_responsavel');
        
        if ( (String)$request->input('change-password') === "1" ) {
            $usuario->password  = bcrypt($request->input('password'));
        }
        $usuario->save();

        //--salvar CNPJ------------------------
        $documento_ids = [];
        $cnpj_id                    = CVXRequest::post('cnpj_id');
        $documento                  = Documento::findorfail($cnpj_id);
        $ct_documento_obj           = $documento->toJson();
        $documento->tp_documento    = $request->input('tp_documento');
        $documento->te_documento    = UtilController::retiraMascara($request->input('te_documento'));
        $documento->save();
        $documento_ids = [$documento->id];

        //--salvar enderecos----------------------
        $endereco_ids = [];
        $endereco_id = CVXRequest::post('endereco_id');
        $endereco = Endereco::findorfail($endereco_id);
        $ct_endereco_obj           = $endereco->toJson();
        $endereco->nr_cep = UtilController::retiraMascara(CVXRequest::post('nr_cep'));
        $endereco->sg_logradouro = CVXRequest::post('sg_logradouro');
        $endereco->te_endereco = CVXRequest::post('te_endereco');
        $endereco->nr_logradouro = CVXRequest::post('nr_logradouro');
        $endereco->te_complemento = CVXRequest::post('te_complemento');
        $endereco->nr_latitude_gps = CVXRequest::post('nr_latitude_gps');
        $endereco->nr_longitute_gps = CVXRequest::post('nr_longitute_gps');
        $endereco->te_bairro = CVXRequest::post('te_bairro');

        $cidade = Cidade::where(['cd_ibge' => CVXRequest::post('cd_cidade_ibge')])->get()->first();
        $endereco->cidade()->associate($cidade);

        $endereco->save();
        $endereco_ids = [$endereco->id];

        //--salvar contatos----------------------
        $contato_ids = [];
        $contato_id = CVXRequest::post('contato_id');
        $contato = Contato::findorfail($contato_id);
        $ct_contato_obj           = $contato->toJson();
        $contato->tp_contato = CVXRequest::post('tp_contato_'.$contato_id);
        $contato->ds_contato = CVXRequest::post('ds_contato_'.$contato_id);
        $contato->save();
        $contato_ids = [$contato->id];

        # responsavel pela empresa
        $responsavel_id         = CVXRequest::post('responsavel_id');
        $responsavel            = Responsavel::findorfail($responsavel_id);
        $ct_responsavel_obj           = $responsavel->toJson();
        $responsavel->telefone  = $request->input('telefone_responsavel');
        $responsavel->save();

        $prestador = $this->setClinicaRelations($prestador, $documento_ids, $endereco_ids, $contato_ids);
        if ($prestador->save()) {

            $user_obj           = $usuario->toJson();
            $clinica_obj        = $prestador->toJson();
            $documento_obj      = $documento->toJson();
            $endereco_obj       = $endereco->toJson();
            $responsavel_obj    = $responsavel->toJson();
            $contato_obj        = $contato->toJson();

            $ct_log = "reg_anterior:[$ct_user_obj, $ct_clinica_obj, $ct_documento_obj, $ct_endereco_obj, $ct_responsavel_obj, $ct_contato_obj]";
            $new_log = "reg_novo:[$user_obj, $clinica_obj, $documento_obj, $endereco_obj, $responsavel_obj, $contato_obj]";

            $log = "{".$ct_log.",".$new_log."}";

            $this->registrarLog('Editar Clinica', $log, 3);
        }
        //$prestador->save();

        return redirect()->route('clinicas.index')->with('success', 'Prestador alterado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idClinica)
    {
        $clinica = Clinica::findorfail($idClinica);
        $clinica_obj = $clinica->toJson();

        //--desabilita todos os contatos desse prestador------
        $clinica->load('contatos');
        $contatos = $clinica->contatos;
        //$clinica->contatos()->delete();

        foreach ($contatos as $contato) {
            $contato->ds_contato = '(61) 00000-0000';
            $contato->save();
        }

        //--desabilita todos os enderecos desse prestador----
        $clinica->load('enderecos');
        $enderecos = $clinica->enderecos;
        //$clinica->enderecos()->delete();

        foreach ($enderecos as $endereco) {
            $endereco->te_endereco = 'CANCELADO';
            $endereco->save();
        }

        //--desabilita todos os documentos desse prestador----
        $clinica->load('documentos');
        $documentos = $clinica->documentos;
        //$clinica->documentos()->delete();

        foreach ($documentos as $documento) {
            $documento->te_documento = '11111111111';
            $documento->save();
        }

        //--desabilita o responsavel por este prestador e o usuario tambem----
        $clinica->load('responsavel');
        $responsavel = $clinica->responsavel;

        if (!empty($responsavel)) {
            $responsavel->telefone 	= '(61) 00000-0000';
            $responsavel->cpf 		= '11111111111';
            $responsavel->save();

            $responsavel->load('user');
            $user_responsavel = $responsavel->user;

            if(!empty($user_responsavel)) {
                $user_responsavel->email = 'CANCELADO@comvex.com.br';
                $user_responsavel->save();
            }
        }

        //--desabilita o cadastro desse prestador----
        //$clinica->delete();
        $clinica->cs_status = 'I';
        $clinica->save();

        //Atendimento::where('clinica_id', $idClinica)->delete();

        # registra log
        $log = "[$clinica_obj]";

        $this->registrarLog('Excluir Clinica', $log, 4);

        return redirect()->route('clinicas.index')->with('success', 'Clínica excluída com sucesso!');
    }

    /**
     * Consulta para alimentar autocomplete
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfissionals(){

        $arResultado = array();

        $nm_profissional = CVXRequest::post('nm_profissional');
        $clinica_id = CVXRequest::post('clinica_id');

        $profissionals = Profissional::where('clinica_id', '=', $clinica_id)->where ( DB::raw ( 'to_str(nm_primario)' ), 'like', '%' . UtilController::toStr ( $nm_profissional ) . '%' )->orWhere ( DB::raw ( 'to_str(nm_secundario)' ), 'like', '%' . UtilController::toStr ( $nm_profissional ) . '%' )->get();

        foreach ($profissionals as $query)
        {
            $tipo_documento = $query->documentos()->first()->tp_documento;
            $nr_documento = $query->documentos()->first()->te_documento;

            $arResultado[] = [ 'id' =>  $query->id, 'value' => $query->nm_primario.' '.$query->nm_secundario.' ('.$tipo_documento.': '.$nr_documento.')' ];
        }

        return Response()->json($arResultado);
    }

    /**
     * Consulta para alimentar autocomplete
     *
     * @param string $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProcedimentos($termo){
        $arResultado = array();
        $procedimentos = Procedimento::where(DB::raw('to_str(cd_procedimento)'), 'like', '%'.UtilController::toStr($termo).'%')->orWhere(DB::raw('to_str(ds_procedimento)'), 'like', '%'.UtilController::toStr($termo).'%')->orderBy('ds_procedimento')->get();

        foreach ($procedimentos as $query)
        {
            $arResultado[] = [ 'id' =>  $query->id.' | '.$query->cd_procedimento .' | '.$query->ds_procedimento, 'value' => '('.$query->cd_procedimento.') '.$query->ds_procedimento ];
        }

        return Response()->json($arResultado);
    }

    /**
     * Consulta para alimentar autocomplete
     *
     * @param string $termo
     * @return \Illuminate\Http\JsonResponse
     */
    public function getConsultas($termo){
        $arResultado = array();
        $consultas = Consulta::where(DB::raw('to_str(cd_consulta)'), 'like', '%'.UtilController::toStr($termo).'%')->orWhere(DB::raw('to_str(ds_consulta)'), 'like', '%'.UtilController::toStr($termo).'%')->orderBy('ds_consulta')->get();

        foreach ($consultas as $query)
        {
            $arResultado[] = [ 'id' => $query->id.' | '.$query->cd_consulta.' | '.$query->ds_consulta, 'value' => '('.$query->cd_consulta.') '.$query->ds_consulta ];
        }

        return Response()->json($arResultado);
    }

    //############# PERFORM RELATIONSHIP ##################
    /**
     * Perform relationship.
     *
     * @param  \App\Perfiluser  $perfiluser
     * @return \Illuminate\Http\Response
     */
    private function setClinicaRelations(Clinica $prestador, array $documento_ids, array $endereco_ids, array $contato_ids)
    {
        $prestador->documentos()->sync($documento_ids);
        $prestador->enderecos()->sync($endereco_ids);
        $prestador->contatos()->sync($contato_ids);

        return $prestador;
    }

    /**
     * Perform relationship.
     *
     * @param  \App\Profissional  $profissional
     * @return \Illuminate\Http\Response
     */
    private function setProfissionalRelations(Profissional $profissional, array $documento_ids, array $contatos_ids, array $especialidade_ids, array $filial_ids, Clinica $clinica)
    {
        $profissional->documentos()->sync($documento_ids);
        $profissional->especialidades()->sync($especialidade_ids);

        if( in_array('all', $filial_ids) ) {
            $obj = [];
            foreach ($clinica->filials()->where('cs_status','A')->get() as $filial) {
                $obj[] = $filial->id;
            }

            $profissional->filials()->sync($obj);
        }
        else {
            $profissional->filials()->sync($filial_ids);
        }

        return $profissional;
    }
    
    /**
     * Perform relationship.
     *
     * @param  \App\Profissional  $profissional
     * @return \Illuminate\Http\Response
     */
    private function setAtendimentoRelations(Atendimento $atendimento, array $filial_ids)
    {
    	if( in_array('all', $filial_ids) ) {
            $obj = [];
            foreach ($atendimento->clinica->filials()->where('cs_status','A')->get() as $filial) {
                $obj[] = $filial->id;
            }

            $atendimento->filials()->sync($obj);
        }
        else {
            $atendimento->filials()->sync($filial_ids);    
        }
        
    
    	return $atendimento;
    }

    //############# AJAX SERVICES ##################
    /**
     * addProfissionalStore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProfissionalStore(Request $request)
    {
        $clinica_id = CVXRequest::post('clinica_id');
        $clinica = Clinica::findorfail($clinica_id);

        $profissional_id = CVXRequest::post('profissional_id');
        if ($profissional_id != '') {
            $profissional = Profissional::findorfail($profissional_id);
            $profissional->load('documentos');
        }
        $ct_profissional_obj = $profissional_id != '' ? $profissional->toJson() : "[]";

        if (isset($profissional) && isset($profissional->documentos) && sizeof($profissional->documentos) > 0) {
            $documento_id = $profissional->documentos[0]->id;
            $documento = Documento::findorfail($documento_id);
            $ct_documento_obj = $documento->toJson();

            $documento->tp_documento = CVXRequest::post('tp_documento');
            $documento->te_documento = CVXRequest::post('te_documento');
            $documento->save();

            $documento_ids = [$documento->id];
        } else {
            $documento = new Documento();
            $documento->tp_documento =  CVXRequest::post('tp_documento');
            $documento->te_documento =  CVXRequest::post('te_documento');
            $documento->save();
            $documento_ids = [$documento->id];
            $ct_documento_obj = "[]";
        }

        $contatos_ids = [];

        if (!isset($profissional)) {
            $profissional = new Profissional();
        }
        $profissional->nm_primario = CVXRequest::post('nm_primario');
        $profissional->nm_secundario = CVXRequest::post('nm_secundario');
        $profissional->cs_sexo = CVXRequest::post('cs_sexo');
        $profissional->dt_nascimento = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1", CVXRequest::post('dt_nascimento'));
        $profissional->clinica_id = intval($clinica_id);
        //$profissional->especialidade_id = CVXRequest::post('especialidade_id');
        $especialidade_ids = CVXRequest::post('especialidade_profissional');
        $filial_ids = CVXRequest::post('filial_profissional');
        $profissional->tp_profissional = CVXRequest::post('tp_profissional');
        $profissional->cs_status = CVXRequest::post('cs_status');

        if ($profissional->save()) {

            # registra log
            $profissional_obj           = $profissional->toJson();
            $documento_obj              = $documento->toJson();
            $titulo_log                 = $profissional_id != '' ? 'Editar Profissional' : 'Adicionar Profissional';
            $tipo_log                   = $profissional_id != '' ? 3 : 1;

            $ct_log = "reg_anterior:[$ct_profissional_obj, $ct_documento_obj]";
            $new_log = "reg_novo:[$profissional_obj, $documento_obj]";

            $log = "{".$ct_log.",".$new_log."}";

            $this->registrarLog($titulo_log, $log, $tipo_log);

        } else {
            return response()->json(['status' => false, 'mensagem' => 'O Profissional não foi salvo. Por favor, tente novamente.']);
        }

        $profissional = $this->setProfissionalRelations($profissional, $documento_ids, $contatos_ids, $especialidade_ids, $filial_ids, $clinica);
        $profissional->save();

        $profissional->load('especialidades');

        return response()->json(['status' => true, 'mensagem' => 'O Profissional foi salvo com sucesso!', 'profissional' => $profissional->toJson()]);
    }

    /**
     * viewProfissionalShow a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewProfissionalShow()
    {
        $profissional_id = CVXRequest::post('profissional_id');
        $profissional = Profissional::findorfail($profissional_id);
        $profissional->load('documentos');
        $profissional->load('especialidades');
        $profissional->load('filials');

        return response()->json(['status' => true, 'mensagem' => '', 'profissional' => $profissional->toJson()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProfissionalDestroy()
    {
        $profissional_id = CVXRequest::post('profissional_id');
        $profissional = Profissional::findorfail($profissional_id);
        $profissional->cs_status = 'I';

        if ($profissional->save()) {

            # registra log
            $profissional_obj           = $profissional->toJson();

            $log = "[$profissional_obj]";

            $this->registrarLog('Excluir Profissional', $log, 4);

        } else {
            return response()->json(['status' => false, 'mensagem' => 'O Profissional não foi removido. Por favor, tente novamente.']);
        }

        return response()->json(['status' => true, 'mensagem' => 'O Profissional foi removido com sucesso!', 'profissional' => $profissional->toJson()]);
    }

    /**
     * precificacaoConsultaStore a newly created resource in storage.
     *
     * @param  Clinica  $clinica
     * @param  PrecificacaoConsultaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function precificacaoConsultaStore(Clinica $clinica, PrecificacaoConsultaRequest $request)
    {
		$data_vigencia = UtilController::getDataRangeTimePickerToCarbon($request->get('data-vigencia'));

//		dd($request->all(), $data_vigencia);

        foreach ($request->list_profissional_consulta as $profissionalId) {
			$atendimento = Atendimento::where([
				'clinica_id' => $clinica->id,
				'profissional_id' => $profissionalId,
				'consulta_id' => $request->consulta_id,
				'cs_status' => 'A'
			])->first();

			if(is_null($atendimento)) {
				$atendimento = new Atendimento();
				$atendimento->clinica_id = $clinica->id;
				$atendimento->profissional_id = $profissionalId;
				$atendimento->consulta_id = $request->consulta_id;
				$atendimento->ds_preco =  $request->descricao_consulta;
				$atendimento->cs_status = 'A';
				$atendimento->save();
			}

			$preco = Preco::where(['atendimento_id' => $atendimento->id, 'plano_id' => $request->plano_id, 'cs_status' => 'A'])
				->where('data_inicio', '<=', date('Y-m-d'))
				->where('data_fim', '>=', date('Y-m-d'));

			if($preco->exists()) {
				$error[] = "Preço {$atendimento->ds_preco} - {$atendimento->profissional->nm_primario}, plano {$preco->first()->plano->ds_plano} já cadastrado";
			} else {
				$preco = new Preco();
				$preco->cd_preco = $atendimento->id;
				$preco->atendimento_id = $atendimento->id;
				$preco->plano_id = $request->plano_id;
				$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
				$preco->cs_status = 'A';
				$preco->data_inicio = $data_vigencia['de'];
				$preco->data_fim = $data_vigencia['ate'];
				$preco->vl_comercial = $request->vl_com_consulta;
				$preco->vl_net = $request->vl_net_consulta;

				$preco->save();
			}

            # registra log
            $atendimento_obj    = "[]";
            $titulo_log         = 'Adicionar Consulta';
            $tipo_log           = 1;
            $ct_log = "reg_anterior:[]";
            $new_log = "reg_novo:[$atendimento_obj]";

            $log = "{".$ct_log.",".$new_log."}";

            $this->registrarLog($titulo_log, $log, $tipo_log);
        }

		if(isset($error) && !empty($error)) {
			return redirect()->back()->with('error-alert', implode('<br>', $error));
		}

        return redirect()->back()->with('success', 'A precificação da consulta foi salva com sucesso!');
    }

    /**
     * precificacaoConsultaUpdate a newly created resource in storage.
     *
     * @param  App\Clinica  $clinica
     * @param  App\Http\Requests\PrecificacaoConsultaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function precificacaoConsultaUpdate(Clinica $clinica, PrecificacaoConsultaRequest $request)
    {
        $atendimento = Atendimento::findOrFail($request->atendimento_id);
        $atendimento->profissional_id = $request->profissional_id;
        $atendimento->ds_preco =  $request->ds_consulta;

        $atendimento->save();

         # registra log
        $atendimentoOld    = json_encode( $atendimento->getOriginal() );
        $atendimentoNew    = json_encode( $atendimento->getAttributes() );

        $titulo_log         = 'Editar Atendimento';
        $tipo_log           = 3;

        $ct_log = "reg_anterior:[$atendimentoOld]";
        $new_log = "reg_novo:[$atendimentoNew]";

        $log = "{".$ct_log.",".$new_log."}";

        $this->registrarLog($titulo_log, $log, $tipo_log);
        return redirect()->back()->with('success', 'A precificação da consulta foi salva com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Http\Requests\PrecificacaoConsultaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function precificacaoConsultaDestroy(PrecificacaoConsultaRequest $request)
    {
        $atendimento = Atendimento::findorfail( $request->atendimento_id );
        $atendimento->cs_status = 'I';
        $atendimento->save();

        # registra log
        $atendimento_obj = $atendimento->toJson();
        $log = "[$atendimento_obj]";
        $this->registrarLog('Excluir Consulta', $log, 4);

        return response()->json(['status' => true, 'mensagem' => 'A Consulta foi removida com sucesso!', 'atendimento' => $atendimento->toJson()]);
    }

    /**
     * precificacaoProcedimentoStore a newly created resource in storage.
     *
     * @param  Clinica  $clinica
     * @param  PrecificacaoProcedimentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function precificacaoProcedimentoStore(Clinica $clinica, PrecificacaoProcedimentoRequest $request)
    {
		$data_vigencia = UtilController::getDataRangeTimePickerToCarbon($request->get('data-vigencia'));

		$atendimento = Atendimento::where(['clinica_id' => $clinica->id, 'procedimento_id' => $request->procedimento_id, 'cs_status' => 'A'])->first();

		if(is_null($atendimento)) {
			$atendimento = new Atendimento();
			$atendimento->clinica_id = $clinica->id;
			$atendimento->procedimento_id = $request->procedimento_id;
			$atendimento->ds_preco =  $request->descricao_procedimento;
			$atendimento->cs_status = 'A';
			$atendimento->save();
		}

		$preco = Preco::where(['atendimento_id' => $atendimento->id, 'plano_id' => $request->plano_id, 'cs_status' => 'A']);

		if($preco->exists()) {
			return redirect()->back()->with('error-alert', 'O plano ja está cadastrado. Por favor, tente novamente.');
		}

		$preco = new Preco();
		$preco->cd_preco = $atendimento->id;
		$preco->atendimento_id = $atendimento->id;
		$preco->plano_id = $request->plano_id;
		$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
		$preco->cs_status = 'A';
		$preco->data_inicio = $data_vigencia['de'];
		$preco->data_fim = $data_vigencia['ate'];
		$preco->vl_comercial = $request->vl_com_procedimento;
		$preco->vl_net = $request->vl_net_procedimento;

		$preco->save();

		$plano_id = $request->plano_id;
		$plano = Plano::findorfail($plano_id);
		$usuario_id         = Auth::user()->id;
		$usuario            = User::findorfail($usuario_id);
		
        # registra log
		$user_obj           = $usuario->toJson();
		$preco->plano       = $plano;
		$preco_obj          = $preco->toJson();
		$atendimento_obj    = $atendimento->toJson();
		//$plano_obj          = $plano->toJson();
        $titulo_log         = 'Adicionar Preço';
        $tipo_log           = 1;
        
        $ct_log   = '"reg_anterior":'.'{}';
        $new_log  = '"reg_novo":'.'{"user":'.$user_obj.', "preco":'.$preco_obj.', "atendimento":'.$atendimento_obj.'}';

        $log = "{".$ct_log.",".$new_log."}";

        $this->registrarLog($titulo_log, $log, $tipo_log);

        return redirect()->back()->with('success', 'A precificação da procedimento foi salva com sucesso!');
    }

    /**
     * precificacaoProcedimentoUpdate a newly created resource in storage.
     *
     * @param  Clinica  $clinica
     * @param  PrecificacaoProcedimentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function precificacaoProcedimentoUpdate(Clinica $clinica, PrecificacaoProcedimentoRequest $request)
    {
        $atendimento = Atendimento::findOrFail($request->atendimento_id);
        $atendimento->ds_preco =  $request->ds_procedimento;
        $atendimento = $this->setAtendimentoRelations($atendimento, $request->atendimento_filial);

        $atendimento->save();

         # registra log
        $atendimentoOld    = json_encode( $atendimento->getOriginal() );
        $atendimentoNew    = json_encode( $atendimento->getAttributes() );

        $titulo_log = 'Editar Atendimento';
        $tipo_log   = 3;
        $ct_log     = "reg_anterior:[$atendimentoOld]";
        $new_log    = "reg_novo:[$atendimentoNew]";

        $log = "{".$ct_log.",".$new_log."}";

        $this->registrarLog($titulo_log, $log, $tipo_log);

        return redirect()->back()->with('success', 'A precificação da procedimento foi salva com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PrecificacaoProcedimentoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function precificacaoProcedimentoDestroy(PrecificacaoProcedimentoRequest $request)
    {
        $atendimento = Atendimento::findorfail( $request->atendimento_id );
        $atendimento->cs_status = 'I';
        $atendimento->save();

        # registra log
        $atendimento_obj = $atendimento->toJson();
        $log = "[$atendimento_obj]";
        $this->registrarLog('Excluir Procedimento', $log, 4);

        return response()->json(['status' => true, 'mensagem' => 'A Procedimento foi removida com sucesso!', 'atendimento' => $atendimento->toJson()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProcedimentoDestroy()
    {
        $atendimento_id = CVXRequest::post('atendimento_id');
        $atendimento = Atendimento::findorfail($atendimento_id);
        $atendimento->cs_status = 'I';

        if ($atendimento->save()) {

            # registra log
            $atendimento_obj           = $atendimento->toJson();

            $log = "[$atendimento_obj]";

            $this->registrarLog('Excluir Procedimento', $log, 4);

        } else {
            return response()->json(['status' => false, 'mensagem' => 'O Atendimento não foi removido. Por favor, tente novamente.']);
        }

        return response()->json(['status' => true, 'mensagem' => 'O Atendimento foi removido com sucesso!', 'atendimento' => $atendimento->toJson()]);
    }

    /**
     * Consulta Cidade através da UF
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function consultaCidade() {
        $output = null;

        $uf = CVXRequest::get('uf');
        $term = CVXRequest::get('term');

        if ( !empty($uf) ) { 
            $cidades = Cidade::where('sg_estado',$uf)->whereRaw( "UPPER(nm_cidade) LIKE UPPER('%$term%')")->orderBy('nm_cidade')->select('id','nm_cidade as label','nm_cidade as value','cd_ibge')->get();

            return response()->json($cidades);
        }
        
        return response()->json(['status' => false, 'mensagem' => 'UF não informada.']);
    }
}
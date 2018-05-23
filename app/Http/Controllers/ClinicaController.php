<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PrestadoresRequest;
use App\Http\Requests\EditarPrestadoresRequest;
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
                                    })->sortable()->paginate(20);
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
        
        $list_profissionals = $prestador->profissionals;
        $list_especialidades = Especialidade::orderBy('ds_especialidade', 'asc')->get();
        
        $user   = User::findorfail($prestador->responsavel->user_id); 
        $cidade = Cidade::findorfail($prestador->enderecos->first()->cidade_id); 
        $documentoprofissional = [];
        
        
        $precoprocedimentos = Atendimento::where(['clinica_id'=> $idClinica, 'consulta_id'=> null])->get();
        $precoprocedimentos->load('procedimento');
        
        $precoconsultas = Atendimento::where(['clinica_id'=> $idClinica, 'procedimento_id'=> null])->get();
        $precoconsultas->load('consulta');
        
        
        return view('clinicas.show', compact('estados', 'cargos', 'prestador', 'user', 'cargo', 'list_profissionals', 'list_especialidades', 'cidade', 'documentoprofissional', 'precoprocedimentos', 'precoconsultas'));
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
        //$prestador->load('profissional');
        
        
        $documentosclinica = $prestador->documentos;
        
        $user   = User::findorfail($prestador->responsavel->user_id);
        $precoprocedimentos = Atendimento::where('clinica_id', $idClinica)->where('procedimento_id', '<>', null)->where('cs_status', '=', 'A')->orderBy('ds_preco', 'asc')->orderBy('vl_com_atendimento', 'desc')->get();
        $precoconsultas =     Atendimento::where('clinica_id', $idClinica)->where('consulta_id', '<>', null)->where('cs_status', '=', 'A')->orderBy('ds_preco', 'asc')->orderBy('vl_com_atendimento', 'desc')->get();
        
        $documentoprofissional = [];

        //$prestador->load('profissionals')->orderBy('updated_at', 'desc');
        
        if($search_term != '') {
            $list_profissionals = Profissional::where(DB::raw('to_str(nm_primario)'), 'LIKE', '%'.$search_term.'%')->where('clinica_id', $prestador->id)->where('cs_status', '=', 'A')->orderBy('nm_primario', 'asc')->get();
        } else {
            $list_profissionals = Profissional::where('clinica_id', $prestador->id)->where('cs_status', '=', 'A')->orderBy('nm_primario', 'asc')->get();
        }
        
        $list_profissionals->load('documentos');
        
        //$list_especialidades = Especialidade::orderBy('ds_especialidade', 'asc')->pluck('ds_especialidade', 'cd_especialidade', 'id');
        $list_especialidades = Especialidade::orderBy('ds_especialidade', 'asc')->get();
        
        return view('clinicas.edit', compact('estados', 'cargos', 'prestador', 'user', 
                                                'documentoprofissional', 'precoprocedimentos', 
                                                'precoconsultas', 'documentosclinica', 'list_profissionals', 'list_especialidades'));
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
        $usuario->password  = bcrypt($request->input('password'));
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
        
        $contatos = $clinica->contatos();
        foreach ($contatos as $contato) {
            
        }
        //$clinica->contatos()->delete();
        $clinica->enderecos()->delete();
        $clinica->documentos()->delete();
        $clinica->delete();
        $clinica->responsavel()->delete();
        Atendimento::where('clinica_id', $idClinica)->delete();
        
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
    private function setProfissionalRelations(Profissional $profissional, array $documento_ids, array $contatos_ids, array $especialidade_ids)
    {
        $profissional->documentos()->sync($documento_ids);
        $profissional->especialidades()->sync($especialidade_ids);
        //$profissional->contatos()->sync($contatos_ids);
        
        return $profissional;
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
        
        $profissional = $this->setProfissionalRelations($profissional, $documento_ids, $contatos_ids, $especialidade_ids);
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
     * addProcedimentoPrecoStore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProcedimentoPrecoStore(Request $request)
    {
        $atendimento_id = CVXRequest::post('atendimento_id');
        $atendimento = $atendimento_id != '' ? Atendimento::findorfail($atendimento_id) : [];
        
        $clinica_id = CVXRequest::post('clinica_id');
        $procedimento_id = CVXRequest::post('procedimento_id');
        $ds_procedimento = CVXRequest::post('ds_procedimento');
        $vl_com_procedimento = CVXRequest::post('vl_com_procedimento');
        $vl_net_procedimento = CVXRequest::post('vl_net_procedimento');
        
        $profissional_ids = CVXRequest::post('list_profissional_procedimento');
        
        $result = true;
        foreach ($profissional_ids as $index => $profissional_id) {
            
            $ct_atendimento_obj = $atendimento_id != '' ? $atendimento->toJson() : "[]"; //--current atendimento objeto, usado na auditoria
            //$profissional_id = CVXRequest::post('atendimento_profissional_id');
            
//             if (sizeof($atendimento) == 0) {
//                 $atendimento = new Atendimento();
//             }
            $atendimento = new Atendimento();
            $atendimento->ds_preco =  $ds_procedimento;
            $atendimento->vl_com_atendimento = UtilController::moedaBanco($vl_com_procedimento);
            $atendimento->vl_net_atendimento = UtilController::moedaBanco($vl_net_procedimento);
            $atendimento->clinica_id = $clinica_id;
            $atendimento->procedimento_id = $procedimento_id;
            $atendimento->profissional_id = $profissional_id;
            $atendimento->cs_status = 'A';
            
            if ($atendimento->save()) {
                
                # registra log
                $atendimento_obj        = $atendimento->toJson();
                $titulo_log             = $atendimento_id != '' ? 'Editar Atendimento' : 'Adicionar Atendimento';
                $tipo_log = $atendimento_id != '' ? 3 : 1;
                
                $ct_log = "reg_anterior:[$ct_atendimento_obj]";
                $new_log = "reg_novo:[$atendimento_obj]";
                
                $log = "{".$ct_log.",".$new_log."}";
                
                $this->registrarLog($titulo_log, $log, $tipo_log);
            } else {
                $result = false;
            }
        }
        
        if (!$result) {
            return response()->json(['status' => false, 'mensagem' => 'O Procedimento não foi salvo. Por favor, tente novamente.']);
        }
        
        //$atendimento->load('procedimento');
        //$atendimento->load('profissional');
        //$atendimento->profissional->load('documentos');
        
        return response()->json(['status' => true, 'mensagem' => 'O(s) Procedimento(s) foi(ram) salvo(s) com sucesso!']);
    }
    
    /**
     * editAtendimentoPrecoUpdate a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editAtendimentoPrecoUpdate(Request $request)
    {
        $atendimento_id = CVXRequest::post('atendimento_id');
        $atendimento = $atendimento_id != '' ? Atendimento::findorfail($atendimento_id) : [];
        
        $ds_atendimento = CVXRequest::post('ds_atendimento');
        $vl_com_atendimento = CVXRequest::post('vl_com_atendimento');
        $vl_net_atendimento = CVXRequest::post('vl_net_atendimento');
        
        if (isset($atendimento)) {
            
            $ct_atendimento_obj = $atendimento_id != '' ? $atendimento->toJson() : "[]"; //--current atendimento objeto, usado na auditoria
            
            $atendimento->ds_preco =  $ds_atendimento;
            $atendimento->vl_com_atendimento = UtilController::moedaBanco($vl_com_atendimento);
            $atendimento->vl_net_atendimento = UtilController::moedaBanco($vl_net_atendimento);
            
            if ($atendimento->save()) {
                
                # registra log
                $atendimento_obj        = $atendimento->toJson();
                $titulo_log             = $atendimento_id != '' ? 'Editar Atendimento' : 'Adicionar Atendimento';
                $tipo_log = $atendimento_id != '' ? 3 : 1;
                
                $ct_log = "reg_anterior:[$ct_atendimento_obj]";
                $new_log = "reg_novo:[$atendimento_obj]";
                
                $log = "{".$ct_log.",".$new_log."}";
                
                $this->registrarLog($titulo_log, $log, $tipo_log);
                
            } else {
                return response()->json(['status' => false, 'mensagem' => 'O Atendimento não foi salvo. Por favor, tente novamente.']);
            }
        }
        
        //$atendimento->load('procedimento');
        //$atendimento->load('profissional');
        //$atendimento->profissional->load('documentos');
        
        return response()->json(['status' => true, 'mensagem' => 'O Atendimento foi salvo com sucesso!']);
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
     * addConsultaPrecoStore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addConsultaPrecoStore(Request $request)
    {
        $atendimento_id = CVXRequest::post('atendimento_id');
        $atendimento = $atendimento_id != '' ? Atendimento::findorfail($atendimento_id) : [];
        
        $clinica_id = CVXRequest::post('clinica_id');
        $consulta_id = CVXRequest::post('consulta_id');
        $ds_consulta = CVXRequest::post('ds_consulta');
        //$profissional_id = CVXRequest::post('consulta_profissional_id');
        $vl_com_consulta = CVXRequest::post('vl_com_consulta');
        $vl_net_consulta = CVXRequest::post('vl_net_consulta');
        
        $profissional_ids = CVXRequest::post('list_profissional_consulta');
        
        $result = true;
        foreach ($profissional_ids as $index => $profissional_id) {
            
            $ct_atendimento_obj = $atendimento_id != '' ? $atendimento->toJson() : "[]";
            
            $atendimento = new Atendimento();
            $atendimento->ds_preco =  $ds_consulta;
            $atendimento->vl_com_atendimento = UtilController::moedaBanco($vl_com_consulta);
            $atendimento->vl_net_atendimento = UtilController::moedaBanco($vl_net_consulta);
            $atendimento->clinica_id = $clinica_id;
            $atendimento->consulta_id = $consulta_id;
            $atendimento->profissional_id = $profissional_id;
            $atendimento->cs_status = 'A';
            
            if ($atendimento->save()) {
                
                # registra log
                $atendimento_obj        = $atendimento->toJson();
                $titulo_log             = $atendimento_id != '' ? 'Editar Consulta' : 'Adicionar Consulta';
                $tipo_log = $atendimento_id != '' ? 3 : 1;
                
                $ct_log = "reg_anterior:[$ct_atendimento_obj]";
                $new_log = "reg_novo:[$atendimento_obj]";
                
                $log = "{".$ct_log.",".$new_log."}";
                
                $this->registrarLog($titulo_log, $log, $tipo_log);
                
            } else {
                $result = false;
            }
        }
        
        if (!$result) {
            return response()->json(['status' => false, 'mensagem' => 'A Consulta não foi salva. Por favor, tente novamente.']);
        }
        
        /* $atendimento->load('consulta');
        $atendimento->load('profissional');
        $atendimento->profissional->load('documentos'); */
        
        return response()->json(['status' => true, 'mensagem' => 'A(s) Consulta(s) foi(ram) salva(s) com sucesso!']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteConsultaDestroy()
    {
        $atendimento_id = CVXRequest::post('atendimento_id');
        $atendimento = Atendimento::findorfail($atendimento_id);
        $atendimento->cs_status = 'I';
        
        if ($atendimento->save()) {
            
            # registra log
            $atendimento_obj           = $atendimento->toJson();
            
            $log = "[$atendimento_obj]";
            
            $this->registrarLog('Excluir Consulta', $log, 4);
            
        } else {
            return response()->json(['status' => false, 'mensagem' => 'A Consulta não foi removida. Por favor, tente novamente.']);
        }
        
        return response()->json(['status' => true, 'mensagem' => 'A Consulta foi removida com sucesso!', 'atendimento' => $atendimento->toJson()]);
    }
    
}
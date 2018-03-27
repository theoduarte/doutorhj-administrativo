<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PacientesEditRequest;
use App\User;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paciente = \App\Paciente::whereHas('user', function($query){
                                            if(!empty(Request::input('nm_busca'))){
                                                switch (Request::input('tp_filtro')){
                                                    case "nome" :
                                                        $query->where(DB::raw('to_str(name)'), 'like', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
                                                        break;
                                                    case "email" :
                                                        $query->where(DB::raw('to_str(email)'), '=', UtilController::toStr(Request::input('nm_busca')));
                                                        break;
                                                    default :
                                                        $query->where(DB::raw('to_str(name)'), 'like', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
                                                }
                                            }
                
                                            $arFiltroStatusIn = array();
                                            if(!empty(Request::input('tp_usuario_somente_ativos'))  ){ $arFiltroStatusIn[] = 'A'; }
                                            if(!empty(Request::input('tp_usuario_somente_inativos'))){ $arFiltroStatusIn[] = 'I'; }
                                            if( count($arFiltroStatusIn) > 0 ) { $query->whereIn('cs_status', $arFiltroStatusIn); }      
                                        })->sortable()->paginate(20);
        $paciente->load('user');
        $paciente->load('documentos');

        Request::flash();
        
        return view('clientes.index', compact('paciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios = User::create($request->all());
        
        $request->session()->flash('message', 'Cargo cadastrado com sucesso!');
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $arEspecialidade = \App\Especialidade::orderBy('ds_especialidade')->get();
            $arEstados       = \App\Estado::orderBy('ds_estado')->get();
            
            $usuarios  = \App\User::findorfail($id);
            
            $pacientes = \App\Paciente::where('user_id', '=', $id)->get()->first();
            $pacientes->load('cargo');
            $pacientes->load('user');
            $pacientes->load('documentos');
            $pacientes->load('enderecos');
            $pacientes->load('contatos');
            
            $cidade = \App\Cidade::findorfail($pacientes->enderecos->first()->cidade_id);
        }catch( Exception $e ){
            print $e->getMessage();
        }

        return view('clientes.show', ['pacientes'       => $pacientes,
                                      'cidade'          => $cidade,
                                      'arEspecialidade' => $arEspecialidade,
                                      'arEstados'       => $arEstados]);
    }
    
    /** 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idUsuario)
    {
        try{
            $arCargos        = \App\Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
            $arEstados       = \App\Estado::orderBy('ds_estado')->get();
            $arEspecialidade = \App\Especialidade::orderBy('ds_especialidade')->get();
            
            $usuarios = \App\User::findorfail($idUsuario);
            
            $pacientes = \App\Paciente::where('user_id', '=', $idUsuario)->get()->first();
            $pacientes->load('cargo');
            $pacientes->load('user');
            $pacientes->load('documentos');
            $pacientes->load('enderecos');
            $pacientes->load('contatos');
            
            $cidade = \App\Cidade::findorfail($pacientes->enderecos->first()->cidade_id);
            
            $precoprocedimentos = \App\Atendimento::where(['profissional_id'=> $idUsuario, 'consulta_id'=> null])->get();
            $precoprocedimentos->load('procedimento');
            
            $precoconsultas = \App\Atendimento::where(['profissional_id'=> $idUsuario, 'procedimento_id'=> null])->get();
            $precoconsultas->load('consulta');
            
        }catch( Exception $e ){
            print $e->getMessage();
        }
        
        return view('clientes.edit', ['pacientes'          => $pacientes, 
                                      'cidade'             => $cidade,
                                      'arEstados'          => $arEstados,
                                      'arCargos'           => $arCargos,
                                      'arEspecialidade'    => $arEspecialidade,
                                      'precoprocedimentos' => $precoprocedimentos,
                                      'precoconsultas'     => $precoconsultas]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacientesEditRequest $request, $idUsuario)
    {
        $dados = Request::all();        
        
        try{
            if( Request::input('tp_usuario') == 'PAC' ){
                $profissional = \App\Paciente::findorfail($idUsuario);
                $profissional->update($dados);
                $profissional->user()->update($dados);

                foreach( $dados['contato_id'] as $indice=>$contato_id){
                    $contato = \App\Contato::findorfail($contato_id);
                    $contato->update(['tp_contato'=>$dados['tp_contato'][$indice], 'ds_contato'=>$dados['ds_contato'][$indice]]);
                }
                
                
                $endereco = \App\Endereco::findorfail($dados['endereco_id']);
                if(!empty($dados['cd_cidade_ibge'])) { $dados['cidade_id'] = \App\Cidade::where('cd_ibge', '=', (int)$dados['cd_cidade_ibge'])->get(['id'])->first()->id; }
                $endereco->update($dados);
                $profissional->enderecos()->sync($endereco);
                
                
                foreach( $dados['documentos_id'] as $indice=>$documentos_id){
                    $documentos = \App\Documento::findorfail($documentos_id);
                    $documentos->update(['tp_documento'=>$dados['tp_documento'][$indice], 'te_documento'=>$dados['te_documento'][$indice]]);
                }
            }elseif( Request::input('tp_usuario') == 'PRO' ){
                $profissional = \App\Profissional::findorfail($idUsuario);
                $profissional->update($dados);
                $profissional->user()->update($dados);
                $profissional->especialidade()->update($dados);
                
                foreach( $dados['contato_id'] as $indice=>$contato_id){
                    $contato = \App\Contato::findorfail($contato_id);
                    $contato->update(['tp_contato'=>$dados['tp_contato'][$indice], 'ds_contato'=>$dados['ds_contato'][$indice]]);
                }
                
                
                $endereco = \App\Endereco::findorfail($dados['endereco_id']);
                if(!empty($dados['cd_cidade_ibge'])) { $dados['cidade_id'] = \App\Cidade::where('cd_ibge', '=', (int)$dados['cd_cidade_ibge'])->get(['id'])->first()->id; }
                $endereco->update($dados);
                $profissional->enderecos()->sync($endereco);
                
                
                foreach( $dados['documentos_id'] as $indice=>$documentos_id){
                    $documentos = \App\Documento::findorfail($documentos_id);
                    $documentos->update(['tp_documento'=>$dados['tp_documento'][$indice], 'te_documento'=>$dados['te_documento'][$indice], 'estado_id'=>(int)$dados['estado_id'][0]]);
                }
                
                
                
                \App\Atendimento::where(['profissional_id'=>$idUsuario])->delete();
                
                if(is_array($request->input('precosProcedimentos')) and count($request->input('precosProcedimentos')) > 0){
                    foreach( $request->input('precosProcedimentos') as $idProcedimento => $arProcedimento ){
                        $atendimento = new \App\Atendimento();
                        $atendimento->profissional()->associate($idUsuario);
                        $atendimento->procedimento()->associate($idProcedimento);
                        $atendimento->ds_preco = $arProcedimento[2];
                        $atendimento->vl_atendimento = str_replace(',', '.',str_replace('.', '', $arProcedimento[3])); //TODO: VERIFICAR FORMA CORRETA NO LARAVEL.
                        $atendimento->save();
                    }
                }
                
                if(is_array($request->input('precosConsultas')) and count($request->input('precosConsultas')) > 0){
                    foreach( $request->input('precosConsultas') as $idConsulta => $arConsulta ){
                        $atendimento = new \App\Atendimento();
                        $atendimento->profissional()->associate($idUsuario);
                        $atendimento->consulta()->associate($idConsulta);
                        $atendimento->ds_preco = $arConsulta[2];
                        $atendimento->vl_atendimento = str_replace(',', '.',str_replace('.', '', $arConsulta[3])); //TODO: VERIFICAR FORMA CORRETA NO LARAVEL.
                        $atendimento->save();
                    }
                }
            }else{
                return redirect()->route('clientes.index')->with('error', 'Tipo de usuário não informado!');
            }
        }catch( Exception $e ){
            return redirect()->route('clientes.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('clientes.index')->with('success', 'O usuário foi atualizado com sucesso!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        
        try{
            $pacientes = \App\Paciente::findorfail($id);
            $pacientes->delete();
                   
            DB::commit();
        }catch( Exception $e ){
            DB::rollBack(); 

            return redirect()->route('clientes.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('clientes.index')->with('success', 'Usuário apagado com sucesso!');
    }
}
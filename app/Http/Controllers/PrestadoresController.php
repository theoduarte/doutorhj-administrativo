<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PrestadoresRequest;
use App\Http\Requests\EditarPrestadoresRequest;

class PrestadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestadores = \App\Clinica::where(function($query){
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
                                        
                                        $arFiltroIn = array();
                                        if(!empty(Request::input('tp_usuario_cliente_paciente'))    ){ $arFiltroIn[] = 'PAC'; }
                                        if(!empty(Request::input('tp_usuario_cliente_profissional'))){ $arFiltroIn[] = 'PRO'; }
                                        if( count($arFiltroIn)>0 ) { $query->whereIn('tp_user', $arFiltroIn); }

                                    })->sortable()->paginate(20);
        $prestadores->load('contatos');
        $prestadores->load('profissional');

        Request::flash();
        
        return view('prestadores.index', compact('prestadores'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = \App\Estado::orderBy('ds_estado')->get();
        $cargos  = \App\Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
        
        $precoprocedimentos = null;
        $precoconsultas = null;
        
        return view('prestadores.create', compact('estados', 'cargos', 'precoprocedimentos', 'precoconsultas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrestadoresRequest $request)
    {
        DB::beginTransaction();
        
        try{
            # dados de acesso do usuário que é o profissional responsável pela empresa
            $usuario            = new \App\User();
            $usuario->name      = $request->input('nm_primario').' '.$request->input('nm_secundario');
            $usuario->email     = $request->input('email');
            $usuario->password  = bcrypt($request->input('password'));
            $usuario->tp_user   = 'CLI';
            $usuario->cs_status = 'A';
            $usuario->save();
            
            # documento da empresa CNPJ
            $documentoCnpj      = new \App\Documento();
            $documentoCnpj->tp_documento = 'CNPJ';   
            $documentoCnpj->te_documento = $request->input('nr_cnpj');
            $documentoCnpj->save();
            
            # endereco da empresa
            $endereco           = new \App\Endereco($request->all());
            $cidade             = \App\Cidade::where(['cd_ibge'=>$request->input('cd_cidade_ibge')])->get()->first();
            $endereco->cidade()->associate($cidade);
            $endereco->save();
            
            # telefones 
            $arContatos = array();
            
            $contato1             = new \App\Contato();
            $contato1->tp_contato = $request->input('tp_contato1');
            $contato1->ds_contato = $request->input('ds_contato1');
            $contato1->save();
            $arContatos[] = $contato1->id;
            
            if(!empty($request->input('ds_contato2'))){
                $contato2             = new \App\Contato();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                $arContatos[] = $contato2->id;
            }
            
            if(!empty($request->input('ds_contato3'))){
                $contato3             = new \App\Contato();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                $arContatos[] = $contato3->id;
            }


            # documento do profissional responsavel pela empresa
            $documentoResp = \App\Documento::create($request->all());
            $documentoResp->save();
            
            # profissional responsavel pela empresa
            $profissional = \App\Profissional::create($request->all());
            $profissional->cargo()->associate((int)$request->input('cargo_id'));
            $profissional->user()->associate((int)$usuario->id);
            $profissional->documentos()->attach($documentoResp);
            $profissional->save();
            
            # clinica
            $clinica = \App\Clinica::create($request->all());
            $clinica->enderecos()->attach($endereco);
            $clinica->contatos()->attach($arContatos);
            $clinica->profissional()->associate($profissional);
            $clinica->documentos()->attach($documentoCnpj);
            $clinica->save();            
            
            if(is_array($request->input('precosProcedimentos')) and count($request->input('precosProcedimentos')) > 0){
                foreach( $request->input('precosProcedimentos') as $idProcedimento => $arProcedimento ){
                    $atendimento = new \App\Atendimento();
                    $atendimento->procedimento()->associate($idProcedimento);
                    $atendimento->clinica_id = $clinica->id;
                    $atendimento->ds_preco = $arProcedimento[2];
                    $atendimento->vl_atendimento = str_replace(',', '.',str_replace('.', '', $arProcedimento[3])); //TODO: VERIFICAR FORMA CORRETA NO LARAVEL.
                    $atendimento->save();
                }
            }
            
            if(is_array($request->input('precosConsultas')) and count($request->input('precosConsultas')) > 0){
                foreach( $request->input('precosConsultas') as $idConsulta => $arConsulta ){
                    $atendimento = new \App\Atendimento();
                    $atendimento->consulta()->associate($idConsulta);
                    $atendimento->clinica_id = $clinica->id;
                    $atendimento->ds_preco = $arConsulta[2];
                    $atendimento->vl_atendimento = str_replace(',', '.',str_replace('.', '', $arConsulta[3])); //TODO: VERIFICAR FORMA CORRETA NO LARAVEL.
                    $atendimento->save();
                }
            }
            
            DB::commit();
            
            return redirect()->route('prestadores.index')->with('success', 'O prestador foi cadastrado com sucesso!');
        } catch (\Exception $e){
            DB::rollBack();
            
            throw new \Exception($e->getCode().'-'.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idClinica)
    {
        $estados = \App\Estado::orderBy('ds_estado')->get();
        $cargos  = \App\Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
        
        $prestador = \App\Clinica::findorfail($idClinica);
        $prestador->load('enderecos');
        $prestador->load('contatos');
        $prestador->load('documentos');
        $prestador->load('profissional');
        
        $user   = \App\User::findorfail($prestador->profissional->user_id);
        $cargo  = \App\Cargo::findorfail($prestador->profissional->cargo_id);
        $cidade = \App\Cidade::findorfail($prestador->enderecos->first()->cidade_id);
        $documentoprofissional = \App\Profissional::findorfail($prestador->profissional->id)->documentos;
        
        $precoprocedimentos = \App\Atendimento::where(['clinica_id'=> $idClinica, 'consulta_id'=> null])->get();
        $precoprocedimentos->load('procedimento');
        
        $precoconsultas = \App\Atendimento::where(['clinica_id'=> $idClinica, 'procedimento_id'=> null])->get();
        $precoconsultas->load('consulta');
        
        return view('prestadores.show', compact('estados', 'cargos', 'prestador', 'user', 'cargo',
                                                'cidade', 'documentoprofissional', 'precoprocedimentos', 'precoconsultas'));
    }

    /**
        * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idClinica)
    {
        $estados = \App\Estado::orderBy('ds_estado')->get();
        $cargos  = \App\Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);

        $prestador = \App\Clinica::findorfail($idClinica);
        $prestador->load('enderecos');
        $prestador->load('contatos');
        $prestador->load('documentos');
        $prestador->load('profissional');
        
        $user   = \App\User::findorfail($prestador->profissional->user_id);
        $cargo  = \App\Cargo::findorfail($prestador->profissional->cargo_id);
        $cidade = \App\Cidade::findorfail($prestador->enderecos->first()->cidade_id);
        $documentoprofissional = \App\Profissional::findorfail($prestador->profissional->id)->documentos;
        
        $precoprocedimentos = \App\Atendimento::where(['clinica_id'=> $idClinica, 'consulta_id'=> null])->get();
        $precoprocedimentos->load('procedimento');
        
        $precoconsultas = \App\Atendimento::where(['clinica_id'=> $idClinica, 'procedimento_id'=> null])->get();
        $precoconsultas->load('consulta');
        
        return view('prestadores.edit', compact('estados', 'cargos', 'prestador', 'user', 'cargo', 
                                                'cidade', 'documentoprofissional', 'precoprocedimentos', 'precoconsultas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditarPrestadoresRequest $request, $idPrestador)
    {
        $dados = Request::all();
        
        DB::beginTransaction();
        
        try{
            $prestador = \App\Clinica::findorfail((int)$idPrestador);
            $prestador->update($dados);
            
            $endereco = \App\Endereco::findorfail($prestador->enderecos->first()->id);
            if(!empty($dados['cd_cidade_ibge'])) { 
                $dados['cidade_id'] = \App\Cidade::where('cd_ibge', '=', (int)$dados['cd_cidade_ibge'])->get(['id'])->first()->id; 
            }
            $endereco->update($dados);
            $prestador->enderecos()->sync($endereco);
            
            $user = \App\User::findorfail($prestador->profissional->user_id);
            $user->update($dados);
            
            
            foreach( $dados['tp_documento'] as $idDocumento=>$tp_documento ){
                $documento = \App\Documento::findorfail($idDocumento);
                $documento->update(['tp_documento'=>$tp_documento[0], 'te_documento'=>(int)$dados['te_documento'][$idDocumento][0]]);
            }
                     
            foreach( $dados['tp_contato'] as $idContato=>$tp_contato ){
                $contato = \App\Contato::findorfail($idContato);
                $contato->update( ['tp_contato'=>$tp_contato[0], 'ds_contato'=>$dados['ds_contato'][$idContato][0]] );
            }

                
            \App\Atendimento::where(['clinica_id'=>$idPrestador])->delete();
            
            if(is_array($request->input('precosProcedimentos')) and count($request->input('precosProcedimentos')) > 0){
                foreach( $request->input('precosProcedimentos') as $idProcedimento => $arProcedimento ){
                    $atendimento = new \App\Atendimento();
                    $atendimento->procedimento()->associate($idProcedimento);
                    $atendimento->clinica_id = $idPrestador;
                    $atendimento->ds_preco = $arProcedimento[2];
                    $atendimento->vl_atendimento = str_replace(',', '.',str_replace('.', '', $arProcedimento[3])); //TODO: VERIFICAR FORMA CORRETA NO LARAVEL.
                    $atendimento->save();
                }
            }
            
            if(is_array($request->input('precosConsultas')) and count($request->input('precosConsultas')) > 0){
                foreach( $request->input('precosConsultas') as $idConsulta => $arConsulta ){
                    $atendimento = new \App\Atendimento();
                    $atendimento->consulta()->associate($idConsulta);
                    $atendimento->clinica_id = $idPrestador;
                    $atendimento->ds_preco = $arConsulta[2];
                    $atendimento->vl_atendimento = str_replace(',', '.',str_replace('.', '', $arConsulta[3])); //TODO: VERIFICAR FORMA CORRETA NO LARAVEL.
                    $atendimento->save();
                }
            }
            
            $prestador->save();
            
            DB::commit();
            
            return redirect()->route('prestadores.index')->with('success', 'Prestador alterado com sucesso!');
        } catch (\Exception $e){
            DB::rollBack();
            
            throw new \Exception($e->getCode().'-'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPrestador)
    {
        
        $atendimento = \App\Atendimento::where('clinica_id', $idPrestador)->delete();
        $prestador = \App\Clinica::findorfail($idPrestador)->delete();
        
        return redirect()->route('prestadores.index')->with('success', 'Prestador excluído com sucesso!');        
    }
    
    /**
     * Consulta para alimentar autocomplete
     * 
     * @param string $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProcedimentos($term){
        $arResultado = array();
        $procedimentos = \App\Procedimento::where(DB::raw('to_str(ds_procedimento)'), 'like', '%'.UtilController::toStr($term).'%')->get();
        
        foreach ($procedimentos as $query)
        {
            $arResultado[] = [ 'id' =>  $query->id.' | '.$query->cd_procedimento .' | '.$query->ds_procedimento, 'value' => $query->ds_procedimento ];
        }
        
        return Response()->json($arResultado);
    }
    
    /**
     * Consulta para alimentar autocomplete
     * 
     * @param string $term
     * @return \Illuminate\Http\JsonResponse
     */
    public function getConsultas($term){
        $arResultado = array();
        $consultas = \App\Consulta::where(DB::raw('to_str(ds_consulta)'), 'like', '%'.UtilController::toStr($term).'%')->get();
        
        foreach ($consultas as $query)
        {
            $arResultado[] = [ 'id' => $query->id.' | '.$query->cd_consulta.' | '.$query->ds_consulta, 'value' => $query->ds_consulta ];
        }
        
        return Response()->json($arResultado);
    }
}
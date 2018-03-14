<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PrestadoresRequest;

class PrestadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestadores = \App\Clinica::select(['id', 'nm_razao_social', 'nm_fantasia'])
                                    ->where(function($query){
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
                                        
//                                         $arFiltroIn = array();
//                                         if(!empty(Request::input('tp_usuario_cliente_paciente'))    ){ $arFiltroIn[] = 'PAC'; }
//                                         if(!empty(Request::input('tp_usuario_cliente_profissional'))){ $arFiltroIn[] = 'PRO'; }
//                                         if( count($arFiltroIn)>0 ) { $query->whereIn('tp_user', $arFiltroIn); }

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
        
        
        return view('prestadores.create', compact('estados', 'cargos'));
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
            $profissional->documentos()->attach($documentoResp);
            $profissional->save();
            
            # clinica
            $clinica = \App\Clinica::create($request->all());
            $clinica->enderecos()->attach($endereco);
            $clinica->contatos()->attach($arContatos);
            $clinica->profissional()->associate($profissional);
            $clinica->save();            
            
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
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    
    /**
     * 
     * @param unknown $consulta
     */
    public function consultaProcedimentos($consulta){
        $procedimento = \App\Procedimento::where(function(){
            
        })->get();
        
        return $procedimento;
    }
}
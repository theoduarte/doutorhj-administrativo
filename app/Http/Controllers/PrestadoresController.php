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
        
        dd($request->all());
        
        DB::beginTransaction();
        
        try{
            # dados de acesso do usuário que é o profissional responsável pela empresa
            $usuario            = new \App\User();
            $usuario->name      = strtoupper($request->input('nm_primario').' '.$request->input('nm_secundario'));
            $usuario->email     = $request->input('email');
            $usuario->password  = bcrypt($request->input('password'));
            $usuario->tp_user   = 'CLI';
            $usuario->cs_status = 'A';
            $usuario->save();
            
            
            
            
            # documento da empresa CNPJ
            $documentoCnpj      = \App\Documento();
            $documentoCnpj->tp_documento = 'CNPJ';
            $documentoCnpj->te_documento = $request->input('nr_cnpj');
            $documentoCnpj->save();
            $arCliDocumento[]   = $documentoCnpj->id;
            
            
            
            # endereco da empresa
            $endereco            = \App\Endereco($request->all());
            $idCidade            = \App\Cidade::where(['cd_ibge'=>$request->input('cd_ibge_cidade')])->get(['id'])->first();
            $endereco->cidade_id = $idCidade->id;
            $endereco->save();
            
            
            
            # telefones do profissional
            $arContatos = array();
            
            $contato1             = \App\Contato();
            $contato1->tp_contato = $request->input('tp_contato1');
            $contato1->ds_contato = $request->input('ds_contato1');
            $contato1->save();
            $arContatos[] = $contato1->id;
            
            if(!empty($request->input('ds_contato2'))){
                $contato2             = \App\Contato();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                $arContatos[] = $contato2->id;
            }
            
            if(!empty($request->input('ds_contato3'))){
                $contato3             = \App\Contato();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                $arContatos[] = $contato3->id;
            }
            
            
            
            # cadastro de profissional responsavel pela clinica
            $profissional           = \App\Profissional($request->all());
            $profissional->users_id = $usuario->id;
            $profissional->cargo_id = $request->input('cargo_id');
            $profissional->save();
            
            $profissional->contatos()->attach($arContatos);
            $profissional->enderecos()->attach([$endereco->id]);
            $profissional->documentos()->attach($arCliDocumento);
            $profissional->save();
            
            
            
            
            $clinica                  = \App\Clinica($request->all());
            $clinica->profissional_id = $profissional->id;
            $clinica->save();
            
            
            # contatos da clínica
            $arContatos = array();
            
            $contato1             = \App\Contato();
            $contato1->tp_contato = $request->input('tp_contato1');
            $contato1->ds_contato = $request->input('ds_contato1');
            $contato1->save();
            $arContatos[] = $contato1->id;
            
            if(!empty($request->input('ds_contato2'))){
                $contato2             = \App\Contato();
                $contato2->tp_contato = $request->input('tp_contato2');
                $contato2->ds_contato = $request->input('ds_contato2');
                $contato2->save();
                $arContatos[] = $contato2->id;
            }
            
            if(!empty($request->input('ds_contato3'))){
                $contato3             = \App\Contato();
                $contato3->tp_contato = $request->input('tp_contato3');
                $contato3->ds_contato = $request->input('ds_contato3');
                $contato3->save();
                $arContatos[] = $contato3->id;
            }
            
            
            # endereco do responsavel
            $endereco            = \App\Endereco($request->all());
            $idCidade            = Cidade::where(['cd_ibge'=>$request->input('cd_ibge_cidade')])->get(['id'])->first();
            $endereco->cidade_id = $idCidade->id;
            $endereco->save();
            
            
            # documento do responsável
            //             $arCliDocumento     = array();
            //             $documento          = new \App\Documentos($request->all());
            //             $documento->save();
            //             $arCliDocumento[]   = $documento->id;
            
            
            $profissional           = \App\Profissional($request->all());
            $profissional->users_id = $usuario->id;
            $profissional->cargo_id = $request->input('cargo_id');
            $profissional->save();
            
            $profissional->contatos()->attach($arContatos);
            //             $clinica->enderecos()->attach([$endereco->id]);
            //             $clinica->documentos()->attach($arCliDocumento);
            $clinica->save();
            
//             DB::commit();
            DB::rollBack();
            
            return redirect()->route('home', ['nome' => $request->input('nm_primario')]);
        } catch (\Exception $e){
            DB::rollBack();
            
            throw new \Exception($e->getCode().'-'.$e->getMessage());
        }
        dd($request::all());
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
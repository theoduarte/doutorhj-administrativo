<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfissionaisEditRequest;
use App\User;
use App\Profissional;
use App\Especialidade;
use App\Estado;
use App\Cargo;

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissionais = Profissional::whereHas('user', function($query){
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
       
        $profissionais->load('user');
        $profissionais->load('documentos');
        $profissionais->load('especialidade');
        
        Request::flash();
        
        return view('profissionais.index', compact('profissionais'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profissionais.create');
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
        
        $request->session()->flash('message', 'Profissional cadastrado com sucesso!');
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
            $arEspecialidade = Especialidade::orderBy('ds_especialidade')->get();
            $arEstados       = Estado::orderBy('ds_estado')->get();
            
            $usuarios  = User::findorfail($id);
            
            $profissionais = Profissional::where('user_id', '=', $id)->get()->first();
            $profissionais->load('especialidade');
            $profissionais->load('user');
            $profissionais->load('documentos');
            $profissionais->load('enderecos');
            $profissionais->load('contatos');
            
            $cidade = \App\Cidade::findorfail($profissionais->enderecos->first()->cidade_id);
        } catch( Exception $e ){
            print $e->getMessage();
        }
        
        return view('profissionais.show', [ 'profissionais'   => $profissionais,
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
            $arCargos        = Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
            $arEstados       = Estado::orderBy('ds_estado')->get();
            $arEspecialidade = Especialidade::orderBy('ds_especialidade')->get();
            
            $usuarios = User::findorfail($idUsuario);
            
            $profissionais = Profissional::where('user_id', '=', $idUsuario)->get()->first();
            $profissionais->load('especialidade');
            $profissionais->load('user');
            $profissionais->load('documentos');
            $profissionais->load('enderecos');
            $profissionais->load('contatos');
            
            $cidade = \App\Cidade::findorfail($profissionais->enderecos->first()->cidade_id);            
        }catch( Exception $e ){
            print $e->getMessage();
        }
        
        return view('profissionais.edit', ['profissionais'   => $profissionais,
                                           'cidade'          => $cidade,
                                           'arEstados'       => $arEstados,
                                           'arCargos'        => $arCargos,
                                           'arEspecialidade' => $arEspecialidade]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfissionaisEditRequest $request, $idProfissional)
    {
        $dados = Request::all();
        
        try{
            $profissional = \App\Profissional::findorfail($idProfissional);
            $profissional->update($dados);
            $profissional->user()->update($dados);
            $profissional->especialidade()->update($dados);
            
            foreach( $dados['contato_id'] as $indice=>$contato_id){
                $contato = \App\Contato::findorfail($contato_id);
                $contato->update(['tp_contato'=>$dados['tp_contato'][$indice], 'ds_contato'=>$dados['ds_contato'][$indice]]);
            }
            
            $endereco = \App\Endereco::findorfail($dados['endereco_id']);
            if(!empty($dados['cd_cidade_ibge'])) { 
                $dados['cidade_id'] = \App\Cidade::where('cd_ibge', '=', (int)$dados['cd_cidade_ibge'])->get(['id'])->first()->id; 
            }
            $endereco->update($dados);
            $profissional->enderecos()->sync($endereco);
            
            foreach( $dados['documentos_id'] as $indice=>$documentos_id){
                $documentos = \App\Documento::findorfail($documentos_id);
                $documentos->update(['tp_documento'=>$dados['tp_documento'][$indice], 
                                     'te_documento'=>UtilController::retiraMascara($dados['te_documento'][$indice]), 
                                     'estado_id'=>(int)$dados['estado_id'][0]]);
            }
           
        }catch( Exception $e ){
            return redirect()->route('profissionais.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('profissionais.index')->with('success', 'O usuário foi atualizado com sucesso!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProfissional)
    {
        DB::beginTransaction();
        
        try{
            $profissionais = \App\Profissional::findorfail($idProfissional);
            $profissionais->forceDelete();
            $profissionais->contatos()->forceDelete();
            $profissionais->enderecos()->forceDelete();
            $profissionais->documentos()->forceDelete();
            $profissionais->user()->forceDelete();
            
            DB::commit();
        }catch( Exception $e ){
            DB::rollBack();
            
            return redirect()->route('profissionais.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('profissionais.index')->with('success', 'Usuário apagado com sucesso!');
    }
}
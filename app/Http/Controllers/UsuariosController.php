<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::select(['id','name','email', 'cs_status', 'tp_user'])
                        ->where(function($query){
                            if(!empty(Request::input('nm_busca'))){
                                switch (Request::input('tp_filtro')){
                                    case "nome" :
                                        $query->where(DB::raw('to_str(name)'), 'like', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
                                        break;
                                    case "email" :
                                        $query->where(DB::raw('to_str(email)'), '=', UtilController::toStr(Request::input('nm_busca')));
                                        break;
                                    default:
                                        $query->where(DB::raw('to_str(name)'), 'like', '%'.UtilController::toStr(Request::input('nm_busca')).'%');
                                        
                                }
                            }
                            
                            $arFiltroIn = array();
                            if(!empty(Request::input('tp_usuario_cliente_paciente'))    ){ $arFiltroIn[] = 'PAC'; }
                            if(!empty(Request::input('tp_usuario_cliente_profissional'))){ $arFiltroIn[] = 'PRO'; }
                            if( count($arFiltroIn)>0 ) { $query->whereIn('tp_user', $arFiltroIn); }
                            
                            
                            $arFiltroStatusIn = array();
                            if(!empty(Request::input('tp_usuario_somente_ativos'))  ){ $arFiltroStatusIn[] = 'A'; }
                            if(!empty(Request::input('tp_usuario_somente_inativos'))){ $arFiltroStatusIn[] = 'I'; }
                            if( count($arFiltroStatusIn) > 0 ) { $query->whereIn('cs_status', $arFiltroStatusIn); }
                            
                            $query->where('tp_user', '<>', 'ADM');
                            $query->where('tp_user', '<>', 'OPR');
                        })->sortable()->paginate(20);
        
        Request::flash();
        
        return view('usuarios.index', compact('usuarios', $usuarios));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
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
            
            $usuarios = \App\User::findorfail($id);
            
            if( $usuarios->tp_user == 'PAC' ){
                $objGenerico = \App\Paciente::where('user_id', '=', $id)->get()->first();
                $objGenerico->load('cargo');
            }else if( $usuarios->tp_user == 'PRO' ){
                $objGenerico = \App\Profissional::where('user_id', '=', $id)->get()->first();
                $objGenerico->load('especialidade');   
            }else{
                throw new \Exception("Tipo de usuário não informado!");
            }
            
            $objGenerico->load('user');
            $objGenerico->load('documentos');
            $objGenerico->load('enderecos');
            $objGenerico->load('contatos');

            $cidade = \App\Cidade::findorfail($objGenerico->enderecos->first()->cidade_id);
        }catch( Exception $e ){
            print $e->getMessage();
        }

        return view('usuarios.show', ['objGenerico'     => $objGenerico, 
                                      'cidade'          => $cidade, 
                                      'arEspecialidade' => $arEspecialidade,
                                      'arEstados'       => $arEstados
                                     ]);
    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $arCargos        = \App\Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
            $arEstados       = \App\Estado::orderBy('ds_estado')->get();
            $arEspecialidade = \App\Especialidade::orderBy('ds_especialidade')->get();
            
            $usuarios = \App\User::findorfail($id);
            
            if( $usuarios->tp_user == 'PAC' ){
                $objGenerico = \App\Paciente::where('user_id', '=', $id)->get()->first();
                $objGenerico->load('cargo');
            }else if( $usuarios->tp_user == 'PRO' ){
                $objGenerico = \App\Profissional::where('user_id', '=', $id)->get()->first();
                $objGenerico->load('especialidade');
            }else{
                throw new \Exception("Tipo de usuário não informado!");
            }
            
            $objGenerico->load('user');
            $objGenerico->load('documentos');
            $objGenerico->load('enderecos');
            $objGenerico->load('contatos');
            
            $cidade = \App\Cidade::findorfail($objGenerico->enderecos->first()->cidade_id);
        }catch( Exception $e ){
            print $e->getMessage();
        }
        
        return view('usuarios.edit', ['objGenerico'    => $objGenerico, 
                                      'cidade'         => $cidade,
                                      'arEstados'      => $arEstados,
                                      'arCargos'       => $arCargos,
                                      'arEspecialidade'=> $arEspecialidade]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\Illuminate\Http\Request $request, $id)
    {
        $dados = Request::all();        
        
        try{
            if( Request::input('tp_usuario') == 'PAC' ){
                $profissional = \App\Paciente::findorfail($id);
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
            }else if( Request::input('tp_usuario') == 'PRO' ){
                $profissional = \App\Profissional::findorfail($id);
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
            }else{
                return redirect()->route('usuarios.index')->with('error', 'Tipo de usuário não informado!');
            }
        }catch( Exception $e ){
            return redirect()->route('usuarios.index')->with('error', $e->getMessage());
        }
        
        
        return redirect()->route('usuarios.index')->with('success', 'O usuário foi atualizado com sucesso!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\Illuminate\Http\Request $request, \App\User $usuario)
    {
        //TODO: VERIFICAR COMO FAZER DELETE CASCADE EM ELOQUENT
        
        $arEnderecos  = array();
        $arContatos   = array();
        $arDocumentos = array();
        
        DB::beginTransaction();
        
        try{
            if( $usuario->tp_user == 'PAC' ){
                $objGenerico = \App\Paciente::where('user_id', $usuario->id)->get(['id'])->first();
                $idGenerico  = $objGenerico->id;
            }else if( $usuario->tp_user == 'PRO' ){
                $objGenerico = \App\Profissional::where('user_id', $usuario->id)->get(['id'])->first();
                $idGenerico  = $objGenerico->id;
            }
    
            foreach( $objGenerico->enderecos()->get(['id']) as $objEnderecos){
                $arEnderecos[] = $objEnderecos->id;
            }
            
            foreach( $objGenerico->contatos()->get(['id']) as $objContatos){
                $arContatos[] = $objContatos->id;
            }
            
            foreach( $objGenerico->documentos()->get(['id']) as $objDocumentos){
                $arDocumentos[] = $objDocumentos->id;
            }
            $objGenerico->enderecos()->detach();
            $objGenerico->contatos()->detach();
            $objGenerico->documentos()->detach();
            
            \App\Endereco::destroy($arEnderecos);
            \App\Contato::destroy($arContatos);
            \App\Documento::destroy($arDocumentos);
            
            if( $usuario->tp_user == 'PAC' ){
                \App\Paciente::destroy($idGenerico);
            }else if( $usuario->tp_user == 'PRO' ){
                \App\Profissional::destroy($idGenerico);
            }
            \App\User::destroy($usuario->id);
            
            DB::commit();
        }catch( Exception $e ){
            DB::rollBack(); 

            return redirect()->route('usuarios.index')->with('success', $e->getMessage());
        }
        
        return redirect()->route('usuarios.index')->with('success', 'Usuário apagado com sucesso!');
        
        return redirect('usuarios');
    }
}
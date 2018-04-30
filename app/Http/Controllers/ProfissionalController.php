<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\ProfissionaisEditRequest;
use App\User;
use App\Profissional;
use App\Especialidade;
use App\Estado;
use App\Cargo;
use App\Cidade;
use App\Contato;
use App\Endereco;

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissionals = Profissional::whereHas('user', function($query){
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
       
        $profissionals->load('user');
        $profissionals->load('documentos');
        $profissionals->load('especialidades');
        
        Request::flash();
        
        return view('profissionals.index', compact('profissionals'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profissionals.create');
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
        $arEspecialidade = Especialidade::orderBy('ds_especialidade')->get();
        $arEstados       = Estado::orderBy('ds_estado')->get();

        $usuarios  = User::findorfail($id);
        
        $profissionals = Profissional::where('user_id', '=', $id)->get()->first();
        $profissionals->load('especialidades');
        $profissionals->load('user');
        $profissionals->load('documentos');
        $profissionals->load('enderecos');
        $profissionals->load('contatos');
        
        $cidade = Cidade::findorfail($profissionals->enderecos->first()->cidade_id);
        
        return view('profissionals.show', [ 'profissionals'   => $profissionals,
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
        $arCargos        = Cargo::orderBy('ds_cargo')->get(['id', 'ds_cargo']);
        $arEstados       = Estado::orderBy('ds_estado')->get();
        $arEspecialidade = Especialidade::orderBy('ds_especialidade')->get();
        
        $usuarios = User::findorfail($idUsuario);
        
        $profissionals = Profissional::where('user_id', '=', $idUsuario)->get()->first();
        $profissionals->load('especialidades');
        $profissionals->load('user');
        $profissionals->load('documentos');
        $profissionals->load('enderecos');
        $profissionals->load('contatos');
        
        $cidade = Cidade::findorfail($profissionals->enderecos->first()->cidade_id);
        
        return view('profissionals.edit', ['profissionals'   => $profissionals,
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
        
        $profissional = Profissional::findorfail($idProfissional);
        $profissional->update($dados);
        $profissional->user()->update($dados);
        $profissional->especialidades()->update($dados);
        
        foreach( $dados['contato_id'] as $indice=>$contato_id){
            $contato = Contato::findorfail($contato_id);
            $contato->update(['tp_contato'=>$dados['tp_contato'][$indice], 'ds_contato'=>$dados['ds_contato'][$indice]]);
        }
        
        $endereco = Endereco::findorfail($dados['endereco_id']);
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
        
        return redirect()->route('profissionals.index')->with('success', 'O usuário foi atualizado com sucesso!');
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
        
        $profissionals = Profissional::findorfail($idProfissional);
        $profissionals->forceDelete();
        $profissionals->contatos()->forceDelete();
        $profissionals->enderecos()->forceDelete();
        $profissionals->documentos()->forceDelete();
        $profissionals->user()->forceDelete();
        
        return redirect()->route('profissionals.index')->with('success', 'Usuário apagado com sucesso!');
    }
    
    /**
     * Consulta profissionais atrelados a uma clínica.
     * 
     * @param integer $idClinica
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfissionaisPorClinica($idClinica){
        $profissional = \App\Profissional::where('clinica_id', '=', $idClinica)
                            ->get(['id', 'nm_primario', 'nm_secundario']);
        
        
        return Response()->json($profissional);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\ProfissionaisEditRequest;

class ProfissionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profissionals = \App\Profissional::WhereHas(
                                                'documentos', function($query){
                                                    if(!empty(Request::get('nm_busca'))){
                                                        if( Request::get('tp_filtro') == 'registro' ){
                                                            $query->where('te_documento', Request::get('nm_busca'));
                                                        }
                                                    }
                                                }
                                            )->where(
                                                function($query){
                                                    if(!empty(Request::get('nm_busca'))){
                                                        if( Request::get('tp_filtro') == 'nome' ){
                                                            $query->where(DB::raw('concat(to_str(nm_primario), to_str(nm_secundario))'), 
                                                                        'like', '%'.UtilController::toStr(Request::get('nm_busca'), true).'%');
                        
                                                        }
                                                    }
                                                }
                                            )->sortable()
                                             ->paginate(20);

       
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
        $usuarios = \App\User::create($request->all());
        
        $request->session()->flash('message', 'Profissional cadastrado com sucesso!');
        return redirect('/usuarios');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $idProfissional
     * @return \Illuminate\Http\Response
     */
    public function show($idProfissional)
    {
        $profissionals = \App\Profissional::findorfail($idProfissional);
        $profissionals->load('documentos');
        $profissionals->load('especialidades');

        return view('profissionals.show', compact('profissionals'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idProfissional)
    {
        $arEspecialidade = \App\Especialidade::all();
        
        $profissionals = \App\Profissional::findorfail($idProfissional);
        $profissionals->load('documentos');
        $profissionals->load('especialidades');
        
        return view('profissionals.edit', compact('profissionals', 'arEspecialidade'));
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
        
        $profissional = \App\Profissional::findorfail($idProfissional);
        $profissional->update($dados);
        $profissional->documentos()->update(['tp_documento'=>$dados['tp_documento'], 'te_documento'=>$dados['te_documento']]);
        if(!empty($dados['especialidade'])) $profissional->especialidades()->sync($dados['especialidade']);
        
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

        
        return redirect()->route('profissionals.index')->with('success', 'Profissional inativado com sucesso!');
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
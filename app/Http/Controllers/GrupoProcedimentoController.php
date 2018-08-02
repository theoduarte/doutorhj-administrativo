<?php

namespace App\Http\Controllers;

use App\GrupoProcedimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as CVXRequest;

class GrupoProcedimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$get_term = CVXRequest::get('search_term');
    	$search_term = UtilController::toStr($get_term);
    	
    	$grupo_procedimentos = GrupoProcedimento::where(DB::raw('to_str(ds_grupo)'), 'LIKE', '%'.$search_term.'%')->orderBy('id')->sortable()->paginate(10);
    	
    	return view('grupo_procedimentos.index', compact('grupo_procedimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('grupo_procedimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$grupo = GrupoProcedimento::create($request->all());
    	
    	$grupo();
    	
    	return redirect()->route('grupo_procedimentos.index')->with('success', 'O Grupo de Procedimento foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GrupoProcedimento  $grupoProcedimento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$grupo = GrupoProcedimento::findOrFail($id);
    	
    	return view('grupo_procedimentos.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GrupoProcedimento  $grupoProcedimento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$grupo = GrupoProcedimento::findOrFail($id);
    	
    	return view('grupo_procedimentos.edit', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GrupoProcedimento  $grupoProcedimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$grupo = GrupoProcedimento::findOrFail($id);    	
    	$grupo->update($request->all());
    	
    	return redirect()->route('grupo_procedimentos.index')->with('success', 'O Grupo de Procedimento foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GrupoProcedimento  $grupoProcedimento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$grupo = Menu::findOrFail($id);
    	
    	$grupo->delete();
    	
    	return redirect()->route('grupo_procedimentos.index')->with('success', 'Registro Excluído com sucesso!');
    }
}

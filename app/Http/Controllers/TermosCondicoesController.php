<?php

namespace App\Http\Controllers;

use App\TermosCondicao;
// use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Http\Request;
use App\Http\Requests\TermosCondicoesRequest;

class TermosCondicoesController extends Controller
{
    /**
     * The user repository instance.
     */
    protected $termosCondicoes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termosCondicoes = TermosCondicao::select('id', 'dt_inicial', 'dt_final')->paginate(10);
        
        return view('termos-condicoes.index', compact('termosCondicoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('termos-condicoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TermosCondicoesRequest $request)
    {
        $termCondition = TermosCondicao::create($request->all());       
        $termCondition->save();
        
        return redirect()->route('termos-condicoes.index')->with('success', 'O Termo e Condição foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TermosCondicoes  $termos_condico
     * @return \Illuminate\Http\Response
     */
    public function show(TermosCondicao $termos_condico)
    {
        return view('termos-condicoes.show', ['termosCondicoes' => $termos_condico]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TermosCondicoes  $termos_condico
     * @return \Illuminate\Http\Response
     */
    public function edit(TermosCondicao $termos_condico)
    {
        return view('termos-condicoes.edit', ['termosCondicoes' => $termos_condico]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TermosCondicoes  $termos_condico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TermosCondicao $termos_condico)
    {
        $termos_condico->update($request->all());
        $termos_condico->save();
        
        return redirect()->route('termos-condicoes.index')->with('success', 'O Termo e Condição foi alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TermosCondicoes  $termos_condico
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermosCondicao $termos_condico)
    {
        //
    }
}

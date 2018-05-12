<?php

namespace App\Http\Controllers;

use App\CupomDesconto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;

class CupomDescontoController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 		$action = Route::current();
        // 		$action_name = $action->action['as'];
        
        // 		$this->middleware("cvx:$action_name");
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_term = CVXRequest::get('search_term');
        $search_term = UtilController::toStr($get_term);
        
        $cupom_descontos = CupomDesconto::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
        
        return view('cupom_descontos.index', compact('cupom_descontos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cupom_descontos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cupom_desconto = CupomDesconto::create($request->all());
        
        $cupom_desconto->dt_inicio = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1", $cupom_desconto->dt_inicio);
        $cupom_desconto->dt_fim = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1", $cupom_desconto->dt_fim);
        $cupom_desconto->dt_nascimento = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1", $cupom_desconto->dt_nascimento);
        
        $cupom_desconto->save();
        
        return redirect()->route('cupom_descontos.index')->with('success', 'O Cupom de Desconto foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CupomDesconto  $cupomDesconto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cupom_desconto = CupomDesconto::findOrFail($id);
        
        return view('cupom_descontos.show', compact('cupom_desconto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CupomDesconto  $cupomDesconto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cupom_desconto = CupomDesconto::findOrFail($id);
        
        return view('cupom_descontos.edit', compact('cupom_desconto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CupomDesconto  $cupomDesconto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cupom_desconto = CupomDesconto::findOrFail($id);
        
        $cupom_desconto->update($request->all());
        
        return redirect()->route('cupom_descontos.index')->with('success', 'O Cupom de Desconto foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CupomDesconto  $cupomDesconto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cupom_desconto = CupomDesconto::findOrFail($id);
        
        $cupom_desconto->cs_status = 'I';
        $cupom_desconto->save();
        
        return redirect()->route('cupom_descontos.index')->with('success', 'Registro Desativado com sucesso!');
    }
}

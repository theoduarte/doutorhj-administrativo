<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Tipoatendimento;

class TipoatendimentoController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        try {
            $action = Route::current();
            $action_name = $action->action['as'];
            
            $this->middleware("cvx:$action_name");
        } catch (\Exception $e) {}
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
    	 
    	$tipo_atendimentos = Tipoatendimento::where(DB::raw('to_str(cd_atendimento)'), 'LIKE', '%'.$search_term.'%')->orWhere(DB::raw('to_str(ds_atendimento)'), 'LIKE', '%'.$search_term.'%')->orderBy('id')->sortable()->paginate(10);
    	 
    	return view('tipo_atendimentos.index', compact('tipo_atendimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('tipo_atendimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$tipo_atendimento = Tipoatendimento::create($request->all());
    	 
    	$tipo_atendimento->save();
    	 
    	return redirect()->route('tipo_atendimentos.index')->with('success', 'O Tipo de atendimento foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$tipo_atendimento = Tipoatendimento::findOrFail($id);
    	 
    	return view('tipo_atendimentos.show', compact('tipo_atendimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$tipo_atendimento = Tipoatendimento::findOrFail($id);
    	 
    	return view('tipo_atendimentos.edit', compact('tipo_atendimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$tipo_atendimento = Tipoatendimento::findOrFail($id);
    	 
    	$tipo_atendimento->update($request->all());
    	 
    	return redirect()->route('tipo_atendimentos.index')->with('success', 'O Tipo de atendimento foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$tipo_atendimento = Tipoatendimento::findOrFail($id);
    	 
    	$tipo_atendimento->delete();
    	 
    	return redirect()->route('tipo_atendimentos.index')->with('success', 'Registro Excluído com sucesso!');
    }
}

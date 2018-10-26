<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;
use App\Procedimento;
use App\GrupoProcedimento;
use App\Tipoatendimento;

class ProcedimentoController extends Controller
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
    	
    	$procedimentos = Procedimento::with('tag_populars')->where(DB::raw('to_str(cd_procedimento)'), 'LIKE', '%'.$search_term.'%')->orWhere(DB::raw('to_str(ds_procedimento)'), 'LIKE', '%'.$search_term.'%')->orderby('ds_procedimento', 'asc')->sortable()->paginate(10);
    	
    	return view('procedimentos.index', compact('procedimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$grupo_atendimentos = GrupoProcedimento::orderBy('ds_grupo', 'asc')->pluck('ds_grupo', 'id');
    	$tipo_atendimentos = Tipoatendimento::orderBy('ds_atendimento', 'asc')->pluck('ds_atendimento', 'id');
    	
    	return view('procedimentos.create', compact('grupo_atendimentos', 'tipo_atendimentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$procedimento = Procedimento::create($request->all());
    	
    	$procedimento->save();
    	
    	return redirect()->route('procedimentos.index')->with('success', 'O Procedimento foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$procedimento = Procedimento::findOrFail($id);
    	$procedimento->load('tipoatendimento');
    	$procedimento->load('grupoprocedimento');
    	
    	return view('procedimentos.show', compact('procedimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$procedimento = Procedimento::findOrFail($id);
    	
    	$grupo_atendimentos = GrupoProcedimento::orderBy('ds_grupo', 'asc')->pluck('ds_grupo', 'id');
    	$tipo_atendimentos = Tipoatendimento::orderBy('ds_atendimento', 'asc')->pluck('ds_atendimento', 'id');
    	
    	return view('procedimentos.edit', compact('procedimento', 'grupo_atendimentos', 'tipo_atendimentos'));
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
    	//$this->validate($request, Volunteer::$rules);
    	
    	$procedimento = Procedimento::findOrFail($id);
    	
    	$procedimento->update($request->all());
    	
    	return redirect()->route('procedimentos.index')->with('success', 'O Procedimento foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$procedimento = Procedimento::findOrFail($id);
    	
    	$procedimento->delete();
    	
    	return redirect()->route('procedimentos.index')->with('success', 'Registro Excluído com sucesso!');
    }
}

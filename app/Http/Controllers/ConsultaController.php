<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;
use App\Consulta;
use App\Especialidade;
use App\Tipoatendimento;

class ConsultaController extends Controller
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
    	
    	$consultas = Consulta::with('tag_populars')->where(DB::raw('to_str(cd_consulta)'), 'LIKE', '%'.$search_term.'%')->orWhere(DB::raw('to_str(ds_consulta)'), 'LIKE', '%'.$search_term.'%')->orderby('ds_consulta', 'asc')->sortable()->paginate(10);
    	
    	return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$especialidades = Especialidade::orderBy('ds_especialidade', 'asc')->pluck('ds_especialidade', 'id');
    	$tipo_atendimentos = Tipoatendimento::orderBy('ds_atendimento', 'asc')->pluck('ds_atendimento', 'id');
    	 
    	return view('consultas.create', compact('especialidades', 'tipo_atendimentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$consulta = Consulta::create($request->all());
    	
    	$consulta->save();
    	
    	return redirect()->route('consultas.index')->with('success', 'O Consulta foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$consulta = Consulta::findOrFail($id);
    	$consulta->load('especialidade');
    	$consulta->load('tipoatendimento');
    	
    	return view('consultas.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$consulta = Consulta::findOrFail($id);
    	$especialidades = Especialidade::orderBy('ds_especialidade', 'asc')->pluck('ds_especialidade', 'id');
    	$tipo_atendimentos = Tipoatendimento::orderBy('ds_atendimento', 'asc')->pluck('ds_atendimento', 'id');
    	
    	return view('consultas.edit', compact('consulta', 'especialidades', 'tipo_atendimentos'));
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
    	
    	$consulta = Consulta::findOrFail($id);
    	
    	$consulta->update($request->all());
    	
    	return redirect()->route('consultas.index')->with('success', 'O Consulta foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$consulta = Consulta::findOrFail($id);
    	
    	$consulta->delete();
    	
    	return redirect()->route('consultas.index')->with('success', 'Registro Excluído com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Logradouro;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Http\Request;
use App\Cidade;

class LogradouroController extends Controller
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
    	
    	$logradouros = Logradouro::where(DB::raw('to_str(te_logradouro)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
    	
    	return view('logradouros.index', compact('logradouros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$cidades = Cidade::orderBy('nm_cidade')->get();
    	
    	return view('logradouros.create', compact('cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$logradouro           	= new Logradouro($request->all());
    	$logradouro->nr_cep 	= UtilController::retiraMascara($request->input('nr_cep'));
    	
    	$logradouro->save();
    	
    	return redirect()->route('logradouros.index')->with('success', 'O Logradouro foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logradouro  $logradouro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$logradouro = Logradouro::findOrFail($id);
    	 
    	return view('logradouros.show', compact('logradouro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logradouro  $logradouro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$logradouro = Logradouro::findOrFail($id);
    	$cidades = Cidade::orderBy('nm_cidade')->get();
    	
    	return view('logradouros.edit', compact('logradouro', 'cidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logradouro  $logradouro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$logradouro = Logradouro::findOrFail($id);
    	 
    	$logradouro->nr_cep 	= UtilController::retiraMascara($request->input('nr_cep'));
    	$endereco->tp_logradouro = CVXRequest::post('tp_logradouro');
    	$endereco->te_logradouro = CVXRequest::post('te_logradouro');
    	$endereco->nr_logradouro = CVXRequest::post('nr_logradouro');
    	$endereco->nr_ddd = CVXRequest::post('nr_ddd');
    	$endereco->altitude = CVXRequest::post('altitude');
    	$endereco->latitude = CVXRequest::post('latitude');
    	$endereco->longitute = CVXRequest::post('longitute');
    	$endereco->te_bairro = CVXRequest::post('te_bairro');
    	$endereco->sg_estado = CVXRequest::post('sg_estado');
    	$endereco->cd_ibge = CVXRequest::post('cd_ibge');
    	
    	$logradouro->save();
    	 
    	return redirect()->route('logradouros.index')->with('success', 'O Logradouro foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logradouro  $logradouro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logradouro = Logradouro::findOrFail($id);
    	 
    	$logradouro->delete();
    	 
    	return redirect()->route('logradouros.index')->with('success', 'Registro Excluído com sucesso!');
    }
}

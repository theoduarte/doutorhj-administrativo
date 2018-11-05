<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;
use App\Cargo;

class CargoController extends Controller
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
    	
    	$cargos = Cargo::where(DB::raw('to_str(ds_cargo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
    	
    	return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('cargos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$cargo = Cargo::create($request->all());
    	
    	$cargo->save();
    	
    	return redirect()->route('cargos.index')->with('success', 'O Cargo foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$cargo = Cargo::findOrFail($id);
    	
    	return view('cargos.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$cargo = Cargo::findOrFail($id);
    	
    	return view('cargos.edit', compact('cargo'));
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
    	
    	$cargo = Cargo::findOrFail($id);
    	
    	$cargo->update($request->all());
    	
    	return redirect()->route('cargos.index')->with('success', 'O Cargo foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$cargo = Cargo::findOrFail($id);
    	
    	$cargo->delete();
    	
    	return redirect()->route('cargos.index')->with('success', 'Registro Excluído com sucesso!');
    }
}

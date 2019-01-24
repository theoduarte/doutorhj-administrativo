<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;
use App\Corretor;

class CorretorController extends Controller
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
    	 
    	$corretors = Corretor::with('documento', 'contato')->where(DB::raw('to_str(nm_primario)'), 'LIKE', '%'.$search_term.'%')->orWhere(DB::raw('to_str(nm_secundario)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
    	 
    	return view('corretors.index', compact('corretors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('corretors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$corretor = Corretor::create($request->all());
    	 
    	$corretor->save();
    	 
    	return redirect()->route('corretors.index')->with('success', 'O Corretor foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$corretor = Corretor::findOrFail($id);
    	 
    	return view('corretors.show', compact('corretor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$corretor = Corretor::findOrFail($id);
    	 
    	return view('corretors.edit', compact('corretor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$corretor = Corretor::findOrFail($id);
    	 
    	$corretor->update($request->all());
    	 
    	return redirect()->route('corretors.index')->with('success', 'O Corretor foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$corretor = Corretor::findOrFail($id);
    	 
    	$corretor->cs_status = 'I';
    	
    	if ($corretor->save()) {
    		return redirect()->route('corretors.index')->with('success', 'Registro Excluído com sucesso!');
    	}
    	
    	return redirect()->route('corretors.index')->with('error', 'Registro não foi Excluído. Por favor, tente novamente.');
    }
}

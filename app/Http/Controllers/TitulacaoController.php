<?php

namespace App\Http\Controllers;

use App\Titulacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;
use App\Requisito;

class TitulacaoController extends Controller
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
    	
    	$titulacaos = Titulacao::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
    	
    	return view('titulacaos.index', compact('titulacaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//$list_requisitos = Requisito::orderBy('titulo', 'asc')->get();
    	
        return view('titulacaos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titulacao = Titulacao::create($request->all());
        
        $titulacao->save();
        
        return redirect()->route('titulacaos.index')->with('success', 'A Titulação foi cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Titulacao  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $titulacao = Titulacao::findOrFail($id);
        
        return view('titulacaos.show', compact('titulacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Titulacao  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulacao = Titulacao::findOrFail($id);
        
        return view('titulacaos.edit', compact('titulacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titulacao  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $titulacao = Titulacao::findOrFail($id);
        
        $titulacao->update($request->all());
        
        return redirect()->route('titulacaos.index')->with('success', 'A Titulação foi editada com sucesso!');
    }
}

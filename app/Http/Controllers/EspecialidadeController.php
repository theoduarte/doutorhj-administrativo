<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;
use App\Especialidade;
use App\Titulacao;

class EspecialidadeController extends Controller
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
        
        $especialidades = Especialidade::where(DB::raw('to_str(ds_especialidade)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
        
        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$list_titulacaos = Titulacao::orderBy('titulo', 'asc')->get();
    	
    	return view('especialidades.create', compact('list_titulacaos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $especialidade = Especialidade::create($request->all());
        
        $especialidade->save();
        
        return redirect()->route('especialidades.index')->with('success', 'A Especialidade foi cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidade  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        
        return view('especialidades.show', compact('especialidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidade  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        $list_titulacaos = Titulacao::orderBy('titulo', 'asc')->get();
        
        return view('especialidades.edit', compact('especialidade', 'list_titulacaos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidade  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $especialidade = Especialidade::findOrFail($id);
        
        $especialidade->update($request->all());
        
        return redirect()->route('especialidades.index')->with('success', 'A Especialidade foi editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidade  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        
        $especialidade->delete();
        //$especialidade->cs_status = 'I';
        //$especialidade->save();
        
        return redirect()->route('especialidades.index')->with('success', 'Registro Excluído com sucesso!');
    }
}

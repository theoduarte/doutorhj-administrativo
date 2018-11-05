<?php

namespace App\Http\Controllers;

use App\AreaAtuacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;

class AreaAtuacaoController extends Controller
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
        
        $areas_atuacao = AreaAtuacao::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
        
        return view('area_atuacaos.index', compact('areas_atuacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('area_atuacaos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area_atuacao = AreaAtuacao::create($request->all());
        
        $area_atuacao->save();
        
        return redirect()->route('area_atuacaos.index')->with('success', 'A Área de Atuação foi cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AreaAtuacao  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area_atuacao = AreaAtuacao::findOrFail($id);
        
        return view('area_atuacaos.show', compact('area_atuacao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AreaAtuacao  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area_atuacao = AreaAtuacao::findOrFail($id);
        
        return view('area_atuacaos.edit', compact('area_atuacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AreaAtuacao  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $area_atuacao = AreaAtuacao::findOrFail($id);
        
        $area_atuacao->update($request->all());
        
        return redirect()->route('area_atuacaos.index')->with('success', 'A Área de Atuação foi editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AreaAtuacao  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area_atuacao = AreaAtuacao::findOrFail($id);
        
        //$area_atuacao->delete();
        $area_atuacao->cs_status = 'I';
        $area_atuacao->save();
        
        return redirect()->route('area_atuacaos.index')->with('success', 'Registro Excluído com sucesso!');
    }
}

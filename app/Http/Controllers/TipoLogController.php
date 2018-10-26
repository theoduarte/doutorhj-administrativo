<?php

namespace App\Http\Controllers;

use App\TipoLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class TipoLogController extends Controller
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
        
        $tipos = TipoLog::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
        
        return view('tipo_logs.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_logs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = TipoLog::create($request->all());
        
        $tipo->save();
        
        return redirect()->route('tipo_logs.index')->with('success', 'O Tipo de Log foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoLog  $tipoLog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = TipoLog::findOrFail($id);
        
        return view('tipo_logs.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoLog  $tipoLog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = TipoLog::findOrFail($id);
        
        return view('tipo_logs.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoLog  $tipoLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipo = TipoLog::findOrFail($id);
        
        $tipo->update($request->all());
        
        return redirect()->route('tipo_logs.index')->with('success', 'O Tipo de Log foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoLog  $tipoLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = TipoLog::findOrFail($id);
        
        $tipo->delete();
        
        return redirect()->route('tipo_logs.index')->with('success', 'Registro Excluído com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\RegistroLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegistroLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$get_term = CVXRequest::get('search_term');
    	$search_term = UtilController::toStr($get_term);
    	 
    	$registros = RegistroLog::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->orWhere(DB::raw('to_str(descricao)'), 'LIKE', '%'.$search_term.'%')->orderby('created_at', 'desc')->sortable()->paginate(10);
    	
    	foreach ($registros as $registro) {
    	    //$registro->descricao = json_decode('['.$registro->descricao.']', true);
    	    //$registro->descricao = str_replace('reg_anterior', '"reg_anterior"', $registro->descricao);
    	    //$registro->descricao = str_replace('reg_novo', '"reg_novo"', $registro->descricao);
    	    //dd('['.((string)$registro->descricao).']');
    	    $object = json_decode( ((string)$registro->descricao), true );
    	    //dd($object);
    	    $registro->descricao = $object;
    	}
    	
    	//dd($registros);
    	 
    	return view('registro_logs.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RegistroLog  $registroLog
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroLog $registroLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegistroLog  $registroLog
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroLog $registroLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegistroLog  $registroLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroLog $registroLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegistroLog  $registroLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroLog $registroLog)
    {
        //
    }
    
    /**
     * Registra os logs of specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function registrarLog($titulo, $descricao, $tipo_log)
    {
    	$log = new RegistroLog();
    	$log->titulo = $titulo;
    	$log->descricao = $descricao;
    	$log->tipolog_id = $tipo_log;
    	$log->user_id = Auth::user()->id;
    	$log->save();
    }
}

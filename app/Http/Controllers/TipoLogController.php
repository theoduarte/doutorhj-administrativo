<?php

namespace App\Http\Controllers;

use App\TipoLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;

class TipoLogController extends Controller
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
        
        $tipos = TipoLog::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->orderby('created_at', 'desc')->sortable()->paginate(10);
        
        return view('tipo_logs.index', compact('tipos'));
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
     * @param  \App\TipoLog  $tipoLog
     * @return \Illuminate\Http\Response
     */
    public function show(TipoLog $tipoLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoLog  $tipoLog
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoLog $tipoLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoLog  $tipoLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoLog $tipoLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoLog  $tipoLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoLog $tipoLog)
    {
        //
    }
}

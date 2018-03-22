<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Consulta;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = \App\Agendamento::where('id', 1)->sortable()->paginate(20);
        
        Request::flash();
        
        return view('agenda.index', compact('agenda'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idAgenda)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idAgenda)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idAgenda)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAgenda)
    {
        
    }
    
    /**
     * Consulta para alimentar autocomplete
     * 
     * @param unknown $dsLocalAtendimento
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLocalAtendimento($consulta){
        $arResultado = array();
        $consultas = \App\Clinica::where(function($query){
            global $consulta;
            
            $query->where(DB::raw('to_str(nm_razao_social)'), 'like', '%'.UtilController::toStr($consulta).'%');
            $query->orWhere(DB::raw('to_str(nm_fantasia)'), 'like', '%'.UtilController::toStr($consulta).'%');
        })->get();
        
        foreach ($consultas as $query)
        {
            $arResultado[] = [ 'id' => $query->id.' | '.$query->nm_razao_social ];
        }
        
        return Response()->json($arResultado);
    }
}

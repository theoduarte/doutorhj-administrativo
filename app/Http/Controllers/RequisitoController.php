<?php

namespace App\Http\Controllers;

use App\Requisito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RequisitosRequest;

class RequisitoController extends Controller
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
        
        $requisitos = Requisito::where(DB::raw('to_str(titulo)'), 'LIKE', '%'.$search_term.'%')->sortable()->paginate(10);
        
        return view('requisitos.index', compact('requisitos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requisitos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequisitosRequest $request)
    {
        $requisito = Requisito::create($request->all());
        
        $requisito->save();
        
        return redirect()->route('requisitos.index')->with('success', 'O Requisito foi cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisito  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisito = Requisito::findOrFail($id);
        
        return view('requisitos.show', compact('requisito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisito  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisito = Requisito::findOrFail($id);
        
        return view('requisitos.edit', compact('requisito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requisito  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function update(RequisitosRequest $request, $id)
    {
        $requisito = Requisito::findOrFail($id);
        
        $requisito->update($request->all());
        
        return redirect()->route('requisitos.index')->with('success', 'O Requisito foi editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisito  $areaAtuacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requisito = Requisito::findOrFail($id);
        
        $requisito->delete();
        //$requisito->cs_status = 'I';
        //$requisito->save();
        
        return redirect()->route('requisitos.index')->with('success', 'Registro Excluído com sucesso!');
    }
    
    /**
     * Consulta para alimentar autocomplete
     *
     * @param string $termo
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRequisitos(){
        
        $termo = CVXRequest::post('titulo');
        $arResultado = array();
        //DB::enableQueryLog();
        $requisitos = Requisito::where(DB::raw('to_str(titulo)'), 'like', '%'.UtilController::toStr($termo).'%')->orderBy('titulo')->get();
        //dd( DB::getQueryLog() );
        
        foreach ($requisitos as $query)
        {
            $arResultado[] = [ 'id' => $query->id, 'value' => $query->titulo ];
        }
        
        return Response()->json($arResultado);
    }
}

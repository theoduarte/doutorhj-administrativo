<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Atendimento;

class AtendimentoController extends Controller
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
    
    //############# AJAX SERVICES ##################
    /**
     * loadTagPopularList a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadAtendimentoShow(Request $request)
    {
        $atendimento_id = CVXRequest::post('atendimento_id');
        
        $atendimento = Atendimento::findorfail($atendimento_id);
        
        if($atendimento->procedimento_id != null) {
        	$atendimento->load('procedimento');
        }
        
        if($atendimento->consulta_id != null) {
        	$atendimento->load('consulta');
        }
        
        $atendimento->load('filials');
        
        return response()->json(['status' => true, 'atendimento' => $atendimento->toJson()]);
    }
}

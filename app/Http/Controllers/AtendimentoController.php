<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Http\Request;
use App\Atendimento;

class AtendimentoController extends Controller
{   
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
        
        return response()->json(['status' => true, 'atendimento' => $atendimento->toJson()]);
    }
}

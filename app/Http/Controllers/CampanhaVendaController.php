<?php

namespace App\Http\Controllers;

use App\CampanhaVenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use App\Empresa;
use Illuminate\Support\Facades\DB;
use App\Campanha;

class CampanhaVendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\CampanhaVenda  $campanhaVenda
     * @return \Illuminate\Http\Response
     */
    public function show(CampanhaVenda $campanhaVenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CampanhaVenda  $campanhaVenda
     * @return \Illuminate\Http\Response
     */
    public function edit(CampanhaVenda $campanhaVenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CampanhaVenda  $campanhaVenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CampanhaVenda $campanhaVenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CampanhaVenda  $campanhaVenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampanhaVenda $campanhaVenda)
    {
        //
    }
    
    //############# AJAX SERVICES ##################
    /**
     * addCampanhaStore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCampanhaStore(Request $request)
    {
    	$campanha_id    = CVXRequest::post('campanha_id');
    	$url_campanha   = CVXRequest::post('url_campanha');
    	$data_inicio   	= CVXRequest::post('data_inicio');
    	$data_fim  		= CVXRequest::post('data_fim');
    	$cs_status    	= CVXRequest::post('cs_status');
    	$plano_id    	= CVXRequest::post('plano_id');
    	$empresa_id    	= CVXRequest::post('empresa_id');
    	$empresa       	= Empresa::findorfail($empresa_id);

    	########### STARTING TRANSACTION ############
    	DB::beginTransaction();
    	#############################################
    	try {
    
    		# dados da campanha
    		if(isset($campanha_id) && $campanha_id != '') {
    			$campanha = CampanhaVenda::findorfail($campanha_id);
    		} else {
    			$campanha = new CampanhaVenda();
    		}
    
    		$campanha->url_param		= $url_campanha;
    		$campanha->data_inicio		= $data_inicio.':00';
    		$campanha->data_fim			= $data_fim.':59';
    		$campanha->cs_status		= 'A';
    		$campanha->plano_id			= $plano_id;
    		$campanha->empresa_id		= $empresa_id;
    		
    		if ($campanha->save()) {
    	   
    			$campanha_id = $campanha->id;
    			 
    			# registra log
    			$campanha_obj         = $campanha->toJson();
    	   
    			$titulo_log = 'Adicionar Campanha';
    			$ct_log   = '"reg_anterior":'.'{}';
    			$new_log  = '"reg_novo":'.'{"campanha":'.$campanha_obj.'}';
    			$tipo_log = 1;
    	   
    			$log = "{".$ct_log.",".$new_log."}";
    	   
    			$reglog = new RegistroLogController();
    			$reglog->registrarLog($titulo_log, $log, $tipo_log);
    			 
    		} else {
    			return response()->json(['status' => false, 'mensagem' => 'A Campanha não foi salva. Por favor, tente novamente.']);
    		}
    	} catch (\Exception $e) {
    		########### FINISHIING TRANSACTION ##########
    		DB::rollback();
    		#############################################
    		return response()->json(['status' => false, 'mensagem' => 'A Campanha não foi salva, pois ocorreu uma Falha. Por favor, tente novamente.']);
    	}
    
    	########### FINISHIING TRANSACTION ##########
    	DB::commit();
    	#############################################
    
    	return response()->json(['status' => true, 'mensagem' => 'A Campanha foi salva com sucesso!', 'campanha_id' => $campanha_id]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCampanhaDestroy()
    {
    	$campanha_id = CVXRequest::post('campanha_id');
    	$campanha = Campanha::findorfail($campanha_id);
    	$filial->cs_status = 'I';
    
    	if ($campanha->save()) {
    
    		# registra log
    		$campanha_obj = $campanha->toJson();
    
    		$titulo_log = 'Excluir Filial';
    		$ct_log   = '"reg_anterior":'.'{}';
    		$new_log  = '"reg_novo":'.'{"campanha":'.$campanha_obj.'}';
    		$tipo_log = 4;
    
    		$log = "{".$ct_log.",".$new_log."}";
    
    		$reglog = new RegistroLogController();
    		$reglog->registrarLog($titulo_log, $log, $tipo_log);
    
    	} else {
    		return response()->json(['status' => false, 'mensagem' => 'A Campanha não foi removida. Por favor, tente novamente.']);
    	}
    
    	return response()->json(['status' => true, 'mensagem' => 'A Campanha foi removida com sucesso!', 'campanha' => $campanha->toJson()]);
    }
}

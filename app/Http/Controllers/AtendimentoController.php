<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Atendimento;
use Illuminate\Support\Facades\DB;
use App\Preco;
use App\TipoPreco;

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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePrecos()
    {
    	return view('atendimentos.update_precos');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePrecoConsultas(Request $request)
    {
    	
    	if(!empty($request->file('consultas'))) {
    		$consultas = $request->file('consultas');
    		
    		$path = $request->file('consultas')->getRealPath();
    		 
    		//dd($path);
    		
    		$data = UtilController::csvToArray($path, ';');
    		//dd($data);
    		
    		########### STARTING TRANSACTION ############
    		DB::beginTransaction();
    		#############################################
    		
    		try {
    		
	    		foreach ($data as $atendimento) {
	    		    $vigencia = $atendimento["data_inicio"].' - '.$atendimento["data_fim"];
	    			$data_vigencia = UtilController::getDataRangeTimePickerToCarbon($vigencia);
	     			//dd($atendimento);
	    			//dd($atendimento["id"]);
	    			$atendimento_id = $atendimento["﻿id"];
	    			
	    			//$atendimento = Atendimento::where(['clinica_id' => $atendimento['clinicaid'], 'consulta_id' => $consulta_id, 'cs_status' => 'A'])->first();
	    			$ct_atendimento = Atendimento::findorfail($atendimento_id);
	    			
	    			$consulta_id = $ct_atendimento->consulta_id;
	    			
	    			if(is_null($ct_atendimento)) {
	    				$ct_atendimento = new Atendimento();
	    				$ct_atendimento->clinica_id = $atendimento["clinica_id"];
	    				$ct_atendimento->consulta_id = $consulta_id;
	    				$ct_atendimento->ds_preco =  $atendimento["atendimentos"];
	    				$ct_atendimento->cs_status = 'A';
	    				$ct_atendimento->save();
	    			}
	    			//dd($atendimento);
	    			if($atendimento["comercial"] != '' & $atendimento["net"] != '') {
	    				$preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 1, 'cs_status' => 'A']);
	    				
	    				//--preco open-------------------------------
	    				if(!$preco->exists()) {
	    					$preco = new Preco();
	    				}
	    				
	    				$preco->cd_preco = $ct_atendimento->id;
	    				$preco->atendimento_id = $ct_atendimento->id;
	    				$preco->plano_id = 1;
	    				$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
	    				$preco->cs_status = 'A';
	    				$preco->data_inicio = $data_vigencia['de'];
	    				$preco->data_fim = $data_vigencia['ate'];
	    				$preco->vl_comercial = $atendimento["comercial"];
	    				$preco->vl_net = $atendimento["net"];
	    				$preco->save();
	    				
	    				//--preco premium-------------------------------
	    				$preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 2, 'cs_status' => 'A']);
	    				if(!$preco->exists()) {
	    					$preco = new Preco();
	    				}
	    				
	    				$preco->cd_preco = $ct_atendimento->id;
	    				$preco->atendimento_id = $ct_atendimento->id;
	    				$preco->plano_id = 2;
	    				$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
	    				$preco->cs_status = 'A';
	    				$preco->data_inicio = $data_vigencia['de'];
	    				$preco->data_fim = $data_vigencia['ate'];
	    				$preco->vl_comercial = $atendimento["premium"];
	    				$preco->vl_net = $atendimento["net"];
	    				$preco->save();
	    				
	    				//--preco blue-------------------------------
	    				$preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 3, 'cs_status' => 'A']);
	    				if(!$preco->exists()) {
	    					$preco = new Preco();
	    				}
	    				
	    				$preco->cd_preco = $ct_atendimento->id;
	    				$preco->atendimento_id = $ct_atendimento->id;
	    				$preco->plano_id = 3;
	    				$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
	    				$preco->cs_status = 'A';
	    				$preco->data_inicio = $data_vigencia['de'];
	    				$preco->data_fim = $data_vigencia['ate'];
	    				$preco->vl_comercial = $atendimento["blue"];
	    				$preco->vl_net = $atendimento["net"];
	    				$preco->save();
	    				
	    				//--preco black-------------------------------
	    				$preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 4, 'cs_status' => 'A']);
	    				if(!$preco->exists()) {
	    					$preco = new Preco();
	    				}
	    				
	    				$preco->cd_preco = $ct_atendimento->id;
	    				$preco->atendimento_id = $ct_atendimento->id;
	    				$preco->plano_id = 4;
	    				$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
	    				$preco->cs_status = 'A';
	    				$preco->data_inicio = $data_vigencia['de'];
	    				$preco->data_fim = $data_vigencia['ate'];
	    				$preco->vl_comercial = $atendimento["black"];
	    				$preco->vl_net = $atendimento["net"]; 
	    				$preco->save();
	    				
	    				//--preco plus-------------------------------
	    				$preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 5, 'cs_status' => 'A']);
	    				if(!$preco->exists()) {
	    					$preco = new Preco();
	    				}
	    				
	    				$preco->cd_preco = $ct_atendimento->id;
	    				$preco->atendimento_id = $ct_atendimento->id;
	    				$preco->plano_id = 5;
	    				$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
	    				$preco->cs_status = 'A';
	    				$preco->data_inicio = $data_vigencia['de'];
	    				$preco->data_fim = $data_vigencia['ate'];
	    				$preco->vl_comercial = $atendimento["plus"];
	    				$preco->vl_net = $atendimento["net"]; 
	    				$preco->save();
	    			}
	    		}
	    		
    		} catch (\Exception $e) {
    			########### FINISHIING TRANSACTION ##########
    			DB::rollback();
    			#############################################
    			return redirect()->route('atualizar-precos')->with('error-alert', 'Os Preços das Consultas não foram atualizados. Por favor, tente novamente.');
    		}
    		
    		########### FINISHIING TRANSACTION ##########
    		DB::commit();
    		#############################################
    	}
    	 
    	return redirect()->route('atualizar-precos')->with('success', 'Os Preços das Consultas foram atualizadas com sucesso!');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePrecoProcedimentos(Request $request)
    {
    	if(!empty($request->file('procedimentos'))) {
    		$consultas = $request->file('procedimentos');
    	
    		$path = $request->file('procedimentos')->getRealPath();
    		 
    		//dd($path);
    	
    		$data = UtilController::csvToArray($path, ';');
    		//dd($data);
    	
    		########### STARTING TRANSACTION ############
    		DB::beginTransaction();
    		#############################################
    	
    		try {
    	
    			foreach ($data as $atendimento) {
    	
    				$vigencia = $atendimento["data_inicio"].' - '.$atendimento["data_fim"];
    				$data_vigencia = UtilController::getDataRangeTimePickerToCarbon($vigencia);
    				//dd($atendimento);
    				$atendimento_id = $atendimento["﻿id"];
    				//$atendimento = Atendimento::where(['clinica_id' => $atendimento['clinicaid'], 'consulta_id' => $consulta_id, 'cs_status' => 'A'])->first();
    				$ct_atendimento = Atendimento::findorfail($atendimento_id);
    	
    				$procedimento_id = $ct_atendimento->procedimento_id;
    	
    				if(is_null($ct_atendimento)) {
    					$ct_atendimento = new Atendimento();
    					$ct_atendimento->clinica_id = $atendimento["clinica_id"];
    					$ct_atendimento->consulta_id = $procedimento_id;
    					$ct_atendimento->ds_preco =  $atendimento["exames"];
    					$ct_atendimento->cs_status = 'A';
    					$ct_atendimento->save();
    				}
    				//dd($atendimento);
    				if($atendimento["comercial"] != '' & $atendimento["net"] != '') {
    					$preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 1, 'cs_status' => 'A']);
    		    
    					//--preco open-------------------------------
    					if(!$preco->exists()) {
    						$preco = new Preco();
    					}
    					
    					$preco->cd_preco = $ct_atendimento->id;
    					$preco->atendimento_id = $ct_atendimento->id;
    					$preco->plano_id = 1;
    					$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
    					$preco->cs_status = 'A';
    					$preco->data_inicio = $data_vigencia['de'];
    					$preco->data_fim = $data_vigencia['ate'];
    					$preco->vl_comercial = $atendimento["comercial"];
    					$preco->vl_net = $atendimento["net"];
    					$preco->save();
    					
    					//--preco premium-------------------------------
    					$preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 2, 'cs_status' => 'A']);
    					if(!$preco->exists()) {
    						$preco = new Preco();
    					}
    					
    					$preco->cd_preco = $ct_atendimento->id;
    					$preco->atendimento_id = $ct_atendimento->id;
    					$preco->plano_id = 2;
    					$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
    					$preco->cs_status = 'A';
    					$preco->data_inicio = $data_vigencia['de'];
    					$preco->data_fim = $data_vigencia['ate'];
    					$preco->vl_comercial = $atendimento["premium"];
    					$preco->vl_net = $atendimento["net"];    					 
    					$preco->save();
    					
    					//--preco blue-------------------------------
    					$preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 3, 'cs_status' => 'A']);
    					if(!$preco->exists()) {
    						$preco = new Preco();
    					}
    					
    					$preco->cd_preco = $ct_atendimento->id;
    					$preco->atendimento_id = $ct_atendimento->id;
    					$preco->plano_id = 3;
    					$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
    					$preco->cs_status = 'A';
    					$preco->data_inicio = $data_vigencia['de'];
    					$preco->data_fim = $data_vigencia['ate'];
    					$preco->vl_comercial = $atendimento["blue"];
    					$preco->vl_net = $atendimento["net"];
    					$preco->save();		
    		    
    					//--preco black-------------------------------
    					$preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 4, 'cs_status' => 'A']);
    					if(!$preco->exists()) {
    						$preco = new Preco();
    					}
    					
    					$preco->cd_preco = $ct_atendimento->id;
    					$preco->atendimento_id = $ct_atendimento->id;
    					$preco->plano_id = 4;
    					$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
    					$preco->cs_status = 'A';
    					$preco->data_inicio = $data_vigencia['de'];
    					$preco->data_fim = $data_vigencia['ate'];
    					$preco->vl_comercial = $atendimento["black"];
    					$preco->vl_net = $atendimento["net"];
    					$preco->save();
    					
    					//--preco plus-------------------------------
    					$preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 5, 'cs_status' => 'A']);
    					if(!$preco->exists()) {
    						$preco = new Preco();
    					}
    					
    					$preco->cd_preco = $ct_atendimento->id;
    					$preco->atendimento_id = $ct_atendimento->id;
    					$preco->plano_id = 5;
    					$preco->tp_preco_id = TipoPreco::INDIVIDUAL;
    					$preco->cs_status = 'A';
    					$preco->data_inicio = $data_vigencia['de'];
    					$preco->data_fim = $data_vigencia['ate'];
    					$preco->vl_comercial = $atendimento["plus"];
    					$preco->vl_net = $atendimento["net"];    						
    					$preco->save();
    				}
    			}
    			 
    		} catch (\Exception $e) {
    			########### FINISHIING TRANSACTION ##########
    			DB::rollback();
    			#############################################
    			return redirect()->route('atualizar-precos')->with('error-alert', 'Os Preços dos Procedimentos não foram atualizados. Por favor, tente novamente.');
    		}
    	
    		########### FINISHIING TRANSACTION ##########
    		DB::commit();
    		#############################################
    	}
    
    	return redirect()->route('atualizar-precos')->with('success', 'Os Preços dos Procedimentos foram atualizados com sucesso!');
    }
}

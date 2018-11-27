<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Atendimento;
use Illuminate\Support\Facades\DB;
use App\Preco;
use App\TipoPreco;
use Maatwebsite\Excel\Facades\Excel;
use App\Consulta;

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
	    				
	    				//--preco open-------------------------------
	    				$ct_preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 1, 'cs_status' => 'A'])->get();
	    				$preco = [];
	    				if($ct_preco->isEmpty()) {
	    					$preco = new Preco();
	    				} else {
	    					$preco = $ct_preco->first();
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
	    				$ct_preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 2, 'cs_status' => 'A'])->get();
	    				$preco = [];
	    				if($ct_preco->isEmpty()) {
	    					$preco = new Preco();
	    				} else {
	    					$preco = $ct_preco->first();
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
	    				$ct_preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 3, 'cs_status' => 'A'])->get();
	    				$preco = [];
	    				if($ct_preco->isEmpty()) {
	    					$preco = new Preco();
	    				} else {
	    					$preco = $ct_preco->first();
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
	    				$ct_preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 4, 'cs_status' => 'A'])->get();
	    				$preco = [];
	    				if($ct_preco->isEmpty()) {
	    					$preco = new Preco();
	    				} else {
	    					$preco = $ct_preco->first();
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
	    				$ct_preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 5, 'cs_status' => 'A'])->get();
	    				$preco = [];
	    				if($ct_preco->isEmpty()) {
	    					$preco = new Preco();
	    				} else {
	    					$preco = $ct_preco->first();
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
//     			########### FINISHIING TRANSACTION ##########
    			DB::rollback();
//     			#############################################
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
    					
    					//--preco open-------------------------------
    					$ct_preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 1, 'cs_status' => 'A'])->get();
    					$preco = [];
    					if($ct_preco->isEmpty()) {
    						$preco = new Preco();
    					} else {
	    					$preco = $ct_preco->first();
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
    					$ct_preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 2, 'cs_status' => 'A'])->get();
    					$preco = [];
    					if($ct_preco->isEmpty()) {
    						$preco = new Preco();
    					} else {
	    					$preco = $ct_preco->first();
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
    					$ct_preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 3, 'cs_status' => 'A'])->get();
    					$preco = [];
    					if($ct_preco->isEmpty()) {
    						$preco = new Preco();
    					} else {
	    					$preco = $ct_preco->first();
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
    					$ct_preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 4, 'cs_status' => 'A'])->get();
    					$preco = [];
    					if($ct_preco->isEmpty()) {
    						$preco = new Preco();
    					} else {
	    					$preco = $ct_preco->first();
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
    					$ct_preco = Preco::where(['atendimento_id' => $ct_atendimento->id, 'plano_id' => 5, 'cs_status' => 'A'])->get();
    					$preco = [];
    					if($ct_preco->isEmpty()) {
    						$preco = new Preco();
    					} else {
	    					$preco = $ct_preco->first();
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
    
    /**
     * Gera relatório Xls a partir de parâmetros de consulta do fluxo básico.
     *
     */
    public function geraListaConsultasXls()
    {
        
        
    	Excel::create('DRHJ_RELATORIO_CONSULTAS_' . date('d-m-Y~H_i_s'), function ($excel) {
    		$excel->sheet('Consultas', function ($sheet) {
    
    			// Font family
    			$sheet->setFontFamily('Comic Sans MS');
    
    			// Set font with ->setStyle()`
    			$sheet->setStyle(array(
    					'font' => array(
    							'name' => 'Calibri',
    							'size' => 12,
    							'bold' => false
    					)
    			));
    			
    			$cabecalho = array('Data' => date('d-m-Y H:i'));
    			
    			$list_consultas = Atendimento::with(['precos', 'precos.plano'])
        			->distinct()
        			->join('clinicas', 			function($join1) { $join1->on('atendimentos.clinica_id', '=', 'clinicas.id')->on('clinicas.cs_status', '=', DB::raw("'A'"));})
        			->join('clinica_documento',	function($join2) { $join2->on('clinica_documento.clinica_id', '=', 'clinicas.id');})
        			->join('documentos',		function($join3) { $join3->on('documentos.id', '=', 'clinica_documento.documento_id');})
        			->join('consultas',			function($join4) { $join4->on('consultas.id', '=', 'atendimentos.consulta_id');})
        			->join('especialidades',	function($join5) { $join5->on('especialidades.id', '=', 'consultas.especialidade_id');})
        			->join('tipoatendimentos',	function($join6) { $join6->on('tipoatendimentos.id', '=', 'consultas.tipoatendimento_id');})
        			->join('clinica_endereco',	function($join7) { $join7->on('clinica_endereco.clinica_id', '=', 'clinicas.id');})
        			->join('enderecos',	        function($join8) { $join8->on('enderecos.id', '=', 'clinica_endereco.endereco_id');})
        			->join('cidades',	        function($join9) { $join9->on('cidades.id', '=', 'enderecos.cidade_id');})
        			->join('profissionals',	    function($join10) { $join10->on('profissionals.id', '=', 'atendimentos.profissional_id')->on('profissionals.cs_status', '=', DB::raw("'A'"));})
        			//     			->select('atendimentos.*')
        			->select('atendimentos.id', 'atendimentos.ds_preco', 'consultas.cd_consulta as codigo', 'atendimentos.clinica_id', 'clinicas.nm_razao_social', 'clinicas.nm_fantasia', 'documentos.te_documento', 'clinicas.tp_prestador',
        			    'especialidades.ds_especialidade as especialidade', 'tipoatendimentos.ds_atendimento as tipo_atendimento', 'enderecos.nr_cep as cep', 'enderecos.te_bairro', 'enderecos.te_endereco',
        			    'enderecos.te_complemento', 'cidades.nm_cidade', 'cidades.sg_estado', 'atendimentos.profissional_id', 'profissionals.nm_primario', 'profissionals.nm_secundario',
        			    'profissionals.cs_sexo as genero')
        			    //      			 ->selectRaw("at.id, at.ds_preco, (SELECT precos.id FROM precos WHERE precos.atendimento_id = at.id AND precos.plano_id = 1 AND precos.cs_status = 'A' LIMIT 1) as preco_id")
        			//, function($query) {  $query->select('precos.id')->from('precos')->where('precos.atendimento_id','=','at.id')->where('precos.tp_preco_id', '=', 1);}
        			->where(['atendimentos.procedimento_id' => null, 'atendimentos.cs_status' => 'A'])
//         			->limit(10)
        			->orderby('atendimentos.ds_preco', 'asc')
        			->orderby('atendimentos.id', 'asc')
        			->get();
//         			dd($list_consultas);

        	   $sheet->setColumnFormat(array(
        	       'G6:G'.(sizeof($list_consultas)+6) => '""00"." 000"."000"/"0000-00'
        			));
    
    			$sheet->loadView('atendimentos.consultas_excel', compact('list_consultas', 'cabecalho'));
    		});
    	})->export('xls');
    }
    
    /**
     * Gera relatório Xls a partir de parâmetros de consulta do fluxo básico.
     *
     */
    public function geraListaExamesXls()
    {
        
        
        Excel::create('DRHJ_RELATORIO_EXAMES_' . date('d-m-Y~H_i_s'), function ($excel) {
            $excel->sheet('Procedimentos', function ($sheet) {
                
                // Font family
                $sheet->setFontFamily('Comic Sans MS');
                
                // Set font with ->setStyle()`
                $sheet->setStyle(array(
                    'font' => array(
                        'name' => 'Calibri',
                        'size' => 12,
                        'bold' => false
                    )
                ));
                
                $cabecalho = array('Data' => date('d-m-Y H:i'));
                
                $list_exames = Atendimento::with(['precos', 'precos.plano'])
                ->distinct()
                ->join('clinicas', 			function($join1) { $join1->on('atendimentos.clinica_id', '=', 'clinicas.id')->on('clinicas.cs_status', '=', DB::raw("'A'"));})
                ->join('clinica_documento',	function($join2) { $join2->on('clinica_documento.clinica_id', '=', 'clinicas.id');})
                ->join('documentos',		function($join3) { $join3->on('documentos.id', '=', 'clinica_documento.documento_id');})
                ->join('procedimentos',		function($join4) { $join4->on('procedimentos.id', '=', 'atendimentos.procedimento_id');})
//                 ->join('especialidades',	function($join5) { $join5->on('especialidades.id', '=', 'consultas.especialidade_id');})
                ->join('tipoatendimentos',	function($join6) { $join6->on('tipoatendimentos.id', '=', 'procedimentos.tipoatendimento_id');})
                ->join('clinica_endereco',	function($join7) { $join7->on('clinica_endereco.clinica_id', '=', 'clinicas.id');})
                ->join('enderecos',	        function($join8) { $join8->on('enderecos.id', '=', 'clinica_endereco.endereco_id');})
                ->join('cidades',	        function($join9) { $join9->on('cidades.id', '=', 'enderecos.cidade_id');})
//                 ->join('profissionals',	    function($join10) { $join10->on('profissionals.id', '=', 'atendimentos.profissional_id')->on('profissionals.cs_status', '=', DB::raw("'A'"));})
                //     			->select('atendimentos.*')
                ->select('atendimentos.id', 'procedimentos.ds_procedimento as exames', 'procedimentos.cd_procedimento as codigo', 'tipoatendimentos.ds_atendimento as tipo_atendimento', 'clinicas.nm_razao_social', 'clinicas.nm_fantasia', 'atendimentos.clinica_id', 'documentos.te_documento as cnpj', 'clinicas.tp_prestador',
                    'enderecos.nr_cep as cep', 'enderecos.te_bairro', 'enderecos.te_endereco', 'enderecos.te_complemento', 'cidades.nm_cidade', 'cidades.sg_estado')
                    //      			 ->selectRaw("at.id, at.ds_preco, (SELECT precos.id FROM precos WHERE precos.atendimento_id = at.id AND precos.plano_id = 1 AND precos.cs_status = 'A' LIMIT 1) as preco_id")
                //, function($query) {  $query->select('precos.id')->from('precos')->where('precos.atendimento_id','=','at.id')->where('precos.tp_preco_id', '=', 1);}
                ->where(['atendimentos.consulta_id' => null, 'atendimentos.cs_status' => 'A'])
//                 ->limit(10)
                ->orderby('procedimentos.ds_procedimento', 'asc')
                ->orderby('atendimentos.id', 'asc')
                ->get();
//                 dd($list_exames);

//                 foreach($list_exames as $item) {
//                     if(sizeof($item->precos) == 0) {
//                         dd($item);
//                     }
//                 }
                
                $sheet->setColumnFormat(array(
                    'I6:I'.(sizeof($list_exames)+6) => '""00"." 000"."000"/"0000-00'
                ));
                
                $sheet->loadView('atendimentos.exames_excel', compact('list_exames', 'cabecalho'));
	        });
	    })->export('xls');
	}
}

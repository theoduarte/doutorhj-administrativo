<?php

namespace App\Http\Controllers;

use App\Filial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use App\Clinica;
use App\Endereco;
use Illuminate\Support\Facades\DB;
use App\Cidade;

class FilialController extends Controller
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
     * @param  \App\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function show(Filial $filial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function edit(Filial $filial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filial $filial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filial $filial)
    {
        //
    }
    
    //############# AJAX SERVICES ##################
    /**
     * addFilialStore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFilialStore(Request $request)
    {
    	$filial_id = CVXRequest::post('filial_id');
    	$clinica_id = CVXRequest::post('clinica_id');
    	$endereco_id = CVXRequest::post('endereco_id');
    	$clinica = Clinica::findorfail($clinica_id);
    	
    	$cd_ibge 			= $request->input('filial_cd_cidade_ibge');
    	$nr_latitude_gps 	= $request->input('filial_nr_latitude');
    	$nr_longitute_gps 	= $request->input('filial_nr_longitute');
    	$nr_cep 			= $request->input('filial_cep');
    	$sg_logradouro		= '';
    	$te_endereco 		= $request->input('filial_endereco');
    	$nr_logradouro 		= $request->input('filial_nr_logradouro');
    	$te_bairro 			= $request->input('filial_te_bairro');
    	$eh_matriz 			= $request->input('filial_eh_matriz');
    	
    	$nm_nome_fantasia = $request->input('nm_nome_fantasia');
    	
    	try {
	    	
	    	########### STARTING TRANSACTION ############
	    	DB::beginTransaction();
	    	#############################################
	    
	    	# endereco da filial
	    	
	    	
	    	if(isset($endereco_id) && $endereco_id != '') {
	    		$endereco = Endereco::findorfail($endereco_id);
	    	} else {
	    		$endereco = new Endereco();
	    	}
	    	
	    	$endereco->sg_logradouro 	= $sg_logradouro;
	    	$endereco->te_endereco 		= $te_endereco;
	    	$endereco->nr_logradouro 	= $nr_logradouro;
	    	$endereco->te_bairro 		= $te_bairro;
	    	$endereco->nr_cep 			= UtilController::retiraMascara($nr_cep);
	    	$endereco->te_complemento 	= '';
	    	$endereco->nr_latitude_gps 	= $nr_latitude_gps;
	    	$endereco->nr_longitute_gps = $nr_longitute_gps;
	    	$cidade             		= Cidade::where(['cd_ibge'=>$cd_ibge])->get()->first();
	    	$endereco->cidade()->associate($cidade);
	    	
	    	$endereco->save();
	    	
	    	$endereco_id = $endereco->id;
	    	
	    	# atualiza todos as filiais como nao sendo matriz
	    	if ($eh_matriz == 'S') {
	    		Filial::where('clinica_id', $clinica_id)->update(['eh_matriz' => 'N']);
	    	}
	    	
	    	# dados da filial
	    	if(isset($filial_id) && $filial_id != '') {
	    		$filial = Filial::findorfail($filial_id);
	    	} else {
	    		$filial = new Filial();
	    	}
	    	
	    	$filial->eh_matriz			= $eh_matriz;
	    	$filial->nm_nome_fantasia	= $nm_nome_fantasia;
	    	$filial->cs_status			= 'A';
	    	$filial->clinica_id			= $clinica_id;
	    	$filial->endereco_id		= $endereco->id;
	    	
	    
	    	if ($filial->save()) {
	    		
	    		$filial_id = $filial->id;
	    
	    		# registra log
	    		$titulo_log			= 'Adicionar Filial';
	    		$filial_obj         = $filial->toJson();
	    		$tipo_log			= 1;
	    		$registro_obj 		= new RegistroLogController();
	    
	    		$ct_log = "reg_anterior:[]";
	    		$new_log = "reg_novo:[$filial_obj]";
	    
	    		$log = "{".$ct_log.",".$new_log."}";
	    
	    		$registro_obj->registrarLog($titulo_log, $log, $tipo_log);
	    
	    	} else {
	    		return response()->json(['status' => false, 'mensagem' => 'A Filial não foi salva. Por favor, tente novamente.']);
	    	}
    	} catch (\Exception $e) {
            ########### FINISHIING TRANSACTION ##########
            DB::rollback();
            #############################################
            return response()->json(['status' => false, 'mensagem' => 'A Filial não foi salva, pois ocorreu uma Falha. Por favor, tente novamente.']);
        }
    
        ########### FINISHIING TRANSACTION ##########
        DB::commit();
        #############################################
    
    	return response()->json(['status' => true, 'mensagem' => 'A Filial foi salva com sucesso!', 'endereco_id' => $endereco_id, 'filial_id' => $filial_id]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteFilialDestroy()
    {
    	$filial_id = CVXRequest::post('filial_id');
    	$filial = Filial::findorfail($filial_id);
    	$filial->cs_status = 'I';
    
    	if ($filial->save()) {
    		
    		$filial->profissionals()->detach();
    
    		# registra log
    		$filial_obj           = $filial->toJson();
    		$registro_obj 		= new RegistroLogController();
    
    		$log = "[$filial_obj]";
    
    		$registro_obj->registrarLog('Excluir Filial', $log, 4);
    
    	} else {
    		return response()->json(['status' => false, 'mensagem' => 'A Filial não foi removida. Por favor, tente novamente.']);
    	}
    
    	return response()->json(['status' => true, 'mensagem' => 'A Filial foi removida com sucesso!', 'filial' => $filial->toJson()]);
    }
}

<?php

namespace App\Http\Controllers;

use App\TagPopular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as CVXRequest;
use Illuminate\Support\Facades\DB;

class TagPopularController extends Controller
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
     * @param  \App\TagPopular  $tagPopular
     * @return \Illuminate\Http\Response
     */
    public function show(TagPopular $tagPopular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TagPopular  $tagPopular
     * @return \Illuminate\Http\Response
     */
    public function edit(TagPopular $tagPopular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TagPopular  $tagPopular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TagPopular $tagPopular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TagPopular  $tagPopular
     * @return \Illuminate\Http\Response
     */
    public function destroy(TagPopular $tagPopular)
    {
        //
    }
    
    //############# AJAX SERVICES ##################
    /**
     * addTagPopularStore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTagPopularStore(Request $request)
    {
    	$tag_id 				= CVXRequest::post('tag_id');
    	$cs_tag 				= CVXRequest::post('cs_tag');
    	$tag_atendimento_id 	= CVXRequest::post('tag_atendimento_id');
    	$tipo_atendimento 		= CVXRequest::post('tipo_atendimento');
    	$atendimento_id = 0;
    	$tag_popular = [];
    	 
    	try {
    
    		########### STARTING TRANSACTION ############
    		DB::beginTransaction();
    		#############################################
    	  
    		# tag popular
    		$tag_popular = [];
    		
    		if(isset($tag_id) && $tag_id != '') {
    			$tag_popular = TagPopular::findorfail($tag_id);
    		} else {
    			$tag_popular = new TagPopular();
    		}
    
    		$tag_popular->cs_tag 			= $cs_tag;
    		$tag_popular->atendimento_id 	= $tag_atendimento_id;
    		    	  
    		if (!$tag_popular->save()) {
    	   
    			return response()->json(['status' => false, 'mensagem' => 'O Nome Popular não foi salvo. Por favor, tente novamente.']);
    		}
    		
    		$list_tag_popular = TagPopular::where('atendimento_id', $tag_atendimento_id)->orderBy('cs_tag','asc')->get();
    		
    	} catch (\Exception $e) {
    		########### FINISHIING TRANSACTION ##########
    		DB::rollback();
    		#############################################
    		return response()->json(['status' => false, 'mensagem' => 'O Nome Popular não foi salvo, pois ocorreu uma Falha. Por favor, tente novamente.']);
    	}
    
    	########### FINISHIING TRANSACTION ##########
    	DB::commit();
    	#############################################
    
    	return response()->json(['status' => true, 'mensagem' => 'O Nome Popular foi salvo com sucesso!', 'tipo_atendimento' => $tipo_atendimento, 'list_tag_popular' => $list_tag_popular->toJson()]);
    }
    
    /**
     * loadTagPopularList a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loadTagPopularList(Request $request)
    {
    	$tag_atendimento_id 	= CVXRequest::post('tag_atendimento_id');
    	
    	$list_tag_popular = TagPopular::where('atendimento_id', $tag_atendimento_id)->orderBy('cs_tag','asc')->get();
    	
    	return response()->json(['status' => true, 'list_tag_popular' => $list_tag_popular->toJson()]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTagPopularDestroy()
    {
    	$tag_id = CVXRequest::post('tag_id');
    	$tag_popular = TagPopular::findorfail($tag_id);
    
    	if (!$tag_popular->delete()) {
    		return response()->json(['status' => false, 'mensagem' => 'O Nome Popular não foi removido. Por favor, tente novamente.']);
    	}
    
    	return response()->json(['status' => true, 'mensagem' => 'O Nome Popular foi removido com sucesso!']);
    }
}

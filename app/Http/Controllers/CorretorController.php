<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request as CVXRequest;
use App\Corretor;
use App\Documento;
use App\Contato;
use App\Http\Requests\CorretorsRequest;

class CorretorController extends Controller
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
    	 
    	$corretors = Corretor::with('documento', 'contato')->where(DB::raw('to_str(nm_primario)'), 'LIKE', '%'.$search_term.'%')->orWhere(DB::raw('to_str(nm_secundario)'), 'LIKE', '%'.$search_term.'%')->where('cs_status', '=', 'A')->sortable()->paginate(10);
    	 
    	return view('corretors.index', compact('corretors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('corretors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorretorsRequest $request)
    {
    	
    	########### STARTING TRANSACTION ############
    	DB::beginTransaction();
    	#############################################
    	
    	try {
    		
    		# registra o documento do corretor
    		$cpf 		= UtilController::retiraMascara($request->input('te_documento'));
    		$documento 	= Documento::where(['te_documento' => $cpf])->first();
    		
    		if (empty($documento)) {
    			$documento = new Documento();
    		}
    		
    		$documento->tp_documento = Documento::TP_CPF;
    		$documento->te_documento = $cpf;
    		$documento->save();
    		$documento_id = $documento->id;
    		
    		# registra o contato do corretor
    		$ds_contato = $request->input('telefone');
    		$contato 	= Contato::where(['tp_contato' => Contato::TP_CEL_PESSOAL, 'ds_contato' => $ds_contato])->first();
    		
    		if (empty($contato)) {
    			$contato = new Contato();
    		}
    		
    		$contato->tp_contato 	= Contato::TP_CEL_PESSOAL;
    		$contato->ds_contato 	= $ds_contato;
    		$contato->save();
    		$contato_id = $contato->id;
    		
    		# salva o corretor
    		$corretor 					= new Corretor();
    		$corretor->nm_primario 		= $request->input('nm_primario');
    		$corretor->nm_secundario 	= $request->input('nm_secundario');
    		$corretor->dt_nascimento 	= CVXRequest::post('dt_nascimento');
    		$corretor->email 			= $request->input('email');
    		$corretor->cs_status 		= 'A';
    		$corretor->documento_id 	= $documento_id;
    		$corretor->contato_id 		= $contato_id;
    		$corretor->save();
    		
    	} catch (\Exception $e) {
    		########### FINISHIING TRANSACTION ##########
    		DB::rollback();
    		#############################################
    		
    		return redirect()->route('corretors.index')->with('error', 'O Corretor não foi cadastrado. Por favor, tente novamente.');
    	}
    	
    	########### FINISHIING TRANSACTION ##########
    	DB::commit();
    	#############################################
    	 
    	return redirect()->route('corretors.index')->with('success', 'O Corretor foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$corretor = Corretor::with('documento', 'contato')->findOrFail($id);
    	 
    	return view('corretors.show', compact('corretor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$corretor = Corretor::findOrFail($id);
    	 
    	return view('corretors.edit', compact('corretor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$corretor = Corretor::with('documento', 'contato')->findOrFail($id);
    	 
    	########### STARTING TRANSACTION ############
    	DB::beginTransaction();
    	#############################################
    	 
    	try {
    	
    		# registra o documento do corretor
    		$cpf 		= UtilController::retiraMascara($request->input('te_documento'));
    		$documento 	= Documento::where(['te_documento' => $cpf])->first();
    	
    		if (empty($documento)) {
    			$documento = new Documento();
    		}
    	
    		$documento->tp_documento = Documento::TP_CPF;
    		$documento->te_documento = $cpf;
    		$documento->save();
    		$documento_id = $documento->id;
    	
    		# registra o contato do corretor
    		$ds_contato = $request->input('telefone');
    		$contato 	= Contato::where(['tp_contato' => Contato::TP_CEL_PESSOAL, 'ds_contato' => $ds_contato])->first();
    	
    		if (empty($contato)) {
    			$contato = new Contato();
    		}
    	
    		$contato->tp_contato 	= Contato::TP_CEL_PESSOAL;
    		$contato->ds_contato 	= $ds_contato;
    		$contato->save();
    		$contato_id = $contato->id;
    	
    		# salva o corretor
    		$corretor->nm_primario 		= $request->input('nm_primario');
    		$corretor->nm_secundario 	= $request->input('nm_secundario');
    		$corretor->dt_nascimento 	= CVXRequest::post('dt_nascimento');
    		$corretor->email 			= $request->input('email');
    		$corretor->cs_status 		= 'A';
    		$corretor->documento_id 	= $documento_id;
    		$corretor->contato_id 		= $contato_id;
    		$corretor->save();
    	
    	} catch (\Exception $e) {
    		########### FINISHIING TRANSACTION ##########
    		DB::rollback();
    		#############################################
    	
    		return redirect()->route('corretors.index')->with('error', 'O Corretor não foi cadastrado. Por favor, tente novamente.');
    	}
    	 
    	########### FINISHIING TRANSACTION ##########
    	DB::commit();
    	#############################################
    	 
    	return redirect()->route('corretors.index')->with('success', 'O Corretor foi editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Corretor  $corretor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$corretor = Corretor::findOrFail($id);
    	 
    	$corretor->cs_status = 'I';
    	
    	if ($corretor->save()) {
    		return redirect()->route('corretors.index')->with('success', 'Registro Excluído com sucesso!');
    	}
    	
    	return redirect()->route('corretors.index')->with('error', 'Registro não foi Excluído. Por favor, tente novamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Preco;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Plano;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Atendimento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\RegistroLog;

class PrecoController extends Controller
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
	 * loadPrecoShow
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function loadPrecoShow($id)
	{
		$preco = Preco::findOrFail($id);

		if($preco->plano_id != null) {
			$preco->load('plano');
		}

		if($preco->tp_preco_id != null) {
			$preco->load('tipoPreco');
		}

		$preco->startDate = $preco->data_inicio->format('d/m/Y');
		$preco->endDate = $preco->data_fim->format('d/m/Y');
		
		# registra log
		
		$titulo_log         = 'Consultar Preço';
		$tipo_log           = 2;
		
		$preco_obj          = $preco->toJson();
		
		$ct_log   = '"reg_anterior":'.'{}';
		$new_log  = '"reg_novo":'.'{"preco":'.$preco_obj.'}';
		
		$log = "{".$ct_log.",".$new_log."}";
		
		$reglog = new RegistroLogController();
		$reglog->registrarLog($titulo_log, $log, $tipo_log);

		return response()->json(['status' => true, 'preco' => $preco->toJson()]);
	}

	public function update(Request $request, $id)
	{
		$preco = Preco::with(['atendimento', 'plano'])->findOrFail($id);
		
		$atendimento = $preco->atendimento;
		$preco_novo = [];
		
		$data_vigencia = UtilController::getDataRangeTimePickerToCarbon($request->get('data-vigencia'));

		$preco->data_inicio = $data_vigencia['de'];
		$preco->data_fim = $data_vigencia['ate'];
		
		########### STARTING TRANSACTION ############
		DB::beginTransaction();
		#############################################
		//$user_owner = "{}";
		try {
    		if($request->get('vl_com_edit_procedimento') != $preco->vl_comercial | $request->get('vl_net_edit_procedimento') != $preco->vl_net) {
    		    
    		    $preco_novo = $preco->replicate();
    		    $preco_novo->push();
    		    $preco_novo->vl_comercial  = $request->get('vl_com_edit_procedimento');
    		    $preco_novo->vl_net        = $request->get('vl_net_edit_procedimento');
    		    $preco->cs_status = 'I';
    		    
    		    $preco_novo->save();
    		    
    		    $titulo_log         = 'Adicionar Preço a Procedimento';
    		    $tipo_log           = 1;
    		    
    		} else {
    		    $preco_novo   = $preco;
    		    $titulo_log   = 'Editar Vigência de Preço';
    		    $tipo_log     = 3;
    		    
    		    //--busca o usuario do registro anterior--------
    		    //$reg_anterior = RegistroLog::with('user')->where(function ($query) { $query->where('tipolog_id', 3)->orWhere('tipolog_id', 4);})->where('ativo', '=', true)->where(DB::raw('to_str(descricao)'), 'LIKE', '%'.'"preco":{"id":'.$preco->id.'%')->orderby('created_at', 'desc')->limit(1)->get();
    		    
    		    //$user_owner = !empty($reg_anterior->first()) ? ($reg_anterior->first()->user)->toJson() : "{}";
    		    //dd($user_owner);
    		}
    
    		if($preco->save()) {
    		    
    		    # registra log
    		    $preco_anterior_obj       = $preco->toJson();
    		    $preco_obj                = $preco_novo->toJson();
    		    $atendimento_obj          = $atendimento->toJson();
    		    
    		    $ct_log   = '"reg_anterior":'.'{"preco":'.$preco_anterior_obj.', "atendimento":'.$atendimento_obj.'}';
    		    $new_log  = '"reg_novo":'.'{"preco":'.$preco_obj.', "atendimento":'.$atendimento_obj.'}';
    		    
    		    $log = "{".$ct_log.",".$new_log."}";
    		    
    		    $reglog = new RegistroLogController();
    		    $reglog->registrarLog($titulo_log, $log, $tipo_log);
    		    
    		} else {
    		    return redirect()->back()->with('error-alert', 'A vigência do preço não foicadastrada. Por favor, tente novamente.');
    		}
		} catch (\Exception $e) {
		    ########### FINISHIING TRANSACTION ##########
		    DB::rollback();
		    #############################################
		    return redirect()->back()->with('error-alert', 'A vigência do preço não foi cadastrada. Por favor, tente novamente.');
		}
		
		########### FINISHIING TRANSACTION ##########
		DB::commit();
		#############################################

		return redirect()->back()->with('success', 'A vigência do preço foi salva com sucesso!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		try {
			$model = Preco::with('plano')->findOrFail($id);
			$model->cs_status = 'I';
			
			$model->save();
			
			# registra log
			
			$titulo_log         = 'Excluir Preço';
			$tipo_log           = 4;
			
			$preco_obj          = $model->toJson();
			
			$ct_log   = '"reg_anterior":'.'{}';
			$new_log  = '"reg_novo":'.'{"preco":'.$preco_obj.'}';
			
			$log = "{".$ct_log.",".$new_log."}";
			
			$reglog = new RegistroLogController();
			$reglog->registrarLog($titulo_log, $log, $tipo_log);
			
		} catch(QueryException $e) {
			report($e);
			return response()->json([
				'message' => 'Erro ao excluir o preço'.$model->id,
			], 500);
		}
	}
}

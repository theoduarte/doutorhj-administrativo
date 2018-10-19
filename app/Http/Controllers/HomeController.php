<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        
        $data_inicio = date('Y-m-1 H:i:s');
        $data_fim = date('Y-m-t H:i:s');
        
        $pagamentos = Payment::whereDate('payments.created_at', '>=', date('Y-m-d H:i:s', strtotime($data_inicio)))->whereDate('payments.created_at', '<=', date('Y-m-d H:i:s', strtotime($data_fim)))->orderBy('id', 'desc')->sortable()->paginate(10);
        
        foreach($pagamentos as $pagamento) {        	
        	$obj_cielo = json_decode($pagamento->cielo_result);
			if(isset($obj_cielo->Payment->Status))
        		$pagamento->status_payment = $obj_cielo->Payment->Status;
			else
				$pagamento->status_payment = 0;
        }
        
        //--PAGAMENTOS FINALIZADOS---------------------------------
        $num_credit_card_finished_payment = DB::table('credit_card_responses')->where('crc_status', '=', 2)->whereDate('credit_card_responses.created_at', '>=', date('Y-m-d H:i:s', strtotime($data_inicio)))->whereDate('credit_card_responses.created_at', '<=', date('Y-m-d H:i:s', strtotime($data_fim)))->count();
        $total_credit_card_payments = DB::table('credit_card_responses')->whereDate('credit_card_responses.created_at', '>=', date('Y-m-d H:i:s', strtotime($data_inicio)))->whereDate('credit_card_responses.created_at', '<=', date('Y-m-d H:i:s', strtotime($data_fim)))->count();
        
        $num_debit_card_finished_payment = DB::table('debit_card_responses')->where('dbc_status', '=', 2)->whereDate('debit_card_responses.created_at', '>=', date('Y-m-d H:i:s', strtotime($data_inicio)))->whereDate('debit_card_responses.created_at', '<=', date('Y-m-d H:i:s', strtotime($data_fim)))->count();
        $total_debit_card_payments = DB::table('debit_card_responses')->whereDate('debit_card_responses.created_at', '>=', date('Y-m-d H:i:s', strtotime($data_inicio)))->whereDate('debit_card_responses.created_at', '<=', date('Y-m-d H:i:s', strtotime($data_fim)))->count();
        
        $num_pagamentos_finalizados = $num_credit_card_finished_payment+$num_debit_card_finished_payment;
        $num_total_pagamentos = $total_credit_card_payments+$total_debit_card_payments;
        
        $percent_payment_finished = $num_total_pagamentos == 0 ? 0 : number_format((float)(($num_pagamentos_finalizados)/($num_total_pagamentos))*100, 2, '.', '');
        
        //--PAGAMENTOS AUTORIZADOS---------------------------------
        $num_credit_card_authorized_payment = DB::table('credit_card_responses')->where('crc_status', '=', 1)->whereDate('credit_card_responses.created_at', '>=', date('Y-m-d H:i:s', strtotime($data_inicio)))->whereDate('credit_card_responses.created_at', '<=', date('Y-m-d H:i:s', strtotime($data_fim)))->count();
        $num_debit_card_authorized_payment = DB::table('debit_card_responses')->where('dbc_status', '=', 1)->whereDate('debit_card_responses.created_at', '>=', date('Y-m-d H:i:s', strtotime($data_inicio)))->whereDate('debit_card_responses.created_at', '<=', date('Y-m-d H:i:s', strtotime($data_fim)))->count();$total_debit_card_payments = DB::table('debit_card_responses')->whereDate('debit_card_responses.created_at', '>=', date('Y-m-d H:i:s', strtotime($data_inicio)))->whereDate('debit_card_responses.created_at', '<=', date('Y-m-d H:i:s', strtotime($data_fim)))->count();
        $num_pagamentos_autorizados = $num_credit_card_authorized_payment+$num_debit_card_authorized_payment;
        
        $percent_payment_authorized = ($total_credit_card_payments+$total_debit_card_payments) == 0 ? 0 : number_format((float)(($num_pagamentos_autorizados)/($total_credit_card_payments+$total_debit_card_payments))*100, 2, '.', '');
        
        //--PROFISSIONAIS ATIVOS----------------------------------
        $num_profissionals_ativos = DB::table('profissionals')->where('cs_status', 'A')->count();
        $total_profissionals = DB::table('profissionals')->count();
        
        $percent_profissionals_ativos = $total_profissionals == 0 ? 0 : number_format((float)($num_profissionals_ativos/$total_profissionals)*100, 2, '.', '');
        
        //--VALOR TOTAL FATURADO NO MES--------------
        
        $pagamentos_mes = Payment::whereDate('payments.created_at', '>=', date('Y-m-d H:i:s', strtotime($data_inicio)))->whereDate('payments.created_at', '<=', date('Y-m-d H:i:s', strtotime($data_fim)))->get();
        $valor_total_mes = 0;
        foreach($pagamentos_mes as $pagamento) {
        	$valor_total_mes = $valor_total_mes+$pagamento->amount;
        }
        $valor_temp = $valor_total_mes/100;
        
        $valor_esperado = 5000;
        $valor_total_mes = UtilController::formataMoeda($valor_temp);
        
        $percent_recebimentos = $valor_esperado == 0 ? 0 : number_format((float)($valor_temp/$valor_esperado)*100, 2, '.', '');
        
        return view('home', compact('pagamentos', 'num_pagamentos_finalizados', 'percent_payment_finished', 'num_pagamentos_autorizados', 'percent_payment_authorized', 'num_profissionals_ativos', 'percent_profissionals_ativos', 'valor_total_mes', 'percent_recebimentos'));
    }
}

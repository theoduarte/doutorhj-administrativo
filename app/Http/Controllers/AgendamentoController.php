<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Agendamento;
use App\Clinica;
use App\Mensagem;
use App\MensagemDestinatario;
use App\Paciente;
use App\Pedido;
use App\Consulta;
use App\Procedimento;
use App\Tipoatendimento;
use App\Checkup;
use App\Profissional;
use App\Filial;
use App\Atendimento;
use App\ItemPedido;
use App\RegistroLog;

class AgendamentoController extends Controller
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
    public function index(Request $request)
	{
		$clinicas = Clinica::all();

		$status = Agendamento::getStatusAgendamento();

		$clinicaID = Request::get('clinica_id');
		$nmPaciente = UtilController::toStr(Request::get('nm_paciente'));
		$data = Request::get('data') != null ? UtilController::getDataRangeTimePickerToCarbon(Request::get('data')) : '';

// 		DB::enableQueryLog();
		$agendamentos = Agendamento::
		where(function ($query) use ($request) {
			if (!empty($request::get('cs_status'))) {
				$query->whereIn('cs_status', $request::get('cs_status'));
			}

			if (!empty($request::get('data'))) {
				$date = UtilController::getDataRangeTimePickerToCarbon($request::get('data'));

				$dateBegin = $date['de'];
				$dateEnd = $date['ate'];

				$query->whereDate('agendamentos.dt_atendimento', '>=', date('Y-m-d H:i:s', strtotime($dateBegin)))->whereDate('agendamentos.dt_atendimento', '<=', date('Y-m-d H:i:s', strtotime($dateEnd)));
			}

			if (!empty($request::get('clinica_id'))) {
				$query->whereExists(function ($query) use ($request) {
					$query->select(DB::raw(1))
						->from('agendamento_atendimento')
						->join('atendimentos', function ($query) use ($request) {
							$query->on('agendamento_atendimento.atendimento_id', '=', 'atendimentos.id')
								->where('atendimentos.clinica_id', $request::get('clinica_id'));
						})
						->whereRaw('agendamento_atendimento.agendamento_id = agendamentos.id');
				});
			}

			if (!empty($request::get('nm_paciente'))) {
				$query->whereExists(function ($query) use ($request) {
					$nmPaciente = UtilController::toStr(Request::get('nm_paciente'));

					$query->select(DB::raw(1))
						->from('pacientes')
						->whereRaw('agendamentos.paciente_id = pacientes.id')
						->where(function ($query) use ($nmPaciente) {
							$query->where(DB::raw('to_str(pacientes.nm_primario)'), 'like', '%' . $nmPaciente . '%')
								->orWhere(DB::raw('to_str(pacientes.nm_secundario)'), 'like', '%' . $nmPaciente . '%')
								->orWhere(DB::raw("concat(to_str(pacientes.nm_primario), ' ',to_str(pacientes.nm_secundario))"), 'like', '%' . $nmPaciente . '%');
						});
				});
			}
		})
			->whereHas('atendimentos', function ($query) {
				$query->whereNull('deleted_at');
			})
// 			->orderBy(DB::raw('  CASE  WHEN agendamentos.cs_status::int = 10  THEN 1
//                                     WHEN agendamentos.cs_status::int = 20  THEN 2
//                                     WHEN agendamentos.cs_status::int = 80  THEN 3
//                                     WHEN agendamentos.cs_status::int = 70  THEN 4
//                                     WHEN agendamentos.cs_status::int = 30  THEN 5
//                                     WHEN agendamentos.cs_status::int = 40  THEN 6
//                                     WHEN agendamentos.cs_status::int = 50  THEN 7
//                                     WHEN agendamentos.cs_status::int = 60  THEN 8
//                                     WHEN agendamentos.cs_status::int = 90  THEN 9
//                                     WHEN agendamentos.cs_status::int = 100 THEN 10 END'), 'asc')
// 			->orderBy('agendamentos.dt_atendimento')
			->sortable(['dt_atendimento' => 'desc'])
			->paginate(20);

//         dd( DB::getQueryLog() );

        $tipoAtendimentos = Tipoatendimento::where('cs_status','A')->whereNotNull('tag_value')->orderBy('id')->get();
        $checkup = Checkup::where('cs_status','A')->count();
        $hasActiveCheckup = $checkup > 0 ? true : false;
        
        Request::flash();
        
        return view('agenda.index', compact('agendamentos', 'clinicas', 'tipoAtendimentos', 'hasActiveCheckup','status'));
    }
    
    /**
     * Consulta para alimentar autocomplete
     * 
     * @param string $consulta
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLocalAtendimento($consulta){
        $arJson = array();
        $consultas = \App\Clinica::where(DB::raw('to_str(nm_razao_social)'), 
                                            'like', '%'.UtilController::toStr($consulta).'%')->get();
        $consultas->load('documentos');
        
        foreach ($consultas as $query)
        {
            $arJson[] = [ 'id' => $query->id, 'value' => $query->nm_razao_social];
        }
        
        return Response()->json($arJson);
    }

    /**
     * Consulta para alimentar autocomplete
     * 
     * @param string $consulta
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfissional($profissional){
        $arJson = array();
        $profissional = \App\Profissional::where( function($query){} )->get();
        $profissional->load('documentos');
        
        foreach ($profissional as $query)
        {
            foreach($query->documentos as $objDocumento){
                if( $objDocumento->tp_documento == 'CRM' or 
                        $objDocumento->tp_documento == 'CRO' ){
                    
                    $estado = \App\Estado::findorfail((int)$objDocumento->estado_id);
                    $teDocumento = $objDocumento->te_documento.' '.$objDocumento->tp_documento.'/'.$estado->sg_estado;
                }
            }
            
            $arJson[] = [ 'id' => $query->id, 'value' => $query->nm_primario.' '.$query->nm_secundario. ' '. $teDocumento];
        }
        
        return Response()->json($arJson);
    }
    
    /**
     * Realiza o agendamento/remarcacao de consultas
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addAgendamento(Request $request)
	{
        $agendamento = Agendamento::find($request::get('agendamento_id'));

		if(!is_null($request::get('filial_id'))) {
			$filial = Filial::find($request::get('filial_id'));
		} else {
			$filial = $agendamento->filial;
		}

        if ( $agendamento->cs_status == Agendamento::AGENDADO ) {
          $agendamento->bo_remarcacao = 'A';
        }

        $agendamento->cs_status = Agendamento::AGENDADO;

        if (!is_null($agendamento->atendimento->consulta_id)) {
          $agendamento->dt_atendimento = Carbon::createFromFormat( "d/m/Y H:i", $request::get('data') . " " . $request::get('time') )->toDateTimeString();
          $agendamento->filial_id = $filial->id;
        } else {
            if($agendamento->atendimento->clinica->tp_prestador == 'CLI') {
                $agendamento->dt_atendimento = Carbon::createFromFormat( "d/m/Y H:i", $request::get('data') . " " . $request::get('time') )->toDateTimeString();
            } else {
                $agendamento->dt_atendimento = Carbon::createFromFormat( "d/m/Y H:i", $agendamento->dt_atendimento);
            }
        }

        $agendamento->save();
        
        //--carrega os dados do paciente para configurar a mensagem-----
        $paciente = Paciente::findorfail($agendamento->paciente_id);
        $paciente->load('user');
        $paciente->load('documentos');
        $paciente->load('contatos');
        
        //--carrega os dados do agendamento para configurar a mensagem-----
        $ct_agendamento = $agendamento;
        $ct_agendamento->load('itempedidos');
        $ct_agendamento->load('atendimento');
        $ct_agendamento->load('clinica');
        $ct_agendamento->load('profissional');
        
        $ct_agendamento->profissional->load('especialidades');
        $nome_especialidade = [];

        foreach ($ct_agendamento->profissional->especialidades as $especialidade) {
			$nome_especialidade[] = $especialidade->ds_especialidade;
        }
        $ct_agendamento->nome_especialidade = implode(' | ', $nome_especialidade);

        //--carrega os dados do pedido para configurar a mensagem-----
        $pedido_id = $ct_agendamento->itempedidos->first()->pedido_id;

        $pedido = Pedido::findorfail($pedido_id);
        
        $token_atendimento = $agendamento->te_ticket;

        ####################################### registra log> #######################################
        $paciente_obj       = $paciente->toJson();
        $filial_obj         = !is_null($filial) ? $filial->toJson() : '';
        $agendamento_obj    = $ct_agendamento->toJson();
        $pedido_obj         = $pedido->toJson();
        
        $titulo_log = 'Realizar Agendamento';
        $ct_log   = '"reg_anterior":'.'{}';
        $new_log  = '"reg_novo":'.'{"paciente":'.$paciente_obj.', "filial":'.$filial_obj.', "agendamento":'.$agendamento_obj.', "pedido":'.$pedido_obj.'}';
        $tipo_log = 1;
        
        $log = "{".$ct_log.",".$new_log."}";
        
        $reglog = new RegistroLogController();
        $reglog->registrarLog($titulo_log, $log, $tipo_log);
        ####################################### </registra log #######################################
        
        //--enviar mensagem informando o pre agendamento da solicitacao----------------
		if($agendamento->atendimento->clinica->tp_prestador !="CLI"){
			try {
				$this->enviarEmailAgendamentoLaboratorio($paciente,$pedido, $ct_agendamento, $token_atendimento );
			} catch (\Exception $e) {}
		}else{
			try {
				$this->enviarEmailAgendamento($paciente, $pedido, $ct_agendamento, $token_atendimento, $filial);
			} catch (\Exception $e) {}
		}

    }
    
    /**
     * Realiza o cancelamento de uma consulta por ticket.
     * 
     * @param string $teTicket
     */
    public function addCancelamento($teTicket, $dtAtendimento, $obsCancelamento=null) {
        $agendamento = Agendamento::where('te_ticket', '=', $teTicket)
			->where(function($query) use ($dtAtendimento) {
				$query->whereNull('dt_atendimento')
					->orWhere('dt_atendimento', Carbon::createFromFormat("Y-m-d H:i:s", $dtAtendimento));
			})
			->first();

        $agendamento->update([
			'cs_status' => Agendamento::CANCELADO,
			'obs_cancelamento' => $obsCancelamento
		]);

        ####################################### registra log> #######################################
        $agendamento_obj    = $agendamento->toJson();

        //--busca o usuario do registro anterior--------
        $reg_anterior = RegistroLog::with('user')
			->where('tipolog_id', 3)->where('tipolog_id', 4)
			->where('ativo', '=', true)
			->where(DB::raw('to_str(descricao)'), 'LIKE', '%'.'"agendamento":{"id":'.$agendamento->id.'%' )
			->orderby('created_at', 'desc')
			->limit(1)->get();

        $titulo_log = 'Realizar Cancelamento de Consulta';
        $ct_log   = '"reg_anterior":'.'{"user":'.$reg_anterior.'}';
        $new_log  = '"reg_novo":'.'{"agendamento":'.$agendamento_obj.'}';
        $tipo_log = 3;
        
        $log = "{".$ct_log.",".$new_log."}";
        
        $reglog = new RegistroLogController();
        $reglog->registrarLog($titulo_log, $log, $tipo_log);
        ####################################### </registra log #######################################
    }
    
    /**
     * Consulta lista de horários livres em uma data.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHorariosLivres(Request $request){
        $arJson = array();
        
        $agendamento = new Agendamento();
        $busySchedule = $agendamento->getBusySchedule( $request::get('agendamento_id'), $request::get('clinica_id'), $request::get('profissional_id'), $request::get('data') );

        for( $hora = 5; $hora <=23; $hora++ ) {

            //For entire hour 
            $isBusy = false;
            foreach( $busySchedule as $schedule ) {
                if ( $schedule->horario == str_pad($hora, 2, 0, STR_PAD_LEFT) . ":00" ) {
                    $isBusy = true;
                }
            }
            if ( !$isBusy ) {
                $this->arHorariosLivres[] = ['hora' => str_pad($hora, 2, 0, STR_PAD_LEFT) . ":00"];
            }

            //For half hour
            $isBusy = false;
            foreach( $busySchedule as $schedule ) {
                if ( $schedule->horario == str_pad($hora, 2, 0, STR_PAD_LEFT) . ":30" ) {
                    $isBusy = true;
                }
            }
            if ( !$isBusy ) {
                $this->arHorariosLivres[] = ['hora' => str_pad($hora, 2, 0, STR_PAD_LEFT) . ":30"];
            }
        }
        
        return Response()->json($this->arHorariosLivres);
    }
    
    /**
     * Muda Status de um agendamento
     * 
     * @param string $teTicket
     */
    public function setStatus($teTicket, $cdStatus){
        $agendamento = Agendamento::where('te_ticket', '=', $teTicket);
        $ct_agendamento = $agendamento;
        
        $arDados = array('cs_status' => $cdStatus);
        $agendamento->update($arDados);
        
        ####################################### registra log> #######################################
        $ct_agendamento_obj = $ct_agendamento->get()->toJson();
        $agendamento_obj    = $agendamento->get()->toJson();
        
        $titulo_log = 'Editar Status de Agendamento';
        $ct_log   = '"reg_anterior":'.'{"agendamento":'.$ct_agendamento_obj.'}';
        $new_log  = '"reg_novo":'.'{"agendamento":'.$agendamento_obj.'}';
        $tipo_log = 3;
        
        $log = "{".$ct_log.",".$new_log."}";
        
        $reglog = new RegistroLogController();
        $reglog->registrarLog($titulo_log, $log, $tipo_log);
        ####################################### </registra log #######################################
    }
    
    /**
     * Muda Status de um agendamento pelo ID
     * 
     * @param string $teTicket
     */
    public function setStatusById($id, $cdStatus){
        $agendamento = Agendamento::find($id);
        
        $arDados = array('cs_status' => $cdStatus);
        $agendamento->update($arDados);
        
        ####################################### registra log> #######################################
        $agendamento_obj    = $agendamento->toJson();
        
        $titulo_log = 'Editar Status de Agendamento';
        $ct_log   = '"reg_anterior":'.'{}';
        $new_log  = '"reg_novo":'.'{"agendamento":'.$agendamento_obj.'}';
        $tipo_log = 3;
        
        $log = "{".$ct_log.",".$new_log."}";
        
        $reglog = new RegistroLogController();
        $reglog->registrarLog($titulo_log, $log, $tipo_log);
        ####################################### </registra log #######################################
    }



    public function enviarEmailAgendamentoLaboratorio($paciente,$pedido, $agendamento, $token_atendimento ) {
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');

		$nome = $paciente->nm_primario.' '.$paciente->nm_secundario;

		/*
		 * se o paciente é um dependente então ele não tem um email,
		 * utiliza o email do titular.
		 */
		if( !is_null($paciente->responsavel_id) ){
			$paciente = Paciente::findorfail($paciente->responsavel_id);
			$paciente->load('user');
			$paciente->load('documentos');
			$paciente->load('contatos');
		}

		$email 		= $paciente->user->email;
		$telefone 	= $paciente->contatos->first()->ds_contato;

		$nm_primario 			= $paciente->nm_primario;
		$nr_pedido 				= sprintf("%010d", $pedido->id);
		$nome_especialidade 	= "Consulta: <span>".$agendamento->nome_especialidade;


		$tipo_atendimento		= "";

		$paciente_id = $paciente->id;
		$plano_ativo_id = Paciente::getPlanoAtivo($paciente_id);
		$preco_ativo = 'R$ 0,00';

		if (!empty($agendamento->atendimento)) {

			$atendimento_id = $agendamento->atendimento->id;
			$atend_temp = new Atendimento();
			$preco_ativo = $atend_temp->getPrecoByPlano($plano_ativo_id, $atendimento_id);
			$preco_ativo = 'R$ '.$preco_ativo->vl_comercial;
		}

		$tipo_pagamento = '--------';
		$pedido_obj = Pedido::findorfail($pedido);
		if(!empty($pedido_obj)) {
			if($pedido_obj->tp_pagamento == 'Crédito' | $pedido_obj->tp_pagamento == 'credito') {
				$pedido_obj->load('pagamentos');
				$tipo_pagamento = 'CRÉDITO';

				try {
					$crc_brand = $paciente->credit_card_brand;
					$tipo_pagamento = $tipo_pagamento.' - '.strtoupper($crc_brand);
				} catch (\Exception $e) {}

			} else {
				$tipo_pagamento = strtoupper($pedido_obj->tp_pagamento);
			}

		}


		$agendamento_status = 'Agendado';

		#dados da mensagem para o cliente
		$mensagem_cliente            		= new Mensagem();

		$mensagem_cliente->rma_nome     	= 'Contato DoutorHoje';
		$mensagem_cliente->rma_email       	= 'contato@doutorhoje.com.br';
		$mensagem_cliente->assunto     		= 'Pré-Agendamento Solicitado';
		$mensagem_cliente->conteudo     	= "<h4>Seu Agendamento Foi Realizado:</h4><br><ul><li>Nº do Pedido: $nr_pedido</li><li>$nome_especialidade</li></ul>";
		$mensagem_cliente->save();

		$destinatario                      = new MensagemDestinatario();
		$destinatario->tipo_destinatario   = 'PC';
		$destinatario->mensagem_id         = $mensagem_cliente->id;
		$destinatario->destinatario_id     = $paciente->user->id;
		$destinatario->save();

		$from = 'contato@doutorhoje.com.br';
		$to = $email;
		$subject = 'Agendamento Realizado';

		$html_message = view('agenda.email_agendamento_lab', compact('nm_primario','tipo_pagamento', 'nr_pedido', 'nome_especialidade', 'preco_ativo', 'token_atendimento'));


		$html_message = str_replace(array("\r", "\n", "\t"), '', $html_message->render());

		$send_message = UtilController::sendMail($to, $from, $subject, $html_message);

		return $send_message;
	}

    /**
     * enviarEmailPreAgendamento a newly external user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enviarEmailAgendamento($paciente, $pedido, $agendamento, $token_atendimento, $filial)
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        
        $nome = $paciente->nm_primario.' '.$paciente->nm_secundario;
        
        /*
         * se o paciente é um dependente então ele não tem um email, 
         * utiliza o email do titular.
         */ 
        if( !is_null($paciente->responsavel_id) ){
            $paciente = Paciente::findorfail($paciente->responsavel_id);
            $paciente->load('user');
            $paciente->load('documentos');
            $paciente->load('contatos');
        }

		$paciente_id = $paciente->id;
		$plano_ativo_id = Paciente::getPlanoAtivo($paciente_id);
		$preco_ativo = 'R$ 0,00';

		if (!empty($agendamento->atendimento)) {
			if(!is_null($agendamento->atendimento->consulta_id)) {
				$tipo_atendimento = "Consulta";
			}

			if(!is_null($agendamento->atendimento->procedimento_id)) {
				$tipo_atendimento = "Exame";
			}

			$atendimento_id = $agendamento->atendimento->id;
			$atend_temp = new Atendimento();
			$preco_ativo = $atend_temp->getPrecoByPlano($plano_ativo_id, $atendimento_id);
			$preco_ativo = 'R$ '.$preco_ativo->vl_comercial;
		}
		$tipo_pagamento = '--------';
		$pedido_obj = Pedido::findorfail($pedido);
		if(!empty($pedido_obj)) {
			if($pedido_obj->tp_pagamento == 'Crédito' | $pedido_obj->tp_pagamento == 'credito') {
				$pedido_obj->load('pagamentos');
				$tipo_pagamento = 'CRÉDITO';

				try {
					$crc_brand = $paciente->credit_card_brand;
					$tipo_pagamento = $tipo_pagamento.' - '.strtoupper($crc_brand);
				} catch (\Exception $e) {}

			} else {
				$tipo_pagamento = strtoupper($pedido_obj->tp_pagamento);
			}

		}

        $email 		= $paciente->user->email;
        $telefone 	= $paciente->contatos->first()->ds_contato;

        $nm_primario 			= $paciente->nm_primario;
        $nr_pedido 				= sprintf("%010d", $pedido->id);
        $nome_especialidade 	= "Especialidade: ".$agendamento->nome_especialidade;
        $nome_profissional		= $agendamento->profissional->nm_primario.' '.$agendamento->profissional->nm_secundario;
        $data_agendamento		= date('d', strtotime($agendamento->getRawDtAtendimentoAttribute())).' de '.strftime('%B', strtotime($agendamento->getRawDtAtendimentoAttribute())).' / '.strftime('%A', strtotime($agendamento->getRawDtAtendimentoAttribute())) ;
        $hora_agendamento		= date('H:i', strtotime($agendamento->getRawDtAtendimentoAttribute())).' (por ordem de chegada)';
        $endereco_agendamento = '--------------------';

        $endereco_agendamento = $filial->endereco->te_endereco.', '.$filial->endereco->nr_logradouro.', '.$filial->endereco->te_bairro.', '.$filial->endereco->cidade->nm_cidade.'-'.$filial->endereco->cidade->sg_estado;

        $agendamento_status = 'Agendado';

        #dados da mensagem para o cliente
        $mensagem_cliente            		= new Mensagem();
        
        $mensagem_cliente->rma_nome     	= 'Contato DoutorHoje';
        $mensagem_cliente->rma_email       	= 'contato@doutorhoje.com.br';
        $mensagem_cliente->assunto     		= 'Pré-Agendamento Solicitado';
        $mensagem_cliente->conteudo     	= "<h4>Seu Agendamento Foi Realizado:</h4><br><ul><li>Nº do Pedido: $nr_pedido</li><li>Especialidade/consulta: $nome_especialidade</li><li>Dr(a): $nome_profissional</li><li>Data: $data_agendamento</li><li>Horário: $hora_agendamento (por ordem de chegada)</li><li>Endereço: $endereco_agendamento</li></ul>";
        $mensagem_cliente->save();
        
        $destinatario                      = new MensagemDestinatario();
        $destinatario->tipo_destinatario   = 'PC';
        $destinatario->mensagem_id         = $mensagem_cliente->id;
        $destinatario->destinatario_id     = $paciente->user->id;
        $destinatario->save();
        
        $from = 'contato@doutorhoje.com.br';
        $to = $email;
        $subject = 'Agendamento Realizado';

        $html_message = view('agenda.email_agendamento', compact('nm_primario', 'nr_pedido', 'nome_especialidade', 'nome_profissional','preco_ativo', 'data_agendamento', 'hora_agendamento', 'endereco_agendamento',
			'agendamento_status', 'token_atendimento','tipo_pagamento'));

        $html_message = str_replace(array("\r", "\n", "\t"), '', $html_message->render());

        $send_message = UtilController::sendMail($to, $from, $subject, $html_message);
        
//         echo "<script>console.log( 'Debug Objects: " . $send_message . "' );</script>";
        //     	return redirect()->route('provisorio')->with('success', 'A Sua mensagem foi enviada com sucesso!');
        
        return $send_message;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consultaEspecialidades(Request $request)
    {
        $tipo_atendimento = $request::get('tipo_atendimento');
        $result = [];
        
        if ($tipo_atendimento == 'saude') { //--realiza a busca pelos itens do tipo CONSULTA-------- 
            $consulta = new Consulta();
            $result = $consulta->getActive();
            $result = $result->toArray();
        } elseif ($tipo_atendimento == 'exame' | $tipo_atendimento == 'odonto') { //--realiza a busca pelos itens do tipo CONSULTA--------
            $procedimento = new Procedimento();
            $result = ( $tipo_atendimento == 'exame' ) ? $procedimento->getActiveExameProcedimento() : $procedimento->getActiveOdonto();
            $result = $result->toArray();
        } elseif ($tipo_atendimento == 'checkup') {
            $checkup = new Checkup;
            $checkups = $checkup->getActive();
            foreach($checkups as $checkup){
                $item = [
                    'id'        => $checkup->id,
                    'tipo'      => 'checkup',
                    'descricao' => strtoupper($checkup->titulo)
                ];         
                array_push($result, $item);
            }
        }

        return response()->json(['status' => true, 'atendimento' => json_encode($result)]);
    }

    /**
     * Get clinicas by clinica/consulta
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getProfissionalsByClinicaConsulta(Request $request)
    {
        $profissional = new Profissional();
        $profissionals = $profissional->getActiveProfissionalsByClinicaConsulta( $request::get('clinica_id'), $request::get('especialidade_id') );

        echo json_encode($profissionals);
        exit;
    }

    /**
     * Get filials by clinica/profissional/consulta
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getFilialsByClinicaProfissionalConsulta(Request $request)
    {
        $filial = new Filial();
        $filials = $filial->getActiveByClinicaProfissionalConsulta( $request::get('clinica_id'), $request::get('profissional_id'), $request::get('especialidade_id') );

        echo json_encode($filials);
        exit;
    }

    /**
     * Get filials by clinica/profissional/procedimento
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getFilialsByClinicaProcedimento(Request $request)
    {
        $filial = new Filial();
        $filials = $filial->getActiveByClinicaProcedimento( $request::get('clinica_id'), $request::get('especialidade_id') );

        echo json_encode($filials);
        exit;
    }

    /**
     * Create a new agendamento x atendimento
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createNewAgendamentoAtendimento(Request $request)
    {
        try {
            $agendamento = Agendamento::find( $request::get('agendamento_id') );
			$oldAgendamento = $agendamento;

			$paciente = new Paciente();
			$plano_id = $paciente->getPlanoAtivo($agendamento->paciente_id);

			$atendimento = Atendimento::where( 'clinica_id', $request::get('clinica_id') )
				->when($request::get('tipo_atendimento') == 'saude', function ($query) use ($request) {
					return $query->where( 'profissional_id', $request::get('profissional_id') );
				})
				->where( ( $request::get('tipo_atendimento') == 'saude' ) ? 'consulta_id' : 'procedimento_id', $request::get('especialidade') )
				->where( 'cs_status', 'A' )
				->with('precoAtivo')->whereHas('precoAtivo', function($query) use ($plano_id) {
					$query->where('plano_id', '=', $plano_id);
				})->first();

			$filial = Filial::findorfail($request::get('filial_id'));

            $oldAtendimentos = $agendamento->atendimentos()->get();
			foreach($oldAtendimentos as $oldAtendimento) {
				$agendamento->atendimentos()->updateExistingPivot( $oldAtendimento->id, ['deleted_at' => date('Y-m-d H:i:s') ] );
			}

			$agendamento->filial_id 		= $filial->id;
			$agendamento->atendimento_id	= $atendimento->id;
			$agendamento->clinica_id		= $atendimento->clinica_id;
			$agendamento->profissional_id	= $atendimento->profissional_id;
			$agendamento->save();

			$itemPedido 					= Itempedido::where('agendamento_id', $agendamento->id)->first();
			$itemPedido->save();

            $agendamento->atendimentos()->syncWithoutDetaching([$atendimento->id => ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'deleted_at' => null]]);

            ####################################### registra log> #######################################
            $agendamento_obj    = $agendamento->toJson();
			$oldAgendamento_obj	= $oldAgendamento->toJson();
            
            $titulo_log = 'Realizar Agendamento';
            $ct_log   = '"reg_anterior":'.'{"agendamento":'.$oldAgendamento_obj.'}';
            $new_log  = '"reg_novo":'.'{"agendamento":'.$agendamento_obj.'}';
            $tipo_log = 1;
            
            $log = "{".$ct_log.",".$new_log."}";
            
            $reglog = new RegistroLogController();
            $reglog->registrarLog($titulo_log, $log, $tipo_log);
            ####################################### </registra log #######################################
        } catch(\Exception $e) {
			DB::rollback();
			return response()->json([
				'status' => false,
				'message' => 'Erro ao atualizar o agendamento!'.$e->getMessage()
			], 500);
        }

        DB::commit();
		return response()->json([
			'status' => true,
			'message' => 'Agendamento atualizado com sucesso!'
		], 200);
    }
}
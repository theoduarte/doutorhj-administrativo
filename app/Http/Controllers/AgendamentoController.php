<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
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

class AgendamentoController extends Controller
{
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
        $data = Request::get('data') != null ? UtilController::getDataRangeTimePickerToCarbon(Request::get('data')) :'';

        // DB::enableQueryLog();
        $agendamentos = Agendamento::
        where( function ($query) use ($request) {
            if( !empty($request::get('cs_status')) ) {
                $query->whereIn( 'cs_status', $request::get('cs_status') );
            }

            if( !empty($request::get('data')) ) {
                $date = UtilController::getDataRangeTimePickerToCarbon($request::get('data'));

                $dateBegin  = $date['de']; 
                $dateEnd    = $date['ate']; 

                $query->whereDate('agendamentos.dt_atendimento', '>=', date('Y-m-d H:i:s', strtotime($dateBegin)))->whereDate('agendamentos.dt_atendimento', '<=', date('Y-m-d H:i:s', strtotime($dateEnd)));
            }

            if( !empty( $request::get('clinica_id') ) ) {                
                $query->whereExists(function ($query) use ($request) {
                    $query->select(DB::raw(1))
                      ->from('agendamento_atendimento')
                      ->join('atendimentos', function ($query) use ($request) {
                          $query->on('agendamento_atendimento.atendimento_id', '=', 'atendimentos.id')
                          ->where( 'atendimentos.clinica_id', $request::get('clinica_id') );
                      })
                      ->whereRaw('agendamento_atendimento.agendamento_id = agendamentos.id');
                });
            }

            if( !empty( $request::get('nm_paciente') ) ) {
                $query->whereExists(function ($query) use ($request) {
                    $nmPaciente = UtilController::toStr(Request::get('nm_paciente'));

                    $query->select(DB::raw(1) )
                      ->from('pacientes')
                      ->whereRaw('agendamentos.paciente_id = pacientes.id')
                      ->where(function ($query) use ($nmPaciente) {
                          $query->where( DB::raw('to_str(pacientes.nm_primario)'), 'like', '%'.$nmPaciente.'%' )
                          ->orWhere( DB::raw('to_str(pacientes.nm_secundario)'), 'like', '%'.$nmPaciente.'%' )
                          ->orWhere( DB::raw("concat(to_str(pacientes.nm_primario), ' ',to_str(pacientes.nm_secundario))"), 'like', '%'.$nmPaciente.'%' );
                      });
                });
            }
        })
        ->whereHas('atendimentos', function ($query) {
            $query->whereNull('deleted_at');
        })
        ->orderBy( DB::raw('  CASE  WHEN agendamentos.cs_status::int = 10  THEN 1 
                                    WHEN agendamentos.cs_status::int = 20  THEN 2
                                    WHEN agendamentos.cs_status::int = 80  THEN 3
                                    WHEN agendamentos.cs_status::int = 70  THEN 4
                                    WHEN agendamentos.cs_status::int = 30  THEN 5
                                    WHEN agendamentos.cs_status::int = 40  THEN 6
                                    WHEN agendamentos.cs_status::int = 50  THEN 7
                                    WHEN agendamentos.cs_status::int = 60  THEN 8
                                    WHEN agendamentos.cs_status::int = 90  THEN 9
                                    WHEN agendamentos.cs_status::int = 100 THEN 10 END') ,'asc')
        ->orderBy( 'agendamentos.dt_atendimento')
        ->paginate(20);

        // dd( DB::getQueryLog() );

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
    public function addAgendamento(Request $request) {

        $agendamento = Agendamento::find( $request::get('agendamento_id') );

        if ( $agendamento->cs_status == Agendamento::AGENDADO ) {
          $agendamento->bo_remarcacao = 'A';
        }

        $agendamento->cs_status = Agendamento::AGENDADO;
        if ( !empty($agendamento->atendimentos()->whereNull('deleted_at')->first()->consulta_id) ) {
          $agendamento->dt_atendimento = Carbon::createFromFormat( "d/m/Y H:i", $request::get('data') . " " . $request::get('time') )->toDateTimeString();
          $agendamento->filial_id = $request::get('filial_id');
        }
        else {
            if( $agendamento->atendimentos()->whereNull('deleted_at')->first()->clinica->tp_prestador == 'CLI') {
                $agendamento->dt_atendimento = Carbon::createFromFormat( "d/m/Y H:i", $request::get('data') . " " . $request::get('time') )->toDateTimeString();
            }
            else {
                $agendamento->dt_atendimento = Carbon::createFromFormat( "d/m/Y H:i", $agendamento->dt_atendimento);
            }
        }

        $agendamento->save();

        //--carrega os dados do paciente para configurar a mensagem-----
        $filial = Filial::findorfail($agendamento->filial_id);
        
        //--carrega os dados do paciente para configurar a mensagem-----
        $paciente = Paciente::findorfail($agendamento->paciente_id);
        $paciente->load('user');
        $paciente->load('documentos');
        $paciente->load('contatos');
        
        //--carrega os dados do agendamento para configurar a mensagem-----
        $ct_agendamento = $agendamento->first();
        $ct_agendamento->load('itempedidos');
        $ct_agendamento->load('atendimento');
        $ct_agendamento->load('clinica');
        $ct_agendamento->load('profissional');
        
        $ct_agendamento->profissional->load('especialidades');
        $nome_especialidade = "";
        
        foreach ($ct_agendamento->profissional->especialidades as $especialidade) {
            $nome_especialidade = $nome_especialidade.' | '.$especialidade->ds_especialidade;
        }
        
        $ct_agendamento->nome_especialidade = $nome_especialidade;
        
        //--carrega os dados do pedido para configurar a mensagem-----
        $pedido_id = $ct_agendamento->itempedidos->first()->pedido_id;

        $pedido = Pedido::findorfail($pedido_id);
        
        $token_atendimento = $agendamento->te_ticket;
        
        //--enviar mensagem informando o pre agendamento da solicitacao----------------
        try {
            $this->enviarEmailAgendamento($paciente, $pedido, $ct_agendamento, $token_atendimento, $filial);
        } catch (Exception $e) {}
    }
    
    /**
     * Realiza o cancelamento de uma consulta por ticket.
     * 
     * @param string $teTicket
     */
    public function addCancelamento($teTicket, $dtAtendimento, $obsCancelamento=null) {
        $agendamento = Agendamento::where('te_ticket', '=', $teTicket)
                       ->where('dt_atendimento', Carbon::createFromFormat("Y-m-d H:i:s", $dtAtendimento));
        
        $agendamento->update(array('cs_status' => Agendamento::CANCELADO,
                                   'obs_cancelamento' => $obsCancelamento));
    }
    
    /**
     * Consulta lista de horários livres em uma data.
     *
     * @param date $data
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
     * @param unknown $teTicket
     */
    public function setStatus($teTicket, $cdStatus){
        $agendamento = \App\Agendamento::where('te_ticket', '=', $teTicket);
        
        $arDados = array('cs_status' => $cdStatus);
        $agendamento->update($arDados);
    }
    
    /**
     * Muda Status de um agendamento pelo ID
     * 
     * @param unknown $teTicket
     */
    public function setStatusById($id, $cdStatus){
        $agendamento = \App\Agendamento::find($id);
        
        $arDados = array('cs_status' => $cdStatus);
        $agendamento->update($arDados);
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
        
        $nome 		= $paciente->nm_primario.' '.$paciente->nm_secundario;
        
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
        $nome_especialidade 	= $agendamento->nome_especialidade;
        $nome_profissional		= $agendamento->atendimentos()->first()->profissional->nm_primario.' '.$agendamento->atendimentos()->first()->profissional->nm_secundario;
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
        $mensagem_cliente->conteudo     	= "<h4>Seu Agendamento Foi Realizado:</h4><br><ul><li>Nº do Pedido: $nr_pedido</li><li>Especialidade/exame: $nome_especialidade</li><li>Dr(a): $nome_profissional</li><li>Data: $data_agendamento</li><li>Horário: $hora_agendamento (por ordem de chegada)</li><li>Endereço: $endereco_agendamento</li></ul>";
        $mensagem_cliente->save();
        
        $destinatario                      = new MensagemDestinatario();
        $destinatario->tipo_destinatario   = 'PC';
        $destinatario->mensagem_id         = $mensagem_cliente->id;
        $destinatario->destinatario_id     = $paciente->user->id;
        $destinatario->save();
        
        $from = 'contato@doutorhoje.com.br';
        $to = $email;
        $subject = 'Agendamento Realizado';
        
        $html_message = <<<HEREDOC
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <title>DoutorHoje</title>
    </head>
    <body style='margin: 0;'>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr style='background-color:#fff;'>
                <td width='480' style='text-align:left'>&nbsp;</td>
                <td width='120' style='text-align:right'>&nbsp;</td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr style='background-color:#fff;'>
                <td width='480' style='text-align:left'><span style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#434342;'>DoutorHoje - Confirmação de agendamento</span></td>
                <td width='120' style='text-align:right'><a href='#' target='_blank' style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#434342;'>Abrir no navegador</a></td>
            </tr>
        </table>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td><img src='https://doutorhoje.com.br/libs/home-template/img/email/h1.png' width='600' height='113' alt='DoutorHoje'/></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td style='background: #1d70b7; font-family:Arial, Helvetica, sans-serif; text-align: center; color: #ffffff; font-size: 28px; line-height: 80px;'><strong>Confirmação de agendamento</strong></td>
            </tr>
        </table>
        <br>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
                <td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 28px; line-height: 50px; color: #434342; background-color: #fff; text-align: center;'>
                    Olá, <strong style='color: #1d70b7;'>$nm_primario</strong>
                </td>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
            </tr>
        </table>
        <br>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
                <td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; background-color: #fff;'>
                    Temos uma boa notícia! Sua solicitação de agendamento foi
                    efetuada com sucesso. Atenção ao horário e data do serviço
                    escolhido.
                </td>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
            </tr>
        </table>
        <br>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='30'></td>
                <td width='34'><img src='https://doutorhoje.com.br/libs/home-template/img/email/numero-pedido.png' width='34' height='30' alt=''/></td>
                <td width='10'>&nbsp;</td>
                <td width='496' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342;'>Nº do pedido: <span>$nr_pedido</span></td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='30'></td>
                <td width='34'><img src='https://doutorhoje.com.br/libs/home-template/img/email/especialidade.png' width='34' height='30' alt=''/></td>
                <td width='10'>&nbsp;</td>
                <td width='496' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342;'>Especialidade/exame: <span>$nome_especialidade</span></td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='30'></td>
                <td width='34'><img src='https://doutorhoje.com.br/libs/home-template/img/email/especialidade.png' width='34' height='30' alt=''/></td>
                <td width='10'>&nbsp;</td>
                <td width='496' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342;'>Dr(a): <span>$nome_profissional</span></td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='30'></td>
                <td width='34'><img src='https://doutorhoje.com.br/libs/home-template/img/email/data.png' width='34' height='30' alt=''/></td>
                <td width='10'>&nbsp;</td>
                <td width='496' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342;'><span>$data_agendamento</span></td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='30'></td>
                <td width='34'><img src='https://doutorhoje.com.br/libs/home-template/img/email/hora.png' width='34' height='30' alt=''/></td>
                <td width='10'>&nbsp;</td>
                <td width='496' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342;'><span>$hora_agendamento</span></td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='30'></td>
                <td width='34'><img src='https://doutorhoje.com.br/libs/home-template/img/email/local.png' width='34' height='30' alt=''/></td>
                <td width='10'>&nbsp;</td>
                <td width='496' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342;'><span>$endereco_agendamento</span>
                </td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='30'></td>
                <td width='34'><img src='https://doutorhoje.com.br/libs/home-template/img/email/status.png' width='34' height='30' alt=''/></td>
                <td width='10'>&nbsp;</td>
                <td width='496' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342;'>Status: <span>$agendamento_status</span></td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <br>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
                <td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; background-color: #fff; text-align: center;'>
                    Apresente esse código à secretária do médico ou clínica:
                </td>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
            </tr>
        </table>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='130' style='background-color: #fff;'>&nbsp;</td>
                <td width='340' style='background: #1d70b7; font-family:Arial, Helvetica, sans-serif; font-size: 14px; line-height: 50px; color: #434342; text-align: center; color: #ffffff;'>
                    TOKEN PARA ATENDIMENTO: <strong style='color: #ffffff;'><span style='color: #ffffff;'>$token_atendimento</span></strong>
                </td>
                <td width='130' style='background-color: #fff;'>&nbsp;</td>
            </tr>
        </table>
        <br>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
                <td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; background-color: #fff;'>
                    Evite transtornos! Caso ocorra algum imprevisto, impossibilitando
                    o comparecimento ao serviço contratado ou reagendamento, nos
                    informe com até 24 horas de antecedência, evitando prejuízo e
                    aplicação de multa.
                </td>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
            </tr>
        </table>
        <br>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
                <td width='540' style='background: #1d70b7; font-family:Arial, Helvetica, sans-serif; font-size: 14px; line-height: 50px; color: #434342; text-align: center;'>
                    <strong style='color: #ffffff;'>REGRAS DE CANCELAMENTO E REAGENDAMENTO</strong>
                </td>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30'></td>
                <td width='180' style='background-color: #307ec1; font-family:Arial, Helvetica, sans-serif; font-size: 12px; line-height: 50px; color: #ffffff; text-align: center;'><strong style='color: #ffffff;'>SOLICITAÇÃO/PERÍODO</strong></td>
                <td width='180' style='background-color: #307ec1; font-family:Arial, Helvetica, sans-serif; font-size: 12px; line-height: 50px; color: #ffffff; text-align: center;'><strong style='color: #ffffff;'>ATÉ 24 HORAS</strong></td>
                <td width='180' style='background-color: #307ec1; font-family:Arial, Helvetica, sans-serif; font-size: 12px; line-height: 50px; color: #ffffff; text-align: center;'><strong style='color: #ffffff;'>INFERIOR A 24 HORAS</strong></td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30'></td>
                <td width='180' style='background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='179' style='border-left:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='179' style='border-left:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30'></td>
                <td width='180' style='background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>Cancelamento</td>
                <td width='179' style='border-left:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>Reembolso de 50%<br>
                    do valor pago em até<br>
                    5 dias úteis.
                </td>
                <td width='179' style='border-left:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>Sem direito a<br>
                    reembolso.
                </td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30'></td>
                <td width='180' style='background-color: #f9f9f9; border-bottom:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='179' style='border-left:1px solid #ddd; border-bottom:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='179' style='border-left:1px solid #ddd; border-bottom:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30'></td>
                <td width='180' style='background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='179' style='border-left:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='179' style='border-left:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30'></td>
                <td width='180' style='background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>Reagendamento</td>
                <td width='179' style='border-left:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>Direito a 1 (um)
                    reagendamento em
                    no máximo 30 dias.
                </td>
                <td width='179' style='border-left:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>Perda do direito de
                    reagendamento.
                </td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30'></td>
                <td width='180' style='background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='179' style='border-left:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='179' style='border-left:1px solid #ddd; background-color: #f9f9f9; font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; text-align: center;'>&nbsp;</td>
                <td width='30'></td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
                <td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; background-color: #fff; text-align: center;'>
                    Abraços,<br>
                    Equipe Doutor Hoje
                </td>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='209'></td>
                <td width='27'><a href='#'><img src='https://doutorhoje.com.br/libs/home-template/img/email/facebook.png' width='27' height='24' alt=''/></a></td>
                <td width='27'><a href='#'><img src='https://doutorhoje.com.br/libs/home-template/img/email/youtube.png' width='27' height='24' alt=''/></a></td>
                <td width='27'><a href='#'><img src='https://doutorhoje.com.br/libs/home-template/img/email/instagram.png' width='27' height='24' alt=''/></a></td>
                <td width='210'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='30'></td>
                <td width='540' style='line-height:16px; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#434342; text-align: center;'>
                    Em caso de qualquer dúvida, fique à vontade <br>
                    para responder esse e-mail ou
                    nos contatar no <br><br>
                    <a href='mailto:cliente@doutorhoje.com.br' style='color:#1d70b7; text-decoration: none;'>cliente@doutorhoje.com.br</a>
                    <br><br>
                    Ou ligue para (61) 3221-5350, o atendimento é de<br>
                    segunda à sexta-feira
                    das 8h00 às 18h00. <br><br>
                    <strong>Doutor Hoje</strong> 2018 
                </td>
                <td width='30'></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='10' align='center'>
            <tr style='background-color: #f9f9f9;'>
                <td width='513'>
                    &nbsp;
                </td>
            </tr>
        </table>
    </body>
</html>
HEREDOC;
        
        $html_message = str_replace(array("\r", "\n"), '', $html_message);
        
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
        DB::beginTransaction();

        try {
            $agendamento = Agendamento::find( $request::get('agendamento_id') );
            $agendamento->filial_id = $request::get('filial_id');
            $agendamento->save();

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

            $itemPedido = Itempedido::where('agendamento_id', $agendamento->id)->first();
            $itemPedido->valor = $atendimento->precoAtivo->vl_comercial;
            $itemPedido->save();

            $oldAtendimento = $agendamento->atendimentos()->whereNull('deleted_at')->first();
            if ( !empty($oldAtendimento) ) {
              $agendamento->atendimentos()->updateExistingPivot( $oldAtendimento->id, ['deleted_at' => date('Y-m-d H:i:s') ] );  
            }
            
            $agendamento->atendimentos()->attach( $atendimento->id, ['created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s') ] );  
        } catch (Exception $e) {
            DB::rollback();
        }

        DB::commit();
    }
}
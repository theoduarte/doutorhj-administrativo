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

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicas = Clinica::all();
        
        $clinica_id = Request::get('clinica_id');
        $nm_paciente = UtilController::toStr(Request::get('nm_paciente'));
               
        $data = Request::get('data') != null ? UtilController::getDataRangeTimePickerToCarbon(Request::get('data')) :'';
        
        $agenda = [];
        
        $arCsStatus = [];
        if( !empty(Request::get('ckPreAgendada'))            ) $arCsStatus[] = Agendamento::PRE_AGENDADO;
        if( !empty(Request::get('ckConsultasAgendadas'))     ) $arCsStatus[] = Agendamento::AGENDADO;
        if( !empty(Request::get('ckConsultasConfirmadas'))   ) $arCsStatus[] = Agendamento::CONFIRMADO;
        if( !empty(Request::get('ckConsultasNaoConfirmadas'))) $arCsStatus[] = Agendamento::NAO_CONFIRMADO;
        if( !empty(Request::get('ckConsultasCanceladas'))    ) $arCsStatus[] = Agendamento::CANCELADO;
        if( !empty(Request::get('ckAusencias'))              ) $arCsStatus[] = Agendamento::AUSENTE;
        if( !empty(Request::get('ckRetornoConsultas'))       ) $arCsStatus[] = Agendamento::RETORNO;
        if( !empty(Request::get('ckConsultasFinalizadas'))   ) $arCsStatus[] = Agendamento::FINALIZADO;
        
         DB::enableQueryLog();
        $agenda = Agendamento::with('paciente')->with('clinica')->with('atendimento')->with('profissional')->with('itempedidos')
            ->join('pacientes', function($join1) { $join1->on('pacientes.id', '=', 'agendamentos.paciente_id');})
            ->where(function($query1) use ($data) {       if( $data != '') {            $data_inicio = $data['de']; $data_fim = $data['ate']; $query1->whereDate('agendamentos.dt_atendimento', '>=', date('Y-m-d H:i:s', strtotime($data_inicio)))->whereDate('agendamentos.dt_atendimento', '<=', date('Y-m-d H:i:s', strtotime($data_fim)));}})
            ->where(function($query2) use ($arCsStatus) { if( count($arCsStatus) > 0)   $query2->whereIn('agendamentos.cs_status', $arCsStatus);})
            ->where(function($query3) use ($clinica_id) { if($clinica_id != null)       $query3->where(DB::raw('id'), '=', $clinica_id);})
            ->where(function($query4) use ($nm_paciente) { if( $nm_paciente != '')      $query4->where(DB::raw('to_str(pacientes.nm_primario)'), 'like', '%'.$nm_paciente.'%')->orWhere(DB::raw('to_str(pacientes.nm_secundario)'), 'like', '%'.$nm_paciente.'%')->orWhere(DB::raw('concat(to_str(pacientes.nm_secundario), " ",to_str(pacientes.nm_secundario))'), 'like', '%'.$nm_paciente.'%');})
            ->select('agendamentos.*')
            ->distinct()
            ->orderBy('agendamentos.dt_atendimento', 'desc')
            ->paginate(10);
       
         $query_temp = DB::getQueryLog();
         dd($query_temp);
		//dd($agenda);
        for ($i = 0; $i < sizeof($agenda); $i++) {
            $agenda[$i]->clinica->load('enderecos');
            $agenda[$i]->clinica->enderecos->first()->load('cidade');
            $agenda[$i]->endereco_completo = $agenda[$i]->clinica->enderecos->first()->te_endereco.' - '.$agenda[$i]->clinica->enderecos->first()->te_bairro.' - '.$agenda[$i]->clinica->enderecos->first()->cidade->nm_cidade.'/'.$agenda[$i]->clinica->enderecos->first()->cidade->estado->sg_estado;
            
            if ( sizeof($agenda[$i]->itempedidos) > 0) {
            	$agenda[$i]->itempedidos->first()->load('pedido');
            	$agenda[$i]->itempedidos->first()->pedido->load('pagamentos');
            	$agenda[$i]->valor_total = sizeof($agenda[$i]->itempedidos->first()->pedido->pagamentos) > 0 ? number_format( ($agenda[$i]->itempedidos->first()->pedido->pagamentos->first()->amount)/100,  2, ',', '.') : number_format( 0,  2, ',', '.');
            } else {
            	$agenda[$i]->valor_total = number_format( 0,  2, ',', '.');
            }
        }
        
        return view('agenda.index', compact('agenda', 'clinicas'));
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
            $nrDocumento = null;
            foreach($query->documentos as $objDocumento){
                if( $objDocumento->tp_documento == 'CNPJ' ){
                    $nrDocumento = $objDocumento->te_documento;
                }
            }
            
            $teDocumento = (!empty($nrDocumento)) ? ' - CNPJ: ' . $nrDocumento : null;
            $arJson[] = [ 'id' => $query->id, 'value' => $query->nm_razao_social . $teDocumento];
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
        $profissional = \App\Profissional::where(function($query){

                                                })->get();
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
     * @param integer $idClinica
     * @param integer $idProfissional
     * @param integer $idPaciente
     * @param integer $dia
     * @param integer $mes
     * @param integer $ano
     * @param string  $hora
     */
    public function addAgendamento($teTicket, $idClinica, $idProfissional, $idPaciente, 
                                   $dia=null, $mes=null, $ano=null, $hora=null, $boRemarcacao='N'){
        
        $agendamento = Agendamento::where('paciente_id', '=', $idPaciente)->where('te_ticket', '=', $teTicket);
        
        if(is_null($ano) and is_null($hora)){
            $arDados = array('bo_remarcacao'  => $boRemarcacao,
                             'clinica_id'     => $idClinica,
                             'te_ticket'      => $teTicket,
                             'profissional_id'=> $idProfissional,
                             'cs_status'      => Agendamento::AGENDADO);
        } else {
            $arDados = array('dt_atendimento' => new Carbon($ano.'-'.$mes.'-'.$dia.' '.$hora),
                             'bo_remarcacao'  => $boRemarcacao, 
                             'clinica_id'     => $idClinica,
                             'te_ticket'      => $teTicket,
                             'profissional_id'=> $idProfissional,
                             'cs_status'      => Agendamento::AGENDADO);
            
            //--carrega os dados do paciente para configurar a mensagem-----
            $paciente = Paciente::findorfail($idPaciente);
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
            
            $token_atendimento = $teTicket;
            
            //--enviar mensagem informando o pre agendamento da solicitacao----------------
            try {
                $this->enviarEmailAgendamento($paciente, $pedido, $ct_agendamento, $token_atendimento);
            } catch (Exception $e) {}
        }
        
        $agendamento->update($arDados);
    }
    
    /**
     * Realiza o cancelamento de uma consulta por ticket.
     * 
     * @param string $teTicket
     */
    public function addCancelamento($teTicket, $obsCancelamento=null){
        
        $agendamento = Agendamento::where('te_ticket', '=', $teTicket);
        
        $arDados = array('cs_status'=> Agendamento::CANCELADO, 'obs_cancelamento'=> $obsCancelamento);
        
        $agendamento->update($arDados);
    }
    
    /**
     * Consulta lista de horários livres em uma data.
     *
     * @param date $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHorariosLivres($idClinica, $idProfissional, $data){
        $arJson = array();
        
        for( $hora = 8; $hora <=18; $hora++ ){
            $this->_verificaDisponibilidadeHorario($idClinica, $idProfissional, $data, str_pad($hora, 2, 0, STR_PAD_LEFT).':00:00');
            $this->_verificaDisponibilidadeHorario($idClinica, $idProfissional, $data, str_pad($hora, 2, 0, STR_PAD_LEFT).':30:00');
        }
        
        return Response()->json($this->arHorariosLivres);
    }
    
    /**
     * Consulta disponibilidade de horário
     *
     * @param integer $hora
     * @return boolean
     */
    private function _verificaDisponibilidadeHorario($idClinica, $idProfissional, $data, $hora){
        $agenda = \App\Agendamento::where('dt_atendimento', new Carbon($data.' '.$hora))
                    ->where('clinica_id', $idClinica)
                    ->where('profissional_id', $idProfissional);
        
        if( $agenda->count() == 0 ){
            $this->arHorariosLivres[] = ['hora'=>substr($hora, 0, 5)];
            return true;
        }else{
            return false;
        }
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
     * enviarEmailPreAgendamento a newly external user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enviarEmailAgendamento($paciente, $pedido, $agendamento, $token_atendimento)
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
        $nome_profissional		= $agendamento->profissional->nm_primario.' '.$agendamento->profissional->nm_secundario;
        $data_agendamento		= date('d', strtotime($agendamento->getRawDtAtendimentoAttribute())).' de '.strftime('%B', strtotime($agendamento->getRawDtAtendimentoAttribute())).' / '.strftime('%A', strtotime($agendamento->getRawDtAtendimentoAttribute())) ;
        $hora_agendamento		= date('H:i', strtotime($agendamento->getRawDtAtendimentoAttribute())).' (por ordem de chegada)';
        $endereco_agendamento = '--------------------';
        
        $agendamento->clinica->load('enderecos');
        $enderecos_clinica = $agendamento->clinica->enderecos->first();
        
        if ($agendamento->clinica->enderecos != null) {
            $enderecos_clinica->load('cidade');
            $cidade_clinica = $enderecos_clinica->cidade;
            
            if ($cidade_clinica != null) {
                $endereco_agendamento = $enderecos_clinica->te_endereco.', '.$enderecos_clinica->nr_logradouro.', '.$enderecos_clinica->te_bairro.', '.$cidade_clinica->nm_cidade.'/ '.$cidade_clinica->sg_estado;
            }
        }
        
        $agendamento_status = 'Agendado';
        
        #dados da mensagem para o cliente
        $mensagem_cliente            		= new Mensagem();
        
        $mensagem_cliente->rma_nome     	= 'Contato DoctorHoje';
        $mensagem_cliente->rma_email       	= 'contato@doctorhoje.com.br';
        $mensagem_cliente->assunto     		= 'Pré-Agendamento Solicitado';
        $mensagem_cliente->conteudo     	= "<h4>Seu Agendamento Foi Realizado:</h4><br><ul><li>Nº do Pedido: $nr_pedido</li><li>Especialidade/exame: $nome_especialidade</li><li>Dr(a): $nome_profissional</li><li>Data: $data_agendamento</li><li>Horário: $hora_agendamento (por ordem de chegada)</li><li>Endereço: $endereco_agendamento</li></ul>";
        $mensagem_cliente->save();
        
        $destinatario                      = new MensagemDestinatario();
        $destinatario->tipo_destinatario   = 'PC';
        $destinatario->mensagem_id         = $mensagem_cliente->id;
        $destinatario->destinatario_id     = $paciente->user->id;
        $destinatario->save();
        
        $from = 'contato@doctorhoje.com.br';
        $to = $email;
        $subject = 'Agendamento Realizado';
        
        $html_message = <<<HEREDOC
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
        <title>DoctorHoje</title>
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
                <td width='480' style='text-align:left'><span style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#434342;'>DoctorHoje - Confirmação de agendamento</span></td>
                <td width='120' style='text-align:right'><a href='#' target='_blank' style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#434342;'>Abrir no navegador</a></td>
            </tr>
        </table>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td><img src='https://doctorhoje.com.br/libs/home-template/img/email/h1.png' width='600' height='113' alt='DoctorHoje'/></td>
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
                <td width='34'><img src='https://doctorhoje.com.br/libs/home-template/img/email/numero-pedido.png' width='34' height='30' alt=''/></td>
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
                <td width='34'><img src='https://doctorhoje.com.br/libs/home-template/img/email/especialidade.png' width='34' height='30' alt=''/></td>
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
                <td width='34'><img src='https://doctorhoje.com.br/libs/home-template/img/email/especialidade.png' width='34' height='30' alt=''/></td>
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
                <td width='34'><img src='https://doctorhoje.com.br/libs/home-template/img/email/data.png' width='34' height='30' alt=''/></td>
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
                <td width='34'><img src='https://doctorhoje.com.br/libs/home-template/img/email/hora.png' width='34' height='30' alt=''/></td>
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
                <td width='34'><img src='https://doctorhoje.com.br/libs/home-template/img/email/local.png' width='34' height='30' alt=''/></td>
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
                <td width='34'><img src='https://doctorhoje.com.br/libs/home-template/img/email/status.png' width='34' height='30' alt=''/></td>
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
                    Equipe Doctor Hoje
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
                <td width='27'><a href='#'><img src='https://doctorhoje.com.br/libs/home-template/img/email/facebook.png' width='27' height='24' alt=''/></a></td>
                <td width='27'><a href='#'><img src='https://doctorhoje.com.br/libs/home-template/img/email/youtube.png' width='27' height='24' alt=''/></a></td>
                <td width='27'><a href='#'><img src='https://doctorhoje.com.br/libs/home-template/img/email/instagram.png' width='27' height='24' alt=''/></a></td>
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
                    <a href='mailto:meajuda@doctorhoje.com.br' style='color:#1d70b7; text-decoration: none;'>meajuda@doctorhoje.com.br</a>
                    <br><br>
                    Ou ligue para (61) 3221-5350, o atendimento é de<br>
                    segunda à sexta-feira
                    das 8h00 às 18h00. <br><br>
                    <strong>Doctor Hoje</strong> 2018 
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
}

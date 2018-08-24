<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mensagem;
use App\MensagemDestinatario;
use Illuminate\Support\Facades\DB;

class MensagemController extends Controller
{
    
    /**
     * Marca notificaao como visualizada.
     * 
     * @param integer $idMensagem
     */
    public function setStatusVisualizado($idMensagem){
        $mensagem = MensagemDestinatario::findorfail($idMensagem);
        $mensagem->update(['visualizado'=>true]);   
    }
    
    /**
     * getListaNotificacoes a newly external user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getListaNotificacoes(){
        
        $user_session = Auth::user();
        
        $mensagems = Mensagem::with('remetente')
            ->join('mensagem_destinatarios', function($join1) { $join1->on('mensagem_destinatarios.mensagem_id', '=', 'mensagems.id');})
            ->where(function ($query) use ($user_session) { $query->where('mensagem_destinatarios.destinatario_id', $user_session->id);})->where(DB::raw('mensagem_destinatarios.cs_status'), '=', 'A')->where(DB::raw('mensagem_destinatarios.tipo_destinatario'), '=', 'DH')
            ->orderBy('mensagem_destinatarios.created_at', 'desc')->paginate(20);
            
        return view('mensagems.index', compact('mensagems'));
    }
    
    /**
     * participe a newly external user created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function participe(Request $request)
    {
    	# dados da mensagem
    	$mensagem            		= new Mensagem();
    	$mensagem->assunto     		= 'Campanha de Lançamento';
    	
    	$nome 		= $request->input('nome');
    	$email 		= $request->input('email');
    	$telefone 	= $request->input('telefone');
    	
    	$mensagem->conteudo     	= "<h4>Contato de Interessado:</h4><br><br><ul><li>Nome: $nome</li><li>E-mail: $email</li><li>Telefone: $telefone</li></ul>";

    	if(!$mensagem->save()) {
    		return redirect()->route('provisorio')->with('error', 'A Sua mensagem não foi enviada. Por favor, tente novamente');
    	}
    	
    	$destinatario                      = new MensagemDestinatario();
    	$destinatario->tipo_destinatario   = 'DH';
    	$destinatario->mensagem_id         = $mensagem->id;
    	$destinatario->destinatario_id     = 1;
    	$destinatario->save();
    	
    	$destinatario                      = new MensagemDestinatario();
    	$destinatario->tipo_destinatario   = 'DH';
    	$destinatario->mensagem_id         = $mensagem->id;
    	$destinatario->destinatario_id     = 3;
    	$destinatario->save();
    	
    	
    	$from = 'contato@doutorhoje.com.br';
    	$to = 'theo@comvex.com.br';
    	$subject = 'Contato de Interessado';
    	 
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
                <td width='480' style='text-align:left'><span style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#434342;'>DoutorHoje - Contato de Interessado</span></td>
                <td width='120' style='text-align:right'><a href='#' target='_blank' style='font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#434342;'>Abrir no navegador</a></td>
            </tr>
        </table>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td><img src='https://doutorhoje.com.br/libs/home-template/img/email/h1.png' width='600' height='113' alt=''/></td>
            </tr>
        </table>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td style='background: #1d70b7; font-family:Arial, Helvetica, sans-serif; text-align: center; color: #ffffff; font-size: 28px; line-height: 80px;'><strong>Contato de Interessado</strong></td>
            </tr>
        </table>
        <br>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
                <td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 22px; color: #434342; background-color: #fff; text-align: justify;'>
                    <strong>O Interessado abaixo fez cadastro para a Campanha de Lançamento:</strong>
                    <br>
                    <br>
                    <p><strong>Nome: </strong> $nome</p>
                    <p><strong>E-mail: </strong> $email</p>
                    <p><strong>Telefone: </strong> $telefone</p>
                </td>
                <td width='30' style='background-color: #fff;'>&nbsp;</td>
            </tr>
        </table>
        <br>
        <br>
        <table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
            <tr>
                <td width='220' style='background-color: #fff;'>&nbsp;</td>
                <td width='159' style='text-align: center;'>
                    <img src='https://doutorhoje.com.br/libs/home-template/img/email/devices.png' width='155' height='74' alt=''/>
                </td>
                <td width='221' style='background-color: #fff;'>&nbsp;</td>
            </tr>
        </table>
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
    	 
    	echo "<script>console.log( 'Debug Objects: " . $send_message . "' );</script>";
    	return redirect()->route('provisorio')->with('success', 'A Sua mensagem foi enviada com sucesso!');
    }
}
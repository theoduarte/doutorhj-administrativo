
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
	<title>DoctorHoje</title>
</head>
<body>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr style='background-color:#fff;'>
		<td width='600' style='text-align:left'>&nbsp;</td>
	</tr>
</table>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr style='background-color:#fff;'>
		<td width='600' style='text-align:center'><span style='font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#bbb;'>Doutor Hoje - Agendamento confirmado</span></td>
	</tr>
</table>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='184' style='background-color: #fff;'>&nbsp;</td>
		<td width='233'><img src='{{ Request::root() }}/img/header.png' width='233' height='50' alt=''/></td>
		<td width='183' style='background-color: #fff;'>&nbsp;</td>
	</tr>
</table>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td><img src='{{ Request::root() }}/img/banner-top.png' width='600' height='475' alt=''/></td>
	</tr>
</table>
<br>
<br>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
		<td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 18px; line-height: 18px; color: #000; background-color: #fff; text-align: center;'>
			<strong>Olá,</strong> <strong style='color: #1d70b7;'>{{$nm_primario}}</strong>
		</td>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
	</tr>
</table>
<br>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
		<td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 20px; line-height: 30px; color: #434342; background-color: #fff; text-align: center;'>Muito obrigado por utilizar o Doutor Hoje!</td>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
	</tr>
</table>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
		<td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 30px; color: #434342; background-color: #fff; text-align: center;'><strong>Seu agendamento foi confirmado com sucesso.</strong></td>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
	</tr>
</table>
<br>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
		<td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 24px; line-height: 30px; color: #434342; background-color: #fff; text-align: center;'>Senha de atendimento:</td>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
	</tr>
</table>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='230' style='background-color: #1d70b7;'>&nbsp;</td>
		<td width='140' style='font-family:Arial, Helvetica, sans-serif; font-size: 22px; line-height: 60px; background-color: #1d70b7; text-align: center; color: #fff;'>{{$token_atendimento}}
		</td>
		<td width='230' style='background-color: #1d70b7;'>&nbsp;</td>
	</tr>
</table>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
		<td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22px; color: #434342; background-color: #fff; text-align: center;'>Este código deve ser apresentada na clínica no dia do seu atendimento, juntamente com um documento pessoal com foto.<br>Desejamos que o atendimento atenda as suas expectativas!</td>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
	</tr>
</table>
<br>
<br>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='122'>&nbsp;</td>
		<td width='68'><img src='{{ Request::root() }}/img/cliente.png' width='68' height='65' alt=''/></td>
		<td width='220'>&nbsp;</td>
		<td width='68'><img src='{{ Request::root() }}/img/lista.png' width='68' height='65' alt=''/></td>
		<td width='122'>&nbsp;</td>
	</tr>
</table>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='30'>&nbsp;</td>
		<td width='250' style='font-family:Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22px; color: #434342; background-color: #fff; text-align: center;'>Para quem é: {{$nm_primario}}</td>
		<td width='40'>&nbsp;</td>
		<td width='250' style='font-family:Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22px; color: #434342; background-color: #fff; text-align: center;'>{{$nome_especialidade}} {{$preco_ativo}}</td>
		<td width='30'>&nbsp;</td>
	</tr>
</table>
<br>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='122'>&nbsp;</td>
		<td width='68'><img src='{{ Request::root() }}/img/local.png' width='68' height='65' alt=''/></td>
		<td width='220'>&nbsp;</td>
		<td width='68'><img src='{{ Request::root() }}/img/pagamento.png' width='68' height='65' alt=''/></td>
		<td width='122'>&nbsp;</td>
	</tr>
</table>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='30'>&nbsp;</td>
		<td width='250' style='font-family:Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22px; color: #434342; background-color: #fff; text-align: center;'>Endereço do atendimento: {{$endereco_agendamento}}, {{$nome_profissional}}</td>
		<td width='40'>&nbsp;</td>
		<td width='250' style='font-family:Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22px; color: #434342; background-color: #fff; text-align: center;'>Forma de pagamento {{$tipo_pagamento}}</td>
		<td width='30'>&nbsp;</td>
	</tr>
</table>
<br>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='266'>&nbsp;</td>
		<td width='68'><img src='{{ Request::root() }}/img/calendario.png' width='68' height='65' alt=''/></td>
		<td width='266'>&nbsp;</td>
	</tr>
</table>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='30'>&nbsp;</td>
		<td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22px; color: #434342; background-color: #fff; text-align: center;'>Dia {{$data_agendamento}} às {{$hora_agendamento}}</td>
		<td width='30'>&nbsp;</td>
	</tr>
</table>
<br>
<br>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
		<td width='540' style='font-family:Arial, Helvetica, sans-serif; font-size: 18px; line-height: 18px; color: #1d70b7; background-color: #fff; text-align: center;'><strong>Se tratando de saúde, conte sempre com o Doutor Hoje!</strong></td>
		<td width='30' style='background-color: #fff;'>&nbsp;</td>
	</tr>
</table>
<br>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='120' style='background-color: #1d70b7;'>&nbsp;</td>
		<td width='360' style='font-family:Arial, Helvetica, sans-serif; font-size: 16px; line-height: 46px; background-color: #1d70b7; text-align: center;'><a href='https://doutorhoje.com.br' style='color: #ffffff; text-decoration: none;'>WWW.DOUTORHOJE.COM.BR</a></td>
		<td width='120' style='background-color: #1d70b7;'>&nbsp;</td>
	</tr>
</table>
<br>
<br>
<table width='600' border='0' cellspacing='0' cellpadding='0' align='center'>
	<tr>
		<td width='225'>&nbsp;</td>
		<td width='30'><a href='https://www.instagram.com/doutor_hoje/'><img src='{{ Request::root() }}/img/instagram.png' alt='' width='30' height='31' border='0'/></a></td>
		<td width='30'>&nbsp;</td>
		<td width='30'><img src='{{ Request::root() }}/img/facebook.png' width='30' height='30' alt=''/></td>
		<td width='30'>&nbsp;</td>
		<td width='30'><a href='https://wa.me/5561986792680'><img src='{{ Request::root() }}/img/whatsapp.png' width='30' height='30' alt=''/></a></td>
		<td width='225'>&nbsp;</td>
	</tr>
</table>
<br>
<br>
</body>
</html>
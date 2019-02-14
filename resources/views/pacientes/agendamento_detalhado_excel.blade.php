<html>
    <body>
        <!-- Exams -->
        <table> 
            <tr>
            	<td colspan="5">
            		<h3>Relatório de Agendamentos</h3>
            	</td>
            <tr>
            <tr>
            	<td colspan="5">
            		<h4>Intervalo: {{ucfirst(strftime('%b', strtotime($dateBegin)))}}/{{date('Y', strtotime($dateBegin))}} - {{ucfirst(strftime('%b', strtotime($dateEnd)))}}/{{date('Y', strtotime($dateEnd))}}</h4>
            	</td>
            <tr>         	
        	<tr>
                <td colspan="5">
         			<strong>Data/Hora de emissão:</strong> {{ $cabecalho['Data'] }}
               	</td>
            </tr>          	
        </table>
        
        <table>
        	<tr style="background-color: #eeeeee;">
        		<th>Data da compra</th>
        		<th>Data do Agendamento</th>
        		<th>Nome</th>
        		<th>CPF</th>
        		<th>Plano</th>
        		<th>Empresa</th>
        		<th>Procedimento</th>
        		<th>Prestador</th>
        		<th>Valor Net</th>
        		<th>Valor Com.</th>
        		<th>Over</th>
    		</tr>
    		
    		@for($i = 0; $i < sizeof($list_agendamentos); $i++ )
    		<tr>
    			<td>{{date('d.m.Y', strtotime($list_agendamentos[$i]->dt_pagamento))}}</td>
    			<td>@if(!empty($list_agendamentos[$i]->dt_atendimento) && !is_null($list_agendamentos[$i]->getRawDtAtendimentoAttribute())){{date('d.m.Y', strtotime($list_agendamentos[$i]->getRawDtAtendimentoAttribute()))}}@endif</td>
    			<td>{{$list_agendamentos[$i]->paciente->nm_primario.' '.$list_agendamentos[$i]->paciente->nm_secundario}}</td>
    			<td>@if(sizeof($list_agendamentos[$i]->paciente->documentos) > 0){{$list_agendamentos[$i]->paciente->documentos->first()->te_documento}}@endif</td>
    			<td>{{$list_agendamentos[$i]->nm_plano}}</td>
    			<td>@if(!empty($list_agendamentos[$i]->paciente->empresa) && !is_null($list_agendamentos[$i]->paciente->empresa)){{$list_agendamentos[$i]->paciente->empresa->nome_fantasia}}@else<span>Não Informado</span>@endif</td>
    			<td>@if(!empty($list_agendamentos[$i]->atendimento) && !is_null($list_agendamentos[$i]->atendimento)){{$list_agendamentos[$i]->atendimento->ds_preco}}@endif</td>
    			<td>{{$list_agendamentos[$i]->nm_razao_social}}</td>
    			<td>@if(!is_null($list_agendamentos[$i]->atendimento->precoAtivo)){{$list_agendamentos[$i]->atendimento->precoAtivo->vl_comercial}}@endif</td>
    			<td>@if(!is_null($list_agendamentos[$i]->atendimento->precoAtivo)){{$list_agendamentos[$i]->atendimento->precoAtivo->vl_net}}@endif</td>
    			<td>{{$list_agendamentos[$i]->vl_over}}%</td>
    		</tr>
    		@endfor
        </table>

        <table>
            <tr>
                <td colspan="4">
                    <strong>TOTAL AGENDAMENTOS: {{sizeof($list_agendamentos)}}</strong>
                </td>
            <tr>
        </table>
        
    </body>
</html>
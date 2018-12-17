<html>
    <body>
        <!-- Exams -->
        <table> 
            <tr>
            	<td colspan="5">
            		<h2>Relatório de Agendamentos</h2>
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
    			<th>Ticket</th>
                <th>Prestador</th>
                <th>Tipo Atendimento</th>
                <th>Profissional</th>
                <th>Paciente</th>
                <th>Data Pagamento</th>
                <th>Data Atendimento</th>
                <th>Situação</th>
                <th>Vl. Net</th>
                <th>Vl. Comercial</th>
    		</tr>

    		@foreach( $list_agendamentos as $item_agendamento )
                
				<tr>
					<td class="text-left">{{$item_agendamento->te_ticket}}</td>
                    <td>@if($item_agendamento->clinica->nm_razao_social) {{ $item_agendamento->clinica->nm_razao_social }} @else <span class="text-danger">'Não Informado'</span> @endif</td>
                    <td>@if( !empty($item_agendamento->atendimento->consulta_id) ) CONSULTA @else EXAME @endif</td>
                    <td style="text-align: left !important;">@if( !empty($item_agendamento->atendimento->consulta_id) ) {{ $item_agendamento->atendimento->profissional->nm_primario . ' ' . $item_agendamento->atendimento->profissional->nm_secundario  }} @endif</td>
                    <td style="text-align: left !important;">{{ $item_agendamento->paciente->nm_primario . ' ' . $item_agendamento->paciente->nm_secundario  }}</td>
                    <td>@if(!empty( $item_agendamento->itempedidos->first()->pedido )) {{ $item_agendamento->itempedidos->first()->pedido->dt_pagamento }} @endif</td>
                    <td><span class="@if(empty($item_agendamento->getRawDtAtendimentoAttribute()))  text-danger  @endif">{{ $item_agendamento->dt_atendimento }}</span></td>
                    <td>{{ $item_agendamento->cs_status }}</td>
                    <td>{{ $item_agendamento->vl_net }}</td>
                    <td>{{ $item_agendamento->vl_com }}</td>
				</tr>
                
    		@endforeach
    	</table>


        <table>
            <tr>
                <td colspan="5">
                    <strong>TOTAL ITENS: {{ sizeof($list_agendamentos) }}</strong>
                </td>
            <tr>
        </table>
    </body>
</html>
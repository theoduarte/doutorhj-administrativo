<html>
    <body>
        <!-- Exams -->
        <table> 
            <tr>
            	<td colspan="5">
            		<h2>Relatório de Pacientes Ativos</h2>
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
        		<th colspan="2" rowspan="2">Cadastros</th>
    			@foreach( $list_items as $item_cadastro )
    			<th>{{date('d.m.Y', strtotime($item_cadastro->data))}}</th>
    			@endforeach
    		</tr>
    		
    		<tr>
    			<td colspan="2"></td>
				@foreach( $list_items as $item_cadastro )
    			<td style="background-color: #DDEBF7;">{{$item_cadastro->num_pacientes}}</td>
    			@endforeach
			</tr>
        </table>
					
        <table>
    		<tr style="background-color: #eeeeee;">
    			<th></th>
    			@for($i = 0; $i < sizeof($list_items_por_ano)-1; $i++ )
    			<th>{{str_replace('-01', '', $list_items_por_ano[$i][0]->data)}}</th>
    			@endfor
    			<th>Total</th>
    		</tr>
    		
    		@for($j = 0; $j < sizeof($list_items_por_ano[$i]); $j++ )
    		<tr @if($j == (sizeof($list_items_por_ano[$i])-1)) style="font-weight: bold;" @endif>
    			<td>{{$list_items_por_ano[sizeof($list_items_por_ano)-1][$j]->nome_mes}}</td>
    			@for($i = 0; $i < sizeof($list_items_por_ano)-1; $i++ )
    			<td>{{$list_items_por_ano[$i][$j]->num_pacientes}}</td>
    			@endfor
    			<td>{{$list_items_por_ano[sizeof($list_items_por_ano)-1][$j]->num_pacientes}}</td>
    		</tr>
    		@endfor
    	</table>


        <table>
            <tr>
                <td colspan="4">
                    <strong>TOTAL PACIENTES: {{$list_items_por_ano[sizeof($list_items_por_ano)-1][12]->num_pacientes}}</strong>
                </td>
            <tr>
        </table>
        
        <table>
        	<tr style="background-color: #eeeeee;">
        		<th></th>
        		<th>Cadastros</th>
    		</tr>
    		
    		@php($total = 0);
    		@foreach( $list_num_pacientes_por_empresa as $item_empresa )
    		<tr>
    			<td>{{$item_empresa->nome_fantasia}}</td>
    			<td style="background-color: #DDEBF7;">{{$item_empresa->num_pacientes}}</td>
    			@php($total = $total+$item_empresa->num_pacientes);
			</tr>
			@endforeach
			<tr style="font-weight: bold;">
    			<td>TOTAL</td>
    			<td style="background-color: #DDEBF7;">{{$total}}</td>
			</tr>
        </table>
    </body>
</html>
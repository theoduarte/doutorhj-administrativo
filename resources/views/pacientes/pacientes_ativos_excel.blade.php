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
         			<strong>Data/Hora de emissão:</strong> {{ $cabecalho['Data'] }}
               	</td>
            </tr>          	
        </table>
        
        <table>
    		<tr style="background-color: #eeeeee;">
    			<th>id</th>
                <th>nome</th>
                <th>sobrenome</th>
                <th>genero</th>
                <th>data_nascimento</th>
                <th>tipo_documento</th>
                <th>nr_documento</th>
                <th>email</th>
                <th>celular</th>
                <th>data_criacao_registro</th>
                <th>data_ultimo_acesso</th>
                <th>dependente</th>
                <th>plano</th>
                <th>empresa</th>
    		</tr>

    		@foreach( $list_pacientes as $item_paciente )
                
				<tr>
					<td>{{$item_paciente->id}}</td>
                    <td>{{$item_paciente->nome}}</td>
                    <td>{{$item_paciente->sobrenome}}</td>
                    <td>{{$item_paciente->genero}}</td>
                    <td>{{ date('d/m/Y', strtotime($item_paciente->data_nascimento)) }}</td>
                    <td>{{$item_paciente->tipo_documento}}</td>
                    <td>{{ intval($item_paciente->nr_documento) }}</td>
                    <td>{{$item_paciente->email}}</td>
                    <td>{{$item_paciente->celular}}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($item_paciente->data_criacao_registro)) }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($item_paciente->data_ultimo_acesso)) }}</td>
                    <td>{{$item_paciente->responsavel_id}}</td>
                    <td>{{$item_paciente->nome_plano}}</td>
                    <td>@if(!is_null($item_paciente->nome_fantasia)){{$item_paciente->nome_fantasia}}@else <span style="color: #dc3545;">não informado</span> @endif</td>
				</tr>
                
    		@endforeach
    	</table>


        <table>
            <tr>
                <td colspan="5">
                    <strong>TOTAL ITENS: {{ sizeof($list_pacientes) }}</strong>
                </td>
            <tr>
        </table>
    </body>
</html>
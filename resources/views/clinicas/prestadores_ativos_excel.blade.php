<html>
    <body>
        <!-- Exams -->
        <table> 
            <tr>
            	<td colspan="5">
            		<h2>Relatório de Novos Prestadores</h2>
            	</td>
            <tr>         	
        	<tr>
                <td colspan="5">
         			<strong>Data/Hora de emissão:</strong> {{ $cabecalho['Data'] }}
               	</td>
               	<td colspan="5">
                    <strong>TOTAL ITENS: {{ sizeof($list_prestadores) }}</strong>
                </td>
            </tr>          	
        </table>
        
        <table>
    		<tr style="background-color: #eeeeee;">
    			<th>id</th>
    			<th>razao_social</th>
                <th>nome_fantasia</th>
                <th>cnpj</th>
                <th>responsavel</th>
                <th>uf</th>
                <th>contato</th>
                <th>data_cadastro</th>
    		</tr>

    		@foreach( $list_prestadores as $item_prestador )
                
				<tr>
					<td>{{$item_prestador->id}}</td>
                    <td>{{$item_prestador->nm_razao_social}}</td>
                    <td>{{$item_prestador->nm_fantasia}}</td>
                    <td>{{$item_prestador->documentos->first()->te_documento}}</td>
                    <td>{{$item_prestador->nome_responsavel}}</td>
                    <td>@if(!is_null($item_prestador->enderecos->first()->cidade)) {{$item_prestador->enderecos->first()->cidade->sg_estado}} @endif </td>
                    <td> @if(!is_null($item_prestador->contatos)) {{$item_prestador->contatos->first()->ds_contato}} @endif</td>
                    <td>{{ date('d/m/Y H:i', strtotime($item_prestador->created_at)) }}</td>
				</tr>
                
    		@endforeach
    	</table>

    </body>
</html>
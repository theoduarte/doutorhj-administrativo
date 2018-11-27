<html>
    <body>
        <!-- Exams -->
        <table> 
            <tr>
            	<td colspan="5">
            		<h2>Relatório de Atendimentos - Consultas</h2>
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
                <th>ds_preco</th>
                <th>codigo</th>
                <th>clinica_id</th>
                <th>nm_razao_social</th>
                <th>nm_fantasia</th>
                <th>te_documento</th>
                <th>tp_prestador</th>
                <th>especialidade</th>
                <th>tipo_atendimento</th>
                <th>cep</th>
                <th>te_bairro</th>
                <th>te_endereco</th>
                <th>te_complemento</th>
                <th>nm_cidade</th>
                <th>sg_estado</th>
                <th>profissional_id</th>
                <th>nm_primario</th>
                <th>nm_secundario</th>
                <th>genero</th>
                <th>preco_id</th>
                <th>atendimento_id</th>
                <th>tp_preco_id</th>
                <th>cd_plano</th>
                <th>ds_plano</th>
                <th>data_inicio</th>
                <th>data_fim</th>
                <th>comercial</th>
                <th>net</th>
                <th>premium</th>
                <th>blue</th>
                <th>black</th>
                <th>plus</th>
    		</tr>

    		@foreach( $list_consultas as $item_consulta )
                
				<tr>
					<td>{{$item_consulta->id}}</td>
                    <td>{{$item_consulta->ds_preco}}</td>
                    <td>{{$item_consulta->codigo}}</td>
                    <td>{{$item_consulta->clinica_id}}</td>
                    <td>{{$item_consulta->nm_razao_social}}</td>
                    <td>{{$item_consulta->nm_fantasia}}</td>
                    <td>{{ intval($item_consulta->te_documento) }}</td>
                    <td>{{$item_consulta->tp_prestador}}</td>
                    <td>{{$item_consulta->especialidade}}</td>
                    <td>{{$item_consulta->tipo_atendimento}}</td>
                    <td>{{$item_consulta->cep}}</td>
                    <td>{{$item_consulta->te_bairro}}</td>
                    <td>{{$item_consulta->te_endereco}}</td>
                    <td>{{$item_consulta->te_complemento}}</td>
                    <td>{{$item_consulta->nm_cidade}}</td>
                    <td>{{$item_consulta->sg_estado}}</td>
                    <td>{{$item_consulta->profissional_id}}</td>
                    <td>{{$item_consulta->nm_primario}}</td>
                    <td>{{$item_consulta->nm_secundario}}</td>
                    <td>{{$item_consulta->genero}}</td>
                    <td>{{$item_consulta->precos->first()->id}}</td>
                    <td>{{$item_consulta->id}}</td>
                    <td>{{$item_consulta->precos->first()->tp_preco_id}}</td>
                    <td>{{$item_consulta->precos->first()->plano->cd_plano}}</td>
                    <td>{{$item_consulta->precos->first()->plano->ds_plano}}</td>
                    <td>{{$item_consulta->precos->first()->data_inicio}}</td>
                    <td>{{$item_consulta->precos->first()->data_fim}}</td>
                    <td>{{$item_consulta->precos->first()->vl_comercial}}</td>
                    <td>{{$item_consulta->precos->first()->vl_net}}</td>
                    <td>
                    	@if(!is_null($item_consulta->precos->get(1)))
                    		{{ $item_consulta->precos->get(1)->vl_comercial }}
                    	@endif
                    </td>
                    <td>
                    	@if(!is_null($item_consulta->precos->get(2)))
                    		{{ $item_consulta->precos->get(2)->vl_comercial }}
                    	@endif
                    </td>
                    <td>
                    	@if(!is_null($item_consulta->precos->get(3)))
                    		{{ $item_consulta->precos->get(3)->vl_comercial }}
                    	@endif
                    </td>
                    <td>
                    	@if(!is_null($item_consulta->precos->get(4)))
                    		{{ $item_consulta->precos->get(4)->vl_comercial }}
                    	@endif
                    </td>
				</tr>
                
    		@endforeach
    	</table>


        <table>
            <tr>
                <td colspan="5">
                    <strong>TOTAL ITENS: {{ sizeof($list_consultas) }}</strong>
                </td>
            <tr>
        </table>
    </body>
</html>
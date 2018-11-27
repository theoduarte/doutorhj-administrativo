<html>
    <body>
        <!-- Exams -->
        <table> 
            <tr>
            	<td colspan="5">
            		<h2>Relatório de Atendimentos - Exames</h2>
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
                <th>exames</th>
                <th>ds_atendimento</th>
                <th>codigo</th>
                <th>preco_id</th>
                <th>nm_razao_social</th>
                <th>nm_fantasia</th>
                <th>clinica_id</th>
                <th>cnpj</th>
                <th>tp_prestador</th>
                <th>cep</th>
                <th>te_bairro</th>
                <th>te_endereco</th>
                <th>te_complemento</th>
                <th>nm_cidade</th>
                <th>sg_estado</th>
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

    		@foreach( $list_exames as $item_exame )
                
				<tr>
					<td>{{$item_exame->id}}</td>
                    <td>{{$item_exame->exames}}</td>
                    <td>{{$item_exame->tipo_atendimento}}</td>
                    <td>{{$item_exame->codigo}}</td>
                    <td>
                    	@if(sizeof($item_exame->precos) > 0)
                    		{{$item_exame->precos->first()->tp_preco_id}}
                    	@else
                    		<span style="color: #ef5350;">PREÇO NÃO CADASTRADO</span>
                    	@endif
                    </td>
                    <td>{{$item_exame->nm_razao_social}}</td>
                    <td>{{$item_exame->nm_fantasia}}</td>
                    <td>{{$item_exame->clinica_id}}</td>
                    <td>{{ intval($item_exame->cnpj) }}</td>
                    <td>{{$item_exame->tp_prestador}}</td>
                    <td>{{$item_exame->cep}}</td>
                    <td>{{$item_exame->te_bairro}}</td>
                    <td>{{$item_exame->te_endereco}}</td>
                    <td>{{$item_exame->te_complemento}}</td>
                    <td>{{$item_exame->nm_cidade}}</td>
                    <td>{{$item_exame->sg_estado}}</td>
                    <td>{{$item_exame->id}}</td>
                    <td>@if(sizeof($item_exame->precos) > 0) {{$item_exame->precos->first()->tp_preco_id}} @endif</td>
                    <td>@if(sizeof($item_exame->precos) > 0) {{$item_exame->precos->first()->plano->cd_plano}} @endif</td>
                    <td>@if(sizeof($item_exame->precos) > 0) {{$item_exame->precos->first()->plano->ds_plano}} @endif</td>
                    <td>@if(sizeof($item_exame->precos) > 0) {{$item_exame->precos->first()->data_inicio}} @endif</td>
                    <td>@if(sizeof($item_exame->precos) > 0) {{$item_exame->precos->first()->data_fim}} @endif</td>
                    <td>@if(sizeof($item_exame->precos) > 0) {{$item_exame->precos->first()->vl_comercial}} @endif</td>
                    <td>@if(sizeof($item_exame->precos) > 0) {{$item_exame->precos->first()->vl_net}} @endif</td>
                    <td>
                    	@if(sizeof($item_exame->precos) > 0)
                        	@if(!is_null($item_exame->precos->get(1)))
                        		{{ $item_exame->precos->get(1)->vl_comercial }}
                        	@endif
                        @else
                    		<span style="color: #ef5350;">PREÇO NÃO CADASTRADO</span>
                    	@endif
                    </td>
                    <td>
                    	@if(sizeof($item_exame->precos) > 0)
                        	@if(!is_null($item_exame->precos->get(2)))
                        		{{ $item_exame->precos->get(2)->vl_comercial }}
                        	@endif
                        @else
                    		<span style="color: #ef5350;">PREÇO NÃO CADASTRADO</span>
                    	@endif
                    </td>
                    <td>
                    	@if(sizeof($item_exame->precos) > 0)
                        	@if(!is_null($item_exame->precos->get(3)))
                        		{{ $item_exame->precos->get(3)->vl_comercial }}
                        	@endif
                        @else
                    		<span style="color: #ef5350;">PREÇO NÃO CADASTRADO</span>
                    	@endif
                    </td>
                    <td>
                    	@if(sizeof($item_exame->precos) > 0)
                        	@if(!is_null($item_exame->precos->get(4)))
                        		{{ $item_exame->precos->get(4)->vl_comercial }}
                        	@endif
                        @else
                    		<span style="color: #ef5350;">PREÇO NÃO CADASTRADO</span>
                    	@endif
                    </td>
				</tr>
                
    		@endforeach
    	</table>


        <table>
            <tr>
                <td colspan="5">
                    <strong>TOTAL ITENS: {{ sizeof($list_exames) }}</strong>
                </td>
            <tr>
        </table>
    </body>
</html>
<div class="form-group">
	<div class="row">
		<div class="col-12">
    		<table id="tblPrecosConsultas" name="tblPrecosConsultas" class="table table-striped table-bordered table-doutorhj">
    			<col width="12">
    			<col width="80">
    			<col width="380">
    			<col width="100">
        		<thead>
        			<tr>
    					<th>Id</th>
    					<th>Código</th>
    					<th>Consulta</th>
    					<th>Valor</th>
    				</tr>
        		</thead>
        		<tbody>
    				@if( old('precosConsultas') != null )
        				@foreach( old('precosConsultas') as $id => $arConsulta )
        				<tr>
        					<th>{{$id}}<input type="hidden" name="precosConsultas[{{$id}}][]" value="{{$id}}"></th>
        					<th>{{$arConsulta[1]}}<input type="hidden" name="precosConsultas[{{$id}}][]" value="{{$arConsulta[1]}}"></th>
        					<th>{{$arConsulta[2]}}<input type="hidden" name="precosConsultas[{{$id}}][]" value="{{$arConsulta[2]}}"></th>
        					<th><input type="text" class="form-control mascaraMonetaria" name="precosConsultas[{{$id}}][]" value="{{$arConsulta[3]}}"></th>
        				</tr>
        				@endforeach
    				@else
    					@if( $precoconsultas != null)
            				@foreach( $precoconsultas as $consulta )
                				<tr>
                					<th>{{$consulta->consulta->id}}		     <input type="hidden" name="precosConsultas[{{$consulta->consulta->id}}][]" value="{{$consulta->consulta->id}}"></th>
                					<th>{{$consulta->consulta->cd_consulta}} <input type="hidden" name="precosConsultas[{{$consulta->consulta->id}}][]" value="{{$consulta->consulta->cd_consulta}}"></th>
                					<th>{{$consulta->consulta->ds_consulta}} <input type="hidden" name="precosConsultas[{{$consulta->consulta->id}}][]" value="{{$consulta->ds_preco}}"></th>
                					<th>{{$consulta->vl_atendimento}}</th>
                				</tr>
            				@endforeach    			
        				@endif
        			@endif
    			</tbody>
            </table>
        </div>
	</div>
</div>

<div class="form-group{{ $errors->has('nm_razao_social') ? ' has-error' : '' }}">
	<div class="row">
		<div class="col-12">
    		<table id="tblPrecosProcedimentos" name="tblPrecosProcedimentos" class="table table-striped table-bordered table-doutorhj">
    			<col width="12">
    			<col width="80">
    			<col width="380">
    			<col width="100">
        		<thead>
        			<tr>
    					<th>Id</th>
    					<th>Código</th>
    					<th>Procedimento</th>
    					<th style="width: 150px;">Valor Comercial</th>
    					<th style="width: 150px;">Valor Net</th>
    					<th style="width: 400px;">Profissional</th>
    				</tr>
    			</thead>
    			<tbody>
        			@if( old('precosProcedimentos') != null )
        				@foreach( old('precosProcedimentos') as $id => $arProcedimento )
        				<tr>
        					<th>{{$id}}</th>
        					<th>{{$arProcedimento[1]}}</th>
        					<th>{{$arProcedimento[2]}}</th>
        					<th>{{$arProcedimento[3]}}</th>
        				</tr>
        				@endforeach
    				@else
        				@if( $precoprocedimentos != null)
            				@foreach( $precoprocedimentos as $procedimento )
                				<tr>
                					<td>{{$procedimento->procedimento->id}}</td>
                					<td>{{$procedimento->procedimento->cd_procedimento}}</td>
                					<td>{{$procedimento->procedimento->ds_procedimento}}</td>
                					<td>R$ {{$procedimento->vl_com_atendimento}}</td>
                					<td>R$ {{$procedimento->vl_net_atendimento}}</td>
                					<td>{{ $procedimento->profissional->nm_primario.' '.$procedimento->profissional->nm_secundario.' ('.$procedimento->profissional->documentos()->first()->tp_documento.': '.$procedimento->profissional->documentos->first()->te_documento.')' }}</td>
                				</tr>
            				@endforeach
        				@endif
    				@endif
				</tbody> 
        	</table>
        </div>
	</div>
</div>

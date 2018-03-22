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
    					<th>Valor</th>
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
                					<th>{{$procedimento->procedimento->id}}</th>
                					<th>{{$procedimento->procedimento->cd_procedimento}}</th>
                					<th>{{$procedimento->procedimento->ds_procedimento}}</th>
                					<th>{{$procedimento->vl_atendimento}}</th>
                				</tr>
            				@endforeach
        				@endif
    				@endif
				</tbody> 
        	</table>
        </div>
	</div>
</div>

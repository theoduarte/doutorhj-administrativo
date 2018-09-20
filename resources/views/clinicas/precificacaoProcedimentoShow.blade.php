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
    					<th style="width: 150px;">
							<table class="table">
								<tr>
									<th class="text-nowrap">Plano</th>
									<th class="text-nowrap">Vl. Com.</th>
									<th class="text-nowrap">Vl. NET</th>
									<th class="text-nowrap">Vigência</th>
								</tr>
							</table>
						</th>
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
                					<td>
										<table class="table">
											@foreach($procedimento->precos as $preco)
												<tr>
													<td>{{$preco->plano->ds_plano}}</td>
													<td>{{$preco->vl_comercial}}</td>
													<td>{{$preco->vl_net}}</td>
													<td>{{$preco->data_inicio->format('d/m/Y')}}<br>{{$preco->data_fim->format('d/m/Y')}}</td>
												</tr>
											@endforeach
										</table>
									</td>
                				</tr>
            				@endforeach
        				@endif
    				@endif
				</tbody> 
        	</table>
        </div>
	</div>
</div>

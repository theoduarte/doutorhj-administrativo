<div class="row">
	<div class="col-12">
		<div class="card-box">
			<h4 class="m-t-0 header-title">Corpo Clínico</h4>
			<p class="text-muted m-b-30 font-13">
				Listagem completa
			</p>
			
			<div class="row justify-content-between">
				<div class="col-8">
					<div class="form-group">
						<button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal"><i class="ion-plus-round"></i> Adicionar Profissional</button>
					</div>
				</div>				
				<div class="col-1">
					<div class="form-group text-right m-b-0">
						<a href="{{ route('clinicas.index') }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" title="Limpar Busca"><i class="ion-close"></i> Limpar Busca</a>
					</div>
				</div>
				<div class="col-2">
					<div class="form-group float-right">
						<form action="{{ route('clinicas.index') }}" id="form-search"  method="get">
							<div class="input-group bootstrap-touchspin">
								<input type="text" id="search_term" value="<?php echo isset($_GET['search_term']) ? $_GET['search_term'] : ''; ?>" name="search_term" class="form-control" style="display: block;">
								<span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
								<span class="input-group-btn"><button type="button" class="btn btn-primary bootstrap-touchspin-up" onclick="$('#form-search').submit()"><i class="fa fa-search"></i></button></span>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
				<tr>
					<th>@sortablelink('id')</th>
					<th>@sortablelink('nm_primario', 'Nome')</th>
					<th>@sortablelink('cargo_id', 'Cargo')</th>
					<th>Ações</th>
				</tr>
				@foreach($list_profissionals as $profissional)
			
				<tr>
					<td>{{$profissional->id}}</td>
					<td>{{$profissional->nm_primario}}</td>
					<td>{{$profissional->cargo_id}}</td>
					<td>
						<a href="{{ route('cargos.show', $profissional->id) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
						<a href="{{ route('cargos.edit', $profissional->id) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
						<a href="{{ route('cargos.destroy', $profissional->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o Profissional: {{ $profissional->ds_cargo }}"><i class="ti-trash"></i></a>
					</td>
				</tr>
				@endforeach
			</table>
            <tfoot>
            	<div class="cvx-pagination">
            		<?php /*?>
            		<span class="text-primary">{{ sprintf("%02d", $list_profissionals->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $list_profissionals->count()) }} Registro(s) exibido(s)</span>
            		{!! $list_profissionals->links() !!}
            		*/ ?>
            	</div>
            </tfoot>
       </div>
   </div>
</div>

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Modal Content is Responsive</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Name</label>
                                                                <input type="text" class="form-control" id="field-1" placeholder="John">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Surname</label>
                                                                <input type="text" class="form-control" id="field-2" placeholder="Doe">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Address</label>
                                                                <input type="text" class="form-control" id="field-3" placeholder="Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">City</label>
                                                                <input type="text" class="form-control" id="field-4" placeholder="Boston">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">Country</label>
                                                                <input type="text" class="form-control" id="field-5" placeholder="United States">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Zip</label>
                                                                <input type="text" class="form-control" id="field-6" placeholder="123456">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group no-margin">
                                                                <label for="field-7" class="control-label">Personal Info</label>
                                                                <textarea class="form-control" id="field-7" placeholder="Write something about yourself"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
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
                <h4 class="modal-title">DrHoje: Adicionar Profissional</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nm_primario" class="control-label">Nome</label>
                            <input type="text" id="nm_primario" class="form-control" name="nm_primario" placeholder="Nome">
                            <input type="hidden" id="cs_status" name="cs_status" value="A">
                            <input type="hidden" id="clinica_id" name="clinica_id" value="{{ $prestador->id }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nm_secundario" class="control-label">Sobrenome</label>
                            <input type="text" id="nm_secundario" class="form-control" name="nm_secundario" placeholder="Sobrenome">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cs_sexo" class="control-label">Sexo</label>
                            <select id="cs_sexo" class="form-control" name="cs_sexo">
                            	<option value="M">Masculino</option>
                            	<option value="F">Feminino</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dt_nascimento" class="control-label">Data Nasc.</label>
                            <input type="text" id="dt_nascimento" class="form-control mascaraData" name="dt_nascimento" placeholder="Data Nasc.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tp_profissional" class="control-label">Tipo Profissional</label>
                            <select id="tp_profissional" class="form-control" name="tp_profissional">
                            	<option value="M">Médico</option>
                            	<option value="D">Dentista</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tp_documento" class="control-label">Tipo Documento</label>
                            <select id="tp_documento" class="form-control" name="tp_documento">
                            	<option value="CRM">CRM</option>
                            	<option value="CRO">CRO</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="te_documento" class="control-label">Nr. Documento</label>
                            <input type="text" id="te_documento" class="form-control" name="tp_documento" placeholder="Nr. Documento">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group no-margin">
                            <label for="tp_especialidade" class="control-label">Especialidade</label>
                            <select id="tp_especialidade" class="form-control" name="tp_especialidade">
                            	@foreach($list_especialidades as $id => $titulo)
								<option value="{{ $id }}">{{ $titulo }}</option>
								@endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-save-profissional" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-content-save"></i> Salvar</button>
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="mdi mdi-cancel"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>
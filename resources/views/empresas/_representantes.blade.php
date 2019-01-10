<div class="form-group">
	<div class="row">
		<div class="col-lg-3 pull-right">
			<a class="btn btn-success btn-create" href="{{route('representantes.createModal', $model->id)}}"><i class="fa fa-plus-circle"></i> Novo Representante</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<table id="tblRepresentantes" name="tblRepresentantes" class="table table-striped table-bordered table-doutorhj">
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>CPF</th>
				<th>Telefone</th>
				<th>Data de Nascimento</th>
				<th width="10">Ação</th>
			</tr>
			@foreach($representantes as $representante)
				<tr>
					<td>{{$representante->id}}</td>
					<td>{{$representante->nome}}</td>
					<td>{{$representante->cpf}}</td>
					<td>{{$representante->telefone}}</td>
					<td>{{$representante->dt_nascimento}}</td>
					<td>
						<a class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5 btn-edit" title="Editar Representante" href="{{route('representantes.editModal', $representante->id)}}"><i class="mdi mdi-lead-pencil"></i> Editar</a>
						<a class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete" title="Excluir Representante" href="{{route('representantes.destroy', $representante->id)}}"><i class="ti-trash"></i> Excluir</a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>

@include('includes.modal', [
		'entryName' => 'Representante',
		'modalId' => 'modalRepresentante',
		'close' => true,
		'backdrop' => false,
		'keyboard' => false,
		'size' => 'modal-lg',
	])

@push('scripts')
<script>
	$(function() {
		$('#representantes .btn-create').on('click', function(e) {
			e.preventDefault();
			$('#modalRepresentante .modal-body').html('');
			var url = $(this).attr('href');

			$('#modalRepresentante .modal-body').load(url);
			$('#modalRepresentante').modal('show');
		});

		$('#representantes .btn-edit').on('click', function(e) {
			e.preventDefault();
			$('#modalRepresentante .modal-body').html('');
			var url = $(this).attr('href');

			$('#modalRepresentante .modal-body').load(url);
			$('#modalRepresentante').modal('show');
		});

		$('#representantes .btn-delete').on('click', function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			var mensagem = 'DrHoje';

			swal({
				title: mensagem,
				text: 'O Representante será movido da lista',
				type: 'warning',
				showCancelButton: true,
				confirmButtonClass: 'btn btn-confirm mt-2',
				cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
				confirmButtonText: 'Sim',
				cancelButtonText: 'Cancelar'
			}).then(function () {
				jQuery.ajax({
					type: 'POST',
					url: url,
					data: {
						'_method': 'DELETE',
						'empresa_id': $('#empresa_id').val(),
						'_token': '{!! csrf_token() !!}'
					},
					success: function (result) {
						reloadShowTab();
					},
					error: function (result) {
						$.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
					}
				});

			});
		});

		$('#modalRepresentante').on('hidden.bs.modal', function () {
			reloadShowTab();
		});

		function reloadShowTab() {
//			sessionStorage.setItem("reloading", "true");
			document.location.reload();
		}
	});
</script>
@endpush
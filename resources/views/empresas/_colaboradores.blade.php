@php
	use App\Documento;
	use App\Contato;
@endphp
<div class="form-group">
	<div class="row">
		<div class="col-lg-3 pull-right">
			<a class="btn btn-success btn-create" href="{{route('pacientes.createColaboradorModal', $model->id)}}"><i class="fa fa-plus-circle"></i> Novo Colaborador</a>
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
				<th>Plano</th>
				<th>Anuidade</th>
				<th width="10">Ação</th>
			</tr>
			@foreach($colaboradores as $colaborador)
				<tr>
					<td>{{$colaborador->id}}</td>
					<td>{{$colaborador->nm_primario}} {{$colaborador->nm_secundario}}</td>
					<td>{{$colaborador->documentos()->where('tp_documento', Documento::TP_CPF)->first()->te_documento}}</td>
					<td>{{$colaborador->contatos()->whereIn('tp_contato', [Contato::TP_CEL_PESSOAL, Contato::TP_ADMINISTRATIVO])->first()->ds_contato}}</td>
					<td>{{$colaborador->plano_ativo->ds_plano}}</td>
					<td>{{$colaborador->vigencia_ativa->vl_anuidade}}/{{$colaborador->vigencia_ativa->periodicidade}}</td>
					<td>
						<a class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5 btn-plus" title="Adicionar Dependente" href="{{route('pacientes.editColaboradorModal', $colaborador->id)}}"><i class="mdi mdi-account-multiple-plus"></i> Dependente</a>
						<a class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5 btn-edit" title="Editar Colaborador" href="{{route('pacientes.editColaboradorModal', $colaborador->id)}}"><i class="mdi mdi-lead-pencil"></i> Editar</a>
						<a class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete" title="Excluir Colaborador" href="{{route('pacientes.destroy', $colaborador	->id)}}"><i class="ti-trash"></i> Excluir</a>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
</div>

@include('includes.modal', [
		'entryName' => 'Colaborador',
		'modalId' => 'modalColaborador',
		'close' => true,
		'backdrop' => false,
		'keyboard' => false,
		'size' => 'modal-lg',
	])

@push('scripts')
<script>
	$(function() {
		$('#colaboradores .btn-create').on('click', function(e) {
			e.preventDefault();
			$('#modalColaborador .modal-body').html('');
			var url = $(this).attr('href');

			$('#modalColaborador .modal-body').load(url);
			$('#modalColaborador').modal('show');
		});

		$('#colaboradores .btn-edit').on('click', function(e) {
			e.preventDefault();
			$('#modalColaborador .modal-body').html('');
			var url = $(this).attr('href');

			$('#modalColaborador .modal-body').load(url);
			$('#modalColaborador').modal('show');
		});

		$('#colaboradores .btn-delete').on('click', function(e) {
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

		$('#modalColaborador').on('hidden.bs.modal', function () {
			reloadShowTab();
		});

		function reloadShowTab() {
//			sessionStorage.setItem("reloading", "true");
			document.location.reload();
		}
	});
</script>
@endpush
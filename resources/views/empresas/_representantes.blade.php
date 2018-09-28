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
				<th>Data de Nascimento</th>
				<th width="10">Ação</th>
			</tr>
			@foreach($representantes as $representante)
				<tr>
					<td>{{$representante->id}}</td>
					<td>{{$representante->nome}}</td>
					<td>{{$representante->cpf}}</td>
					<td>{{$representante->dt_nascimento}}</td>
					<td>
						<a onclick="loadDataProcedimento(this, '{{ $atendimento->id }}')" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar Atendimento"><i class="mdi mdi-lead-pencil"></i> Editar</a>
						<a onclick="delLinhaProcedimento(this, '{{ $atendimento->ds_preco }}', '{{ $atendimento->id }}')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir Atendimento"><i class="ti-trash"></i> Excluir</a>
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
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(function() {
		$('.btn-create').on('click', function(e) {
			e.preventDefault();
			$('#modalRepresentante .modal-body').html('');
			var url = $(this).attr('href');

			$('#modalRepresentante .modal-body').load(url);
			$('#modalRepresentante').modal('show');
		});

/*		$('body').on('click', '.btn-show', function(e) {
			e.preventDefault();
			$('#modalEntrgDoc .modal-body').html('');
			var url = $(this).attr('href');

			var urlLoad = "{{route('empresas.create', ['id' => 'idCondicao'])}}";
			urlLoad = urlLoad.replace('idCondicao', getIdUrl(url));

			$('#modalEntrgDoc .modal-body').load(urlLoad);
			$('#modalEntrgDoc').modal('show');
		});

		$('body').on('click', '.btn-create', function(e) {
			e.preventDefault();
			$('#modalEntrgDoc .modal-body').html('');

			var urlLoad = "{{route('empresas.create', ['idRegra' => $model->id])}}";
			$('#modalEntrgDoc .modal-body').load(urlLoad);
			$('#modalEntrgDoc').modal('show');
		});

		$('body').on('click', '.btn-edit', function(e) {
			e.preventDefault();
			$('#modalEntrgDoc .modal-body').html('');
			var url = $(this).attr('href');

			var urlLoad = "{{route('empresas.edit', ['id' => 'idCondicao'])}}";
			urlLoad = urlLoad.replace('idCondicao', getIdUrl(url));

			$('#modalEntrgDoc .modal-body').load(urlLoad);
			$('#modalEntrgDoc').modal('show');
		});*/

		$('#modalRepresentante').on('hidden.bs.modal', function () {
			reloadShowTab();
		});

		function reloadShowTab() {
			sessionStorage.setItem("reloading", "true");
			document.location.reload();
		}

		window.onload = function() {
			var reloading = sessionStorage.getItem("reloading");
			if (reloading) {
				sessionStorage.removeItem("reloading");
				$('#representantes-tab').tab('show');
			}
		}
	});
</script>
@endpush
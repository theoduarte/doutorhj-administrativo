@if($modelPaciente->dependentes->count() > 0)
	@php $dependentes = $modelPaciente->dependentes; @endphp

	<div class="card text-center">
		<div class="card-body">
			<table class="table">
				<tr>
					<th>Nome</th>
					<th>CPF</th>
					<th>Telefone</th>
					<th>Plano</th>
					<th>Anuidade</th>
				</tr>
				@foreach($dependentes as $dep)
					<tr>
						<td>{{$dep->nm_primario.' '.$dep->nm_secundario}}</td>
						<td>{{$dep->documentos()->first()->te_documento ?? ''}}</td>
						<td>{{$dep->contatos()->first()->ds_contato ?? ''}}</td>
						<td>{{$dep->plano_ativo->ds_plano ?? ''}}</td>
						<td>{{$dep->vigencia_ativa->vl_anuidade ?? ''}}/{{$dep->vigencia_ativa->periodicidade ?? ''}}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endif

<br><br>

<form method="post" class="form" action="{{route('pacientes.storeDependente', $model->responsavel_id)}}">
	{!! csrf_field() !!}

	<input type="hidden" name="empresa_id" value="{{$model->empresa_id}}">

	@include('pacientes._formDependente', [
		'modal' => true,
	])

	{{--
	<div class="form-row">
		<div class="form-group col-4">
			<label for="anuidade_id" class="control-label">Plano<span class="text-danger">*</span></label>
			<select id="anuidade_id" class="form-control" name="anuidade_id" required autofocus onchange="changeVlAnuidade(this)">
				<option>Selecione...</option>
				@foreach($anuidades as $anuidade)
					<option value="{{$anuidade->id}}" isento="{{$anuidade->isento}}" anuidadeAno="{{$anuidade->vl_anuidade_ano_db}}" anuidadeMes="{{$anuidade->vl_anuidade_mes_db}}">
						{{$anuidade->plano->ds_plano}}
					</option>
				@endforeach
			</select>
		</div>

		<div class="form-group col-4">
			<label for="pediodicidade" class="control-label">Periodicidade<span class="text-danger">*</span></label>
			<select id="pediodicidade" class="form-control" name="pediodicidade" required autofocus>

			</select>
		</div>
	</div>
	--}}

	<br>
	<div class="float-right">
		<button type="submit" class="btn btn-success"><i class='fa fa-save'></i> Adicionar</button>
	</div>
</form>


<script>
	$(function() {
		$('form').submit(function(e) {
			e.preventDefault();
			var disabled = $('#cs_sexo');
			disabled.prop('disabled', false);

			var form_data = $(this).serialize();
			var action_url = $(this).attr("action");

			$.ajax({
				method: "POST",
				url: action_url,
				data: form_data,
				success: function(data) {
					$("#modalDependente").modal("hide");
				},
				error: function(data) {
					disabled.prop('disabled', true);
					var errors = '<div class="alert alert-danger alert-dismissible fade show"><ul>';

					$('#errors-colaborador').html('');
				 	$.each(data.responseJSON.errors, function(key, value) {
						errors = errors+'<li>'+value+'</li>';
					});
					if(data.responseJSON.message != '' && data.responseJSON.errors == undefined) {
						errors = errors+'<li>'+data.responseJSON.message+'</li>';
					}
					errors = errors + '</ul><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

					$('#errors-colaborador').append(errors);
				}
			});
		});
	});

	function changeVlAnuidade(element)
	{
		var isento = $(element).find(':selected').attr('isento');
		var anuidadeAno = Number($(element).find(':selected').attr('anuidadeAno'));
		var anuidadeMes = Number($(element).find(':selected').attr('anuidadeMes'));

		$('#pediodicidade option').remove();
		if(isento) {
			$('#pediodicidade').append(new Option('Isento', 'isento'));
		} else if(anuidadeAno != 0 && anuidadeMes == 0) {
			$('#pediodicidade').append(new Option('R$ '+anuidadeAno.toLocaleString('pt-BR', { minimumFractionDigits: 2})+'/Ano', 'anual'));
		} else if(anuidadeMes != 0 && anuidadeAno == 0) {
			$('#pediodicidade').append(new Option('R$ '+anuidadeMes.toLocaleString('pt-BR', { minimumFractionDigits: 2})+'/Mes', 'mensal'));
		} else {
			$('#pediodicidade').append(new Option('R$ '+anuidadeAno.toLocaleString('pt-BR', { minimumFractionDigits: 2})+'/Ano', 'anual'));
			$('#pediodicidade').append(new Option('R$ '+anuidadeMes.toLocaleString('pt-BR', { minimumFractionDigits: 2})+'/Mes', 'mensal'));
		}
	}
</script>
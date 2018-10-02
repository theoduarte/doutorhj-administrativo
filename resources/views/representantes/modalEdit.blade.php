<form method="post" class="form" action="{{route('representantes.update', $model->id)}}">
	{!! csrf_field() !!}
	<input type="hidden" name="_method" value="PUT">
	@include('representantes._form', [
		'modal' => true
	])

	<br>
	<div class="float-right">
		<button type="submit" class="btn btn-success"><i class='fa fa-save'></i> Salvar</button>
	</div>
</form>

<script>
	$(function() {
		$('#modalRepresentante').on('shown.bs.modal', function () {
			$('#cpf').trigger('blur');
			$('#cpf').prop('readonly', true);
		});

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
					$("#modalRepresentante").modal("hide");
				},
				error: function(data) {
					disabled.prop('disabled', true);
					var errors = '<div class="alert alert-danger fade show"><span class="close" data-dismiss="alert">×</span><ul>';

					$('#errors-representante').html('');
					$.each(data.responseJSON.errors, function(key, value) {
						errors = errors+'<li>'+value+'</li>';
					});
					if(data.responseJSON.message != '' && data.responseJSON.errors == undefined) {
						errors = errors+'<li>'+data.responseJSON.message+'</li>';
					}
					errors = errors+'</ul></div>';

					$('#errors-representante').append(errors);
				}
			});
		});
	});
</script>
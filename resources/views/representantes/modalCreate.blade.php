<form method="post" class="form" action="{{route('representantes.store')}}">
	{!! csrf_field() !!}
	@include('representantes._form', [
		'modal' => true,
		'perfilusers' => $perfilusers
	])

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
					$("#modalCondCobert").modal("hide");
				},
				error: function(data) {
					disabled.prop('disabled', true);
					var errors = '<div class="alert alert-danger fade show"><span class="close" data-dismiss="alert">×</span><ul>';

					$('#errors-representante').html('');
				 	$.each(data.responseJSON.errors, function(key, value) {
						errors = errors+'<li>'+value+'</li>';
					});
					errors = errors+'</ul></div>';

					$('#errors-representante').append(errors);
				}
			});
		});
	});
</script>
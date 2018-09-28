{!! Form::model($model, ['route' => [$model->routeModel().'update', $model->id], 'method' => 'put', 'class' => 'form', 'files' => true]) !!}
	@include($model->routeModel().'_form', [
		'modal' => true
	])

	<br>
	<div class="float-right">
		{!! Form::button("<i class='fa fa-save'></i> Salvar", ['type' => 'submit', 'class' => 'btn btn-success']) !!}
	</div>
{!! Form::close() !!}

<script>
	$(function() {
		$('form').submit(function(e) {
			e.preventDefault();
			var form_data = $(this).serialize();
			var action_url = $(this).attr("action");

			$.ajax({
				method: "POST",
				url: action_url,
				data: form_data,
				success: function(data) {
					$("#modalVencimento").modal("hide");
				},
				error: function(data) {
					var errors = '<div class="alert alert-danger fade show"><span class="close" data-dismiss="alert">×</span><ul>';

					$('#errors-cond_venc').html('');
				 	$.each(data.responseJSON.errors, function(key, value) {
						errors = errors+'<li>'+value+'</li>';
					});
					errors = errors+'</ul></div>';

					$('#errors-cond_venc').append(errors);
				}
			});
		});
	});
</script>
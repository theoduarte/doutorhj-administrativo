@php
	$modal = !isset($modal) || $modal == false ? false : true;
@endphp

<div id="errors-colaborador">
@if ($errors->any())
	<div class="alert alert-danger alert-dismissible fade show">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
</div>

<div class="form-row">
	<div class="form-group col-md-3">
		<label for="cpf">CPF<span class="text-danger">*</span></label>
		<input type="text" id="cpf" name="cpf" class="form-control maskCpf" value="{{$model->cpf ?? old('cpf')}}" placeholder="CPF" required>
		<i id="cvx-cpf-loading" class="cvx-input-loading cvx-no-loading fa fa-spin fa-circle-o-notch"></i>
	</div>

	<div class="form-group col-md-9">
		<label for="email">Email<span class="text-danger">*</span></label>
		<input type="email" id="email" name="email" class="form-control" value="{{$model->user->email ?? old('email')}}" placeholder="Email" required>
	</div>
</div>

<div class="form-row">
	<div class="form-group col-md-7">
		<label for="nm_primario">Nome<span class="text-danger">*</span></label>
		<input type="text" id="nm_primario" name="nm_primario" class="form-control" value="{{$model->nm_primario ?? old('nm_primario')}}" placeholder="Nome" maxlength="150" required>
	</div>

	<div class="form-group col-md-5">
		<label for="nm_secundario">Sobrenome<span class="text-danger">*</span></label>
		<input type="text" id="nm_secundario" name="nm_secundario" class="form-control" value="{{$model->nm_secundario ?? old('nm_secundario')}}" placeholder="Sobrenome" maxlength="100" required>
	</div>
</div>

<div class="form-row">
	<div class="form-group col-4">
		<label for="cs_sexo" class="control-label">Sexo<span class="text-danger">*</span></label>
		<select id="cs_sexo" class="form-control" name="cs_sexo" required autofocus>
			<option value="M"  {{( $model->cs_sexo ?? old('cs_sexo') == 'M' ) ? 'selected' : ''}} >Masculino</option>
			<option value="F" {{( $model->cs_sexo ?? old('cs_sexo') == 'F' ) ? 'selected' : ''}} >Feminino</option>
		</select>
	</div>

	<div class="form-group col-4">
		<label for="dt_nascimento" class="control-label">Nascimento<span class="text-danger">*</span></label>
		<input type="text" id="dt_nascimento" name="dt_nascimento" class="form-control maskData" value="{{$model->dt_nascimento ?? old('dt_nascimento')}}" required autofocus>
	</div>

	<div class="form-group col-4">
		<label for="telefone" class="control-label">Celular<span class="text-danger">*</span></label>
		<input type="text" id="telefone" class="form-control maskTel" name="telefone" value="{{$model->telefone ?? old('telefone')}}" placeholder="" required autofocus>
	</div>
</div>

{{--<div class="form-row">--}}
	{{--<div class="form-group col-4">--}}
		{{--<label for="perfiluser_id" class="control-label">Perfil do Usuário<span class="text-danger">*</span></label>--}}
		{{--<select id="perfiluser_id" class="form-control" name="perfiluser_id" required autofocus>--}}
			{{--<option></option>--}}
			{{--@foreach($perfilusers as $id=>$perfiluser)--}}
				{{--<option value="{{$id}}" {{($model->perfiluser_id ?? old('perfiluser_id')) == $id ? 'selected' : ''}}>{{$perfiluser}}</option>--}}
			{{--@endforeach--}}
		{{--</select>--}}
	{{--</div>--}}
{{--</div>--}}

<script>
	$(function() {
		$(".maskCpf").inputmask({
			mask: ['999.999.999-99'],
			keepStatic: true
		});

		$(".maskData").inputmask({
			mask: ["99/99/9999"],
			keepStatic: true
		});

		$(".maskTel").inputmask({
			mask: ["(99) 9999-9999", "(99) 99999-9999"],
			keepStatic: true
		});

		$('#cpf').on('blur', function() {
			if($(this).val() != '' && $(this).val() != null && $(this).val().search('_') == -1) {
				$('#cvx-cpf-loading').removeClass('cvx-no-loading');
				var url = "{{route('documentos.get-user-by-cpf', 'cpfReplace')}}";
				url = url.replace('cpfReplace', $(this).val());

				$.ajax({
					method: "GET",
					url: url,
					success: function (data) {
						$('#cvx-cpf-loading').addClass('cvx-no-loading');

						if(data.pessoa != undefined && data.pessoa.email != '') {
							$('#email').val(data.pessoa.email);
							if(data.pessoa.email != data.pessoa.email_corporativo) {
								$('#email').prop('readonly', true);
							} else {
								$('#email').prop('readonly', false);
							}
						} else {
							if(data.pessoa != undefined && data.pessoa.email != '' && data.pessoa.email != data.pessoa.email_corporativo) {
								$('#email').val('').prop('readonly', true);
							} else {
								$('#email').val('').prop('readonly', false);
							}
						}

						if(data.pessoa != undefined && data.pessoa.nm_primario != '') $('#nm_primario').val(data.pessoa.nm_primario).prop('readonly', true);
						else $('#nm_primario').val('').prop('readonly', false);

						if(data.pessoa != undefined && data.pessoa.nm_secundario != '') $('#nm_secundario').val(data.pessoa.nm_secundario).prop('readonly', true);
						else $('#nm_secundario').val('').prop('readonly', false);

						if(data.pessoa != undefined && data.pessoa.cs_sexo != '') $('#cs_sexo').val(data.pessoa.cs_sexo).prop('disabled', true);
						else $('#cs_sexo').val('').prop('disabled', false);

						if(data.pessoa != undefined && data.pessoa.dt_nascimento != '') $('#dt_nascimento').val(data.pessoa.dt_nascimento).prop('readonly', true);
						else $('#dt_nascimento').val('').prop('readonly', false);

						if(data.pessoa != undefined && data.pessoa.telefone != '') $('#telefone').val(data.pessoa.telefone).prop('readonly', true);
						else $('#telefone').val('').prop('readonly', false);
					},
					error: function (data) {
						$('#cvx-cpf-loading').addClass('cvx-no-loading');
						var errors = '<div class="alert alert-danger alert-dismissible fade show"><ul>';

						$('#errors-colaborador').html('');
						$.each(data.responseJSON.errors, function (key, value) {
							errors = errors + '<li>' + value + '</li>';
						});
						errors = errors + '</ul><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

						$('#errors-colaborador').append(errors);
					}
				});
			}
		});
	});
</script>

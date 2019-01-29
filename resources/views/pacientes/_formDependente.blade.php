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
	<div class="form-group col-md-4">
		<label for="nm_primario">Nome<span class="text-danger">*</span></label>
		<input type="text" id="nm_primario" name="nm_primario" class="form-control" value="{{$model->nm_primario ?? old('nm_primario')}}" placeholder="Nome" maxlength="150" required>
	</div>

	<div class="form-group col-md-4">
		<label for="nm_secundario">Sobrenome<span class="text-danger">*</span></label>
		<input type="text" id="nm_secundario" name="nm_secundario" class="form-control" value="{{$model->nm_secundario ?? old('nm_secundario')}}" placeholder="Sobrenome" maxlength="100" required>
	</div>

	<div class="form-group col-md-4">
		<label for="parentesco" class="control-label">Parentesco<span class="text-danger">*</span></label>
		<select id="parentesco" class="form-control" name="parentesco" required autofocus>
			<option value="">Selecione</option>
			<option value="avo">Avô/Avó</option>
			<option value="conjuge">Cônjuge/Companheiro</option>
			<option value="enteado">Enteado(a)</option>
			<option value="filho">Filho(a)</option>
			<option value="irmao">Irmã(ão)</option>
			<option value="mae">Mãe</option>
			<option value="pai">Pai</option>
			<option value="outros">Outros</option>
		</select>
	</div>
</div>

<div class="form-row">
	<div class="form-group col-2">
		<label for="cs_sexo" class="control-label">Sexo<span class="text-danger">*</span></label>
		<select id="cs_sexo" class="form-control" name="cs_sexo" required autofocus>
			<option value="M"  {{( $model->cs_sexo ?? old('cs_sexo') == 'M' ) ? 'selected' : ''}} >Masculino</option>
			<option value="F" {{( $model->cs_sexo ?? old('cs_sexo') == 'F' ) ? 'selected' : ''}} >Feminino</option>
		</select>
	</div>

	<div class="form-group col-md-4">
		<label for="email">Email<span class="text-danger">*</span></label>
		<input type="email" id="email" name="email" class="form-control" value="{{$model->user->email ?? old('email')}}" placeholder="Email" required>
	</div>

	<div class="form-group col-md-3">
		<label for="tp_documento_dependente" class="control-label">Tipo Documento<span class="text-danger">*</span></label>
		<select id="tp_documento_dependente" class="form-control" name="tp_documento" required>
			<option value=""></option>
			<option value="RG">RG</option>
			<option value="CPF">CPF</option>
			<option value="CNASC">Certi. Nasc.</option>
			<option value="CTPS">Cart. Trabalho</option>
		</select>
	</div>

	<div class="form-group col-md-3">
		<label for="te_documento_dependente" class="control-label">Nr. Documento<span class="text-danger">*</span></label>
		<input type="text" id="te_documento_dependente" class="form-control" name="te_documento" placeholder="Nr. Documento">
	</div>
</div>

<div class="form-row">
	<div class="form-group col-2">
		<label for="dt_nascimento" class="control-label">Nascimento<span class="text-danger">*</span></label>
		<input type="text" id="dt_nascimento" name="dt_nascimento" class="form-control maskData" value="{{$model->dt_nascimento ?? old('dt_nascimento')}}" required autofocus>
	</div>

	<div class="form-group col-3">
		<label for="telefone" class="control-label">Celular<span class="text-danger">*</span></label>
		<input type="text" id="telefone" class="form-control maskTel" name="telefone" value="{{$model->telefone ?? old('telefone')}}" placeholder="" required autofocus>
	</div>
</div>

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
	});
</script>

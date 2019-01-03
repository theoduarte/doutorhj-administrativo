<div class="form-row">
	<div class="form-group col-md-4">
		<label for="cnpj">CNPJ<span class="text-danger">*</span></label>
		<input type="text" id="cnpj" class="form-control mascaraCNPJ" name="cnpj" placeholder="CNPJ" required value="{{$model->cnpj ?? old('cnpj')}}">
	</div>

	<div class="form-group col-md-4">
		<label for="inscricao_estadual">Inscrição Estadual<span class="text-danger">*</span></label>
		<input type="text" id="inscricao_estadual" class="form-control" name="inscricao_estadual" placeholder="Inscrição Estadual" required maxlength="20" value="{{$model->inscricao_estadual ?? old('inscricao_estadual')}}">
	</div>

	<div class="form-group col-md-4">
		<label for="tp_empresa_id">Tipo de Empresa<span class="text-danger">*</span></label>
		<select id="tp_empresa_id" name="tp_empresa_id" class="form-control select2" required data-placeholder="Selecione...">
			<option></option>
			@foreach($tipoEmpresas as $id=>$tipoEmpresa)
				<option value="{{$id}}" @if (($model->tp_empresa_id ?? old('tp_empresa_id')) == $id) selected="selected"  @endif>{{$tipoEmpresa}}</option>
			@endforeach
		</select>
	</div>
</div>

<div class="form-row">
	<div class="form-group col-md-4">
		<label for="razao_social">Razão Social<span class="text-danger">*</span></label>
		<input type="text" id="razao_social" class="form-control" name="razao_social" placeholder="Razão Social" maxlength="250" required value="{{$model->razao_social ?? old("razao_social")}}">
	</div>

	<div class="form-group col-md-4">
		<label for="nome_fantasia">Nome Fantasia<span class="text-danger">*</span></label>
		<input type="text" id="nome_fantasia" class="form-control" name="nome_fantasia" placeholder="Nome Fantasia" maxlength="250" required value="{{$model->nome_fantasia ?? old('nome_fantasia')}}">
	</div>

	<div class="form-group col-md-4">
		<label for="logomarca">Logomarca<span class="text-danger">*</span></label>
		<input type="file" id="logomarca" class="form-control" name="logomarca" value="{{$model->logomarca ?? old('logomarca')}}">
	</div>
</div>

<h4 class="header-title m-t-0 m-b-30" style="padding-top: 30px;">Endereço</h4>
<div class="form-row">
	<div class="col-sm-12 col-md-2">
		<label for="nr_cep" class="control-label">CEP<span class="text-danger">*</span></label>
		<input id="nr_cep" type="text" class="form-control mascaraCEP consultaCep" name="nr_cep" value="{{ $model->endereco->nr_cep ?? old('nr_cep') }}" required  maxlength="10">
	</div>

	<div class="col-sm-12 col-md-6">
		<div class="form-group{{ $errors->has('te_endereco') ? ' has-error' : '' }}">
			<label for="te_endereco" class="control-label">Endereço<span class="text-danger">*</span></label>
			<input id="te_endereco" type="text" class="form-control" name="te_endereco" value="{{ $model->endereco->te_endereco ?? old('te_endereco') }}" required  maxlength="200">
			<i id="cvx-input-loading" class="cvx-input-loading cvx-no-loading fa fa-spin fa-circle-o-notch"></i>
		</div>
	</div>
	<div class="col-sm-3 col-md-1">
		<div class="form-group{{ $errors->has('nr_logradouro') ? ' has-error' : '' }}">
			<label for="nr_logradouro" class="control-label">Número<span class="text-danger">*</span></label>
			<input id="nr_logradouro" type="text" class="form-control" name="nr_logradouro" value="{{ $model->endereco->nr_logradouro ?? old('nr_logradouro') }}" required  maxlength="50">
		</div>
	</div>

	<div class="col-sm-9 col-md-3">
		<div class="form-group{{ $errors->has('sg_logradouro') ? ' has-error' : '' }}">
			<label for="sg_logradouro" class="control-label">Tipo Logradouro<span class="text-danger">*</span></label>
			<select id="sg_logradouro" name="sg_logradouro" class="form-control">
				<option value="" selected="selected"></option>
				<option value="Aeroporto" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro'))  == 'Aeroporto') selected="selected" @endif>Aeroporto</option>
				<option value="Alameda" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Alameda') selected="selected" @endif>Alameda</option>
				<option value="Área" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Área') selected="selected" @endif>Área</option>
				<option value="Avenida" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Avenida') selected="selected" @endif>Avenida</option>
				<option value="Campo" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Campo') selected="selected" @endif>Campo</option>
				<option value="Chácara" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Chácara') selected="selected" @endif>Chácara</option>
				<option value="Colônia" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Colônia') selected="selected" @endif>Colônia</option>
				<option value="Condomínio" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Condomínio') selected="selected" @endif>Condomínio</option>
				<option value="Conjunto" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Conjunto') selected="selected" @endif>Conjunto</option>
				<option value="Distrito" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Distrito') selected="selected" @endif>Distrito</option>
				<option value="Esplanada" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Esplanada') selected="selected" @endif>Esplanada</option>
				<option value="Estação" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Estação') selected="selected" @endif>Estação</option>
				<option value="Estrada" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Estrada') selected="selected" @endif>Estrada</option>
				<option value="Favela" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Favela') selected="selected" @endif>Favela</option>
				<option value="Feira" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Feira') selected="selected" @endif>Feira</option>
				<option value="Jardim" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Jardim') selected="selected" @endif>Jardim</option>
				<option value="Ladeira" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Ladeira') selected="selected" @endif>Ladeira</option>
				<option value="Lago" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Lago') selected="selected" @endif>Lago</option>
				<option value="Lagoa" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Lagoa') selected="selected" @endif>Lagoa</option>
				<option value="Largo" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Aeroporto') selected="selected" @endif>Largo</option>
				<option value="Loteamento" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Loteamento') selected="selected" @endif>Loteamento</option>
				<option value="Morro" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Morro') selected="selected" @endif>Morro</option>
				<option value="Núcleo" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Núcleo') selected="selected" @endif>Núcleo</option>
				<option value="Parque" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Parque') selected="selected" @endif>Parque</option>
				<option value="Passarela" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Passarela') selected="selected" @endif>Passarela</option>
				<option value="Pátio" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Pátio') selected="selected" @endif>Pátio</option>
				<option value="Praça" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Praça') selected="selected" @endif>Praça</option>
				<option value="Quadra" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Quadra') selected="selected" @endif>Quadra</option>
				<option value="Recanto" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Recanto') selected="selected" @endif>Recanto</option>
				<option value="Residencial" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Residencial') selected="selected" @endif>Residencial</option>
				<option value="Rodovia" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Rodovia') selected="selected" @endif>Rodovia</option>
				<option value="Rua" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Rua') selected="selected" @endif>Rua</option>
				<option value="Setor" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Setor') selected="selected" @endif>Setor</option>
				<option value="Sítio" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Sítio') selected="selected" @endif>Sítio</option>
				<option value="Travessa" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Travessa') selected="selected" @endif>Travessa</option>
				<option value="Trecho" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Trecho') selected="selected" @endif>Trecho</option>
				<option value="Trevo" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Trevo') selected="selected" @endif>Trevo</option>
				<option value="Vale" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Vale') selected="selected" @endif>Vale</option>
				<option value="Vereda" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Vereda') selected="selected" @endif>Vereda</option>
				<option value="Via" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Via') selected="selected" @endif>Via</option>
				<option value="Viaduto" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Viaduto') selected="selected" @endif>Viaduto</option>
				<option value="Viela" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Viela') selected="selected" @endif>Viela</option>
				<option value="Vila" @if (($model->endereco->sg_logradouro ?? old('sg_logradouro')) == 'Vila') selected="selected" @endif>Vila</option>
			</select>
		</div>
	</div>

	<div class="col-sm-12 col-md-4">
		<div class="form-group{{ $errors->has('te_bairro') ? ' has-error' : '' }}">
			<label for="te_bairro" class="control-label">Bairro<span class="text-danger">*</span></label>
			<input id="te_bairro" type="text" class="form-control" name="te_bairro" value="{{ $model->endereco->te_bairro ?? old('te_bairro') }}" required  maxlength="50">
		</div>
	</div>

	<div class="col-sm-12 col-md-4">
		<div class="form-group{{ $errors->has('te_complemento') ? ' has-error' : '' }}">
			<label for="te_complemento" class="control-label">Complemento</label>
			<textarea rows="1" cols="10" id="te_complemento" class="form-control" name="te_complemento"  maxlength="1000">{{ $model->endereco->te_complemento ?? old('te_complemento') }}</textarea>
		</div>
	</div>

	<div class="col-sm-12 col-md-2">
		<div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
			<label for="sg_estado" class="control-label">Estado<span class="text-danger">*</span></label>
			<select id="sg_estado" name="sg_estado" class="form-control">
				<option></option>
				@foreach ($estados as $uf)
				<option value="{{ $uf->sg_estado }}" @if (($model->endereco->cidade->sg_estado ?? old('sg_estado')) == $uf->sg_estado) selected="selected" @endif >{{ $uf->ds_estado }}</option>
				@endforeach
			</select>
		</div>
	</div>

	<div class="col-sm-12 col-md-2">
		<div class="form-group{{ $errors->has('nm_cidade') ? ' has-error' : '' }}">
			<label for="nm_cidade" class="control-label">Cidade<span class="text-danger">*</span></label>
			<input id="nm_cidade" type="text" class="form-control" name="nm_cidade" value="{{ $model->endereco->cidade->nm_cidade ?? old("nm_cidade") }}" required  maxlength="50">
			<input id="cd_cidade_ibge" type="hidden" name="cd_cidade_ibge" value="{{ $model->endereco->cidade->cd_ibge ?? old('cd_cidade_ibge') }}" >
		</div>
	</div>
</div>

<h4 class="header-title m-t-0 m-b-30" style="padding-top: 30px;">Contatos</h4>
<div class="form-row">
	<div class="col-md-2 form-group{{ $errors->has('contato_financeiro') ? ' has-error' : '' }}">
		<label for="contato_financeiro" class="control-label">Contato Financeiro<span class="text-danger">*</span></label>
		<input type="text" id="contato_financeiro" placeholder="" class="form-control mascaraTelefone" name="contato_financeiro" required autofocus value="{{ $model->contatos->where('tp_contato', 'CA')->first()->ds_contato ?? old('contato_financeiro') }}">
	</div>

	<div class="col-md-2 form-group{{ $errors->has('contato_administrativo') ? ' has-error' : '' }}">
		<label for="contato_administrativo" class="control-label">Contato Administrativo<span class="text-danger">*</span></label>
		<input type="text" id="contato_administrativo" placeholder="" class="form-control mascaraTelefone" name="contato_administrativo" required autofocus value="{{ $model->contatos->where('tp_contato', 'CA')->first()->ds_contato ?? old('contato_administrativo')}}">
	</div>
</div>

<h4 class="header-title m-t-0 m-b-30" style="padding-top: 30px;">Dados Financeiros</h4>
<div class="form-row">
	<div class="col-md-3 form-group{{ $errors->has('desconto') ? ' has-error' : '' }}">
		<label for="desconto" class="control-label">Desconto na Tabela</label>
		<input type="text" id="desconto" placeholder="" class="form-control mascaraMonetaria" name="desconto" maxlength="15" value="{{$model->desconto ?? old('desconto')}}">
	</div>

	<div class="col-md-3 form-group{{ $errors->has('vl_max_empresa') ? ' has-error' : '' }}">
		<label for="vl_max_empresa" class="control-label">Limite da Empresa<span class="text-danger">*</span></label>
		<input type="text" id="vl_max_empresa" placeholder="" class="form-control mascaraMonetariaZero" name="vl_max_empresa" maxlength="15" value="{{ $model->vl_max_empresa ?? old('vl_max_empresa') }}">
	</div>

	<div class="col-md-3 form-group{{ $errors->has('vl_max_funcionario') ? ' has-error' : '' }}">
		<label for="vl_max_funcionario" class="control-label">Limite por Funcionário<span class="text-danger">*</span></label>
		<input type="text" id="vl_max_funcionario" placeholder="" class="form-control mascaraMonetariaZero" name="vl_max_funcionario" maxlength="15" value="{{ $model->vl_max_funcionario ?? old('vl_max_funcionario') }}">
	</div>
</div>

<div class="form-row" style="padding-top: 30px;">
	<div class="col-md-12">
		<div class="form-group text-right m-b-0">
			<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
			<a href="{{ route('empresas.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
		</div>
	</div>
</div>
@extends('layouts.master')

@section('title', 'DoutorHoje: Adicionar Corretor')

@section('container')
<!-- @if($errors->any())
    <div class="col-12 alert alert-danger">
        @foreach ($errors->all() as $error)<div class="col-5">{{ $error }}</div>@endforeach
    </div>
@endif -->
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">DoutorHoje</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('corretors.index') }}">Lista de Corretores</a></li>
					<li class="breadcrumb-item active">Adicionar Corretor</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Corretor</h4>
				
				<form action="{{ route('corretors.store') }}" method="post">
				
					{!! csrf_field() !!}
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-4 {{ $errors->has('nm_primario') ? ' has-error' : '' }}">
								<label for="nm_primario">Nome<span class="text-danger">*</span></label>
								<input type="text" id="nm_primario" class="form-control" name="nm_primario" value="{{ old('nm_primario') }}" required placeholder="Nome" maxlength="50"  >
								@if ($errors->has('nm_primario'))
		                        <span class="help-block text-danger">
		                        	<strong>{{ $errors->first('nm_primario') }}</strong>
		                        </span>
		                        @endif
							</div>
							<div class="col-md-8 {{ $errors->has('nm_secundario') ? ' has-error' : '' }}">
								<label for="nm_secundario">Sobrenome<span class="text-danger">*</span></label>
								<input type="text" id="nm_secundario" class="form-control" name="nm_secundario" value="{{ old('nm_secundario') }}" required placeholder="Sobrenome" maxlength="100"  >
								@if ($errors->has('nm_secundario'))
		                        <span class="help-block text-danger">
		                        	<strong>{{ $errors->first('nm_secundario') }}</strong>
		                        </span>
		                        @endif
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-4 {{ $errors->has('dt_nascimento') ? ' has-error' : '' }}">
								<label for="dt_nascimento">Data de nascimento<span class="text-danger">*</span></label>
								<input type="text" id="dt_nascimento" class="form-control mascaraData" name="dt_nascimento" value="{{ old('dt_nascimento') }}" required placeholder="Data de nascimento"  >
								@if ($errors->has('dt_nascimento'))
		                        <span class="help-block text-danger">
		                        	<strong>{{ $errors->first('dt_nascimento') }}</strong>
		                        </span>
		                        @endif
							</div>
							<div class="col-md-8 {{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email">E-mail<span class="text-danger">*</span></label>
								<input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-mail" maxlength="150"  >
								@if ($errors->has('email'))
		                        <span class="help-block text-danger">
		                        	<strong>{{ $errors->first('email') }}</strong>
		                        </span>
		                        @endif
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-4 {{ ($errors->has('telefone') | $errors->has('contato_id')) ? ' has-error' : '' }}">
								<label for="telefone">Telefone<span class="text-danger">*</span></label>
								<input type="text" id="telefone" class="form-control mascaraTelefone" name="telefone" value="{{ old('telefone') }}" required placeholder="Telefone"  >
								@if ($errors->has('telefone') | $errors->has('contato_id'))
		                        <span class="help-block text-danger">
		                        	<strong>{{ $errors->first('telefone') }}</strong>
		                        </span>
		                        @endif
							</div>
							<div class="col-md-2">
								<label for="tp_documento">Tipo<span class="text-danger">*</span></label>
								<input type="text" id="tp_documento" class="form-control" name="tp_documento" value="CPF" required readonly="readonly" >
							</div>
							<div class="col-md-6 {{ ($errors->has('nm_primario') | $errors->has('documento_id')) ? ' has-error' : '' }}">
								<label for="te_documento">Nr Documento<span class="text-danger">*</span></label>
								<input type="text" id="te_documento" class="form-control mascaraCPF" name="te_documento" value="{{ old('te_documento') }}" required placeholder="Nr Documento"  >
								@if ($errors->has('nm_primario') | $errors->has('documento_id'))
		                        <span class="help-block text-danger">
		                        	<strong>{{ $errors->first('te_documento') }}</strong>
		                        </span>
		                        @endif
							</div>
						</div>
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('corretors.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
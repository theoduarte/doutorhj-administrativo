@extends('layouts.master')

@section('title', 'DoutorHoje: Adicionar Corretor')

@section('container')
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
							<div class="col-md-4">
								<label for="nm_primario">Nome<span class="text-danger">*</span></label>
								<input type="text" id="nm_primario" class="form-control" name="nm_primario" required placeholder="Nome" maxlength="50"  >
							</div>
							<div class="col-md-8">
								<label for="nm_secundario">Sobrenome<span class="text-danger">*</span></label>
								<input type="text" id="nm_secundario" class="form-control" name="nm_secundario" required placeholder="Sobrenome" maxlength="100"  >
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="dt_nascimento">Data de nascimento<span class="text-danger">*</span></label>
								<input type="text" id="dt_nascimento" class="form-control mascaraData" name="dt_nascimento" required placeholder="Data de nascimento"  >
							</div>
							<div class="col-md-8">
								<label for="email">E-mail<span class="text-danger">*</span></label>
								<input type="email" id="email" class="form-control" name="email" required placeholder="E-mail" maxlength="150"  >
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="telefone">Telefone<span class="text-danger">*</span></label>
								<input type="text" id="telefone" class="form-control mascaraTelefone" name="telefone" required placeholder="Telefone"  >
							</div>
							<div class="col-md-2">
								<label for="tipo_doc">Tipo<span class="text-danger">*</span></label>
								<input type="email" id="tipo_doc" class="form-control" name="tipo_doc" required placeholder="E-mail" maxlength="150"  >
							</div>
							<div class="col-md-6">
								<label for="email">Nr Documento<span class="text-danger">*</span></label>
								<input type="email" id="email" class="form-control mascaraCPF" name="email" required placeholder="E-mail" maxlength="150"  >
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
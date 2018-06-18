@extends('layouts.master')

@section('title', 'Doctor HJ: Tipo de Atendimentos')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('tipo_atendimentos.index') }}">Lista de Tipos</a></li>
					<li class="breadcrumb-item active">Adicionar Tipo</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Tipo</h4>
				
				<form action="{{ route('tipo_atendimentos.store') }}" method="post">
				
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="cd_atendimento">Código<span class="text-danger">*</span></label>
						<input type="text" id="cd_atendimento" class="form-control" name="cd_atendimento" placeholder="Código do Tipo de Atendimento" maxlength="3" required  >
					</div>
					
					<div class="form-group">
						<label for="ds_atendimento">Título<span class="text-danger">*</span></label>
						<input type="text" id="ds_atendimento" class="form-control" name="ds_atendimento" placeholder="Título do Grupo" maxlength="150" required  >
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('tipo_atendimentos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
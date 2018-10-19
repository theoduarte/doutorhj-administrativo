@extends('layouts.master')

@section('title', 'Tipo de Logs')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('tipo_logs.index') }}">Lista de Tipo de Logs</a></li>
					<li class="breadcrumb-item active">Adicionar Tipo de Log</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Tipo de Log</h4>
				
				<form action="{{ route('tipo_logs.store') }}" method="post">
				
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="titulo">Descrição<span class="text-danger">*</span></label>
						<input type="text" id="titulo" class="form-control" name="titulo" required placeholder="Descrição do Tipo de Log" maxlength="150" >
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('tipo_logs.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
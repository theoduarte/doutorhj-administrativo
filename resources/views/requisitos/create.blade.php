@extends('layouts.master')

@section('title', 'Especialidades')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('especialidades.index') }}">Lista de Especialidades</a></li>
					<li class="breadcrumb-item active">Adicionar Especialidade</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Especialidade</h4>
				
				<form action="{{ route('especialidades.store') }}" method="post">
				
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="cd_especialidade">Código<span class="text-danger">*</span></label>
						<input type="text" id="cd_especialidade" class="form-control" name="cd_especialidade" required placeholder="Código do Especialidade"  >
					</div>
					
					<div class="form-group">
						<label for="ds_especialidade">Descrição<span class="text-danger">*</span></label>
						<input type="text" id="ds_especialidade" class="form-control" name="ds_especialidade" required placeholder="Descrição do Especialidade" >
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('especialidades.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
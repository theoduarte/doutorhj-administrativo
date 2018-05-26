@extends('layouts.master')

@section('title', 'Cargos')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('cargos.index') }}">Lista de Cargos</a></li>
					<li class="breadcrumb-item active">Editar Cargo</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Editar Cargo</h4>
				<!-- <p class="text-muted font-14 m-b-20">
				Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
				</p> -->
				
				<form action="{{ route('cargos.update', $cargo->id) }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="cs_cargo">Código<span class="text-danger">*</span></label>
						<input type="text" id="cd_cargo" class="form-control" name="cd_cargo" value="{{ $cargo->cd_cargo }}" required placeholder="Código do Cargo"  >
					</div>
					
					<div class="form-group">
						<label for="ds_cargo">Descrição<span class="text-danger">*</span></label>
						<input type="text" id="ds_cargo" class="form-control" name="ds_cargo" value="{{ $cargo->ds_cargo }}" required placeholder="Descrição do Cargo" >
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('cargos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
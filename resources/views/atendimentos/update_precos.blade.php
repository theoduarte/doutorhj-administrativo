@extends('layouts.master')

@section('title', 'DoutorHoje: Atualizar Preços')

@push('scripts')

@endpush

@section('container')
<div class="container-fluid">

	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Atualizar Preços</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Painel Administrativo</li>
				</ol>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12 col-xl-12">
			<div class="widget-simple-chart text-left card-box">
				<h3 class="text-success m-t-10">Atualizar Preços de Consultas</h3>
				<form action="{{ route('atualizar-preco-consultas') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="consultas">Lista de Consultas no formato CSV<span class="text-danger">*</span></label>
						<input type="file" id="consultas" class="form-control" name="consultas" placeholder="Faça o upload dos preços das consultas" required  >
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Enviar...</button>
						<a href="{{ route('atualizar-precos') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-xl-12">
			<div class="widget-simple-chart text-left card-box">
				<h3 class="text-success m-t-10">Atualizar Preços de Procedimentos</h3>
				<form action="{{ route('atualizar-preco-procedimentos') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="procedimentos">Lista de Procedimentos no formato CSV<span class="text-danger">*</span></label>
						<input type="file" id="procedimentos" class="form-control" name="procedimentos" placeholder="Faça o upload dos preços dos procedimentos" required  >
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Enviar...</button>
						<a href="{{ route('atualizar-precos') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- <div class="row">
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('consultas-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-success waves-effect waves-light" ><i class="mdi mdi-file-excel"></i> Gerar Lista de Consultas</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('exames-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-success waves-effect waves-light" ><i class="mdi mdi-file-excel"></i> Gerar Lista de Exames</button>
					</div>
				</form>
			</div>
		</div>
	</div> -->
</div>
@endsection

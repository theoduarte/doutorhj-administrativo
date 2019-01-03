@extends('layouts.master')

@section('title', 'DoutorHoje: Relatórios')

@push('scripts')

@endpush

@section('container')
<div class="container-fluid">

	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Relatórios de Auditoria</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Painel Administrativo</li>
				</ol>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('pacientes-ativos-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-primary btn-lg waves-effect waves-light" ><i class="mdi mdi-cloud-print-outline"></i> Gerar Lista de Pacientes Ativos</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('prestadores-ativos-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-primary btn-lg waves-effect waves-light" ><i class="mdi mdi-stethoscope"></i> Gerar Lista de Prestadores</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('consultas-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-success btn-lg waves-effect waves-light" ><i class="mdi mdi-file-excel"></i> Gerar Lista de Consultas</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="widget-simple-chart text-left card-box">
				<form action="{{ route('exames-xls') }}" method="post" enctype="multipart/form-data">
				
					{!! csrf_field() !!}
					
					<div class="form-group text-center m-b-0">
						<button type="submit" class="btn btn-success btn-lg waves-effect waves-light" ><i class="mdi mdi-file-excel"></i> Gerar Lista de Exames</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

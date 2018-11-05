@extends('layouts.master')

@section('title', 'Titulações de Especialidades Médicas')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('titulacaos.index') }}">Lista de Titulações</a></li>
					<li class="breadcrumb-item active">Detalhes do Titulação</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Titulação</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código:</td>
							<td width="75%">{{ $titulacao->id }}</td>
						</tr>
						<tr>
							<td>Título de especialista em:</td>
							<td>{{ $titulacao->titulo }}</td>
						</tr>
						<tr>
							<td>Tempo de Formação:</td>
							<td>{{ $titulacao->tempo_formacao }}</td>
						</tr>
						<tr>
							<td>AMB:</td>
							<td>{{ $titulacao->amb }}</td>
						</tr>
						<tr>
							<td>CNRM:</td>
							<td>{{ $titulacao->cnrm }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('titulacaos.edit', $titulacao->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('titulacaos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection
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
					<li class="breadcrumb-item active">Detalhes do Especialidade</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Especialidade</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código:</td>
							<td width="75%">{{ $especialidade->cd_especialidade }}</td>
						</tr>
						<tr>
							<td>Descrição:</td>
							<td>{{ $especialidade->ds_especialidade }}</td>
						</tr>
						<tr>
							<td>Titulação:</td>
							<td>@if( $especialidade->titulacao_id != null ) Título de especialista em <strong>{{ $especialidade->titulacao->titulo }}</strong> @else -------- @endif</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('especialidades.edit', $especialidade->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('especialidades.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection
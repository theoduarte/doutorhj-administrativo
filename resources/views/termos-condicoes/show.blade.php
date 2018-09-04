@extends('layouts.master')

@section('title', 'Cargos')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('termos-condicoes.index') }}">Lista de Termos e Condições</a></li>
					<li class="breadcrumb-item active">Detalhes do Termos e Condições</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes dos Termos e Condições</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Data Inicial:</td>
							<td width="75%">{{ $termosCondicoes->dt_inicial }}</td>
						</tr>
						<tr>
							<td width="25%">Data Final:</td>
							<td width="75%">{{ $termosCondicoes->dt_final }}</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="card-box">
				{!! $termosCondicoes->ds_termo !!}
			</div>

			<div class="form-group text-right m-b-0">
				<a href="{{ route('termos-condicoes.edit', $termosCondicoes) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('termos-condicoes.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection
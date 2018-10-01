@extends('layouts.master')

@section('title', 'Doutor HJ: Logradouros')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('logradouros.index') }}">Lista de Logradouros</a></li>
					<li class="breadcrumb-item active">Detalhes do Logradouro</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Logradouro</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código IBGE:</td>
							<td width="75%">{{ $logradouro->cd_ibge }}</td>
						</tr>
						<tr>
							<td>Descrição:</td>
							<td>{{ $logradouro->te_logradouro }}</td>
						</tr>
						<tr>
							<td>CEP:</td>
							<td>{{ $logradouro->nr_cep }}</td>
						</tr>
						<tr>
							<td>Cidade:</td>
							<td>{{ $logradouro->cidade->nm_cidade }}</td>
						</tr>
						<tr>
							<td>UF:</td>
							<td>{{ $logradouro->sg_estado }}</td>
						</tr>
						<tr>
							<td>Tipo de Logradouro:</td>
							<td>{{ $logradouro->tp_logradouro }}</td>
						</tr>
						<tr>
							<td>Nº DDD:</td>
							<td>{{ $logradouro->nr_ddd }}</td>
						</tr>
						<tr>
							<td>Bairro:</td>
							<td>{{ $logradouro->te_bairro }}</td>
						</tr>
						<tr>
							<td>Altitude:</td>
							<td>{{ $logradouro->altitude }}</td>
						</tr>
						<tr>
							<td>Latitude:</td>
							<td>{{ $logradouro->latitude }}</td>
						</tr>
						<tr>
							<td>Longitude:</td>
							<td>{{ $logradouro->longitude }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('logradouros.edit', $logradouro->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('logradouros.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection
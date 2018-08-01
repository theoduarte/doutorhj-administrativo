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
					<li class="breadcrumb-item active">Detalhes do Tipo</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Tipo</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Id:</td>
							<td width="75%">{{ sprintf("%04d", $tipo_atendimento->id) }}</td>
						</tr> 
						<tr>
							<td>Código:</td>
							<td>{{ $tipo_atendimento->cd_atendimento }}</td>
						</tr>
						<tr>
							<td>Título:</td>
							<td>{{ $tipo_atendimento->ds_atendimento }}</td>
						</tr>
						<tr>
							<td>TAG Value:</td>
							<td>{{ $tipo_atendimento->tag_value }}</td>
						</tr>
						<tr>
							<td>Ativo na busca da área pública (landing page)?:</td>
							<td>{{ $tipo_atendimento->getStatusString() }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('tipo_atendimentos.edit', $tipo_atendimento->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('tipo_atendimentos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection
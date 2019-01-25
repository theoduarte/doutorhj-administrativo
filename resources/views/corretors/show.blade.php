@extends('layouts.master')

@section('title', 'DoutorHoje: Exibir Corretor')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">DoutorHoje</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('corretors.index') }}">Lista de Corretores</a></li>
					<li class="breadcrumb-item active">Exibir Corretor</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Corretor</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código:</td>
							<td width="75%">{{sprintf("%04d", $corretor->id)}}</td>
						</tr>
						<tr>
							<td>Nome completo:</td>
							<td>{{ $corretor->nm_primario.' '.$corretor->nm_secundario }}</td>
						</tr>
						<tr>
							<td>Data de Nascimento:</td>
							<td>{{ $corretor->dt_nascimento }}</td>
						</tr>
						<tr>
							<td>E-mail:</td>
							<td>{{ $corretor->email }}</td>
						</tr>
						<tr>
							<td>CPF:</td>
							<td>@if(!empty($corretor->documento)){{ $corretor->documento->te_documento }}@endif</td>
						</tr>
						<tr>
							<td>Contato:</td>
							<td>@if(!empty($corretor->contato)){{ $corretor->contato->ds_contato }}@endif</td>
						</tr>
						
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('corretors.edit', $corretor->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('corretors.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection
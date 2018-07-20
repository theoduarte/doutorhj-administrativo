@extends('layouts.master')

@section('title', 'Doctor HJ: Consultas')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('consultas.index') }}">Lista de Consultas</a></li>
					<li class="breadcrumb-item active">Detalhes da Consulta</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Consulta</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código:</td>
							<td width="75%">{{ $consulta->cd_consulta }}</td>
						</tr>
						<tr>
							<td>Descrição:</td>
							<td>{{ $consulta->ds_consulta }}</td>
						</tr>
						<tr>
							<td>Especialidade:</td>
							<td>@if( $consulta->especialidade != null ) <a href="/especialidades/{{ $consulta->especialidade->id }}" class="btn-link text-primary">{{ $consulta->especialidade->ds_especialidade }} <i class="ion-ios7-search-strong"></i></a> @else <span class="text-danger"> -- NÃO INFORMADA --</span> @endif</td>
						</tr>
						<tr>
							<td>Tipo de Atendimento:</td>
							<td>@if( $consulta->tipoatendimento != null ) <a href="/tipo_atendimentos/{{ $consulta->tipoatendimento->id }}" class="btn-link text-primary">{{ $consulta->tipoatendimento->ds_atendimento }} <i class="ion-ios7-search-strong"></i></a> @else <span class="text-danger"> -- NÃO INFORMADO --</span> @endif</td>
						</tr>
						<tr>
							<td>NOMES POPULARES:</td>
							<td><a onclick="loadTags(this, {{ $consulta->id }}, '{{$consulta->ds_consulta}}', 'consulta')" class="btn btn-icon waves-effect btn-success btn-sm m-b-5" data-toggle="tooltip" data-placement="left" title="Nomes Populares"><i class="ion-wrench"></i> GERENCIAR NOMES POPULARES</a></td>
						</tr>
						<tr>
							<td><i class="mdi mdi-tag-multiple"></i> LISTA DE NOMES POPULARES:</td>
							<td>@if( isset($consulta->tag_populars) && sizeof($consulta->tag_populars) > 0 ) <ul class="list-profissional-especialidade">@foreach($consulta->tag_populars as $tag) <li><i class="mdi mdi-check"></i> {{ $tag->cs_tag }}</li> @endforeach</ul> @else <span class="text-danger"> <i class="mdi mdi-close-circle"></i> NENHUMA TAG SELECIONADA</span>  @endif</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('consultas.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>

@include('includes/tags')

@endsection
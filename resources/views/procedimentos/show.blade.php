@extends('layouts.master')

@section('title', 'Doctor HJ: Procedimentos')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('procedimentos.index') }}">Lista de Procedimentos</a></li>
					<li class="breadcrumb-item active">Detalhes da Procedimentos</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Procedimento</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código:</td>
							<td width="75%">{{ $procedimento->cd_procedimento }}</td>
						</tr>
						<tr>
							<td>Descrição:</td>
							<td>{{ $procedimento->ds_procedimento }}</td>
						</tr>
						<tr>
							<td>Tipo de Atendimento:</td>
							<td>@if( $procedimento->tipoatendimento != null ) <a href="/tipo_atendimentos/{{ $procedimento->tipoatendimento->id }}" class="btn-link text-primary">{{ $procedimento->tipoatendimento->ds_atendimento }} <i class="ion-ios7-search-strong"></i></a> @else <span class="text-danger"> -- NÃO INFORMADO --</span> @endif</td>
						</tr>
						<tr>
							<td>Grupo de Procedimento:</td>
							<td>@if( $procedimento->grupoprocedimento != null ) <a href="/grupoprocedimentos/{{ $procedimento->grupoprocedimento->id }}" class="btn-link text-primary">{{ $procedimento->grupoprocedimento->ds_grupo }} <i class="ion-ios7-search-strong"></i></a> @else <span class="text-danger"> -- NÃO INFORMADO --</span> @endif</td>
						</tr>
						<tr>
							<td>NOMES POPULARES:</td>
							<td><a onclick="loadTags(this, {{ $procedimento->id }}, '{{$procedimento->ds_procedimento}}', 'proced')" class="btn btn-icon waves-effect btn-success btn-sm m-b-5" data-toggle="tooltip" data-placement="left" title="Nomes Populares"><i class="ion-wrench"></i> GERENCIAR NOMES POPULARES</a></td>
						</tr>
						<tr>
							<td><i class="mdi mdi-tag-multiple"></i> LISTA DE NOMES POPULARES:</td>
							<td>@if( isset($procedimento->tag_populars) && sizeof($procedimento->tag_populars) > 0 ) <ul class="list-profissional-especialidade">@foreach($procedimento->tag_populars as $tag) <li><i class="mdi mdi-check"></i> {{ $tag->cs_tag }}</li> @endforeach</ul> @else <span class="text-danger"> <i class="mdi mdi-close-circle"></i> NENHUMA TAG SELECIONADA</span>  @endif</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('procedimentos.edit', $procedimento->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('procedimentos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>

@include('includes/tags')

@endsection
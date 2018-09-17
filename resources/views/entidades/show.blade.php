@extends('layouts.master')

@section('title', 'Doutor HJ: Entidades')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"> <a href="/">Home</a> </li>
					<li class="breadcrumb-item"> <a href="{{ route('entidades.index') }}">Lista de entidades</a> </li>
					<li class="breadcrumb-item active">Detalhes da Entidade</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes da Entidade</h4>

				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código(id):</td>
							<td width="75%">{{ $model->id }}</td>
						</tr>
						<tr>
							<td>Titulo</td>
							<td>{{ $model->titulo }}</td>
						</tr>
						<tr>
							<td>Abreviação</td>
							<td>{{ $model->abreviacao }}</td>
						</tr>
						<tr>
							<td>Criado em:</td>
							<td>{{ $model->created_at }}</td>
						</tr>
							<td>Atualizado em:</td>
							<td>{{ $model->updated_at }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('entidades.edit', $model->id) }}" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('entidades.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection

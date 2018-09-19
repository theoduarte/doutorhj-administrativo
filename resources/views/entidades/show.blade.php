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
					<li class="breadcrumb-item active">Detalhes de '{{ $model->titulo }}'</li>
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
							<td width="25%"><strong>Código(ID):</td>
							<td width="75%">{{ $model->id }}</td>
						</tr>
						<tr>
							<td><strong>Titulo:</strong></td>
							<td>{{ $model->titulo }}</td>
						</tr>
						<tr>
							<td><strong>Abreviação:</strong></td>
							<td>{{ $model->abreviacao }}</td>
						</tr>
						</tr>
						<tr>
							<td><strong>Local:</strong></td>
							<td>{{ $model->img_path }}</td>
						</tr>
						<tr>
							<td><strong>Criado em:</strong></td>
							<td>{{ $model->created_at }}</td>
						</tr>
							<td><strong>Atualizado em:</strong></td>
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

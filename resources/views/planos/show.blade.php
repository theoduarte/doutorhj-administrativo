@extends('layouts.master')

@section('title', 'Planos')

@section('container')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<h4 class="page-title">Doutor HJ</h4>
					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('planos.index') }}">Lista de Planos</a></li>
						<li class="breadcrumb-item active">Detalhes do Plano</li>
					</ol>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card-box">
					<h4 class="header-title m-t-0 m-b-20">Detalhes do Plano</h4>

					<table class="table table-bordered table-striped view-doutorhj">
						<tbody>
						<tr>
							<td width="25%">Código (id):</td>
							<td width="75%">{{ $model->id }}</td>
						</tr>
						<tr>
							<td>Código:</td>
							<td>{{ $model->cd_plano }}</td>
						</tr>
						<tr>
							<td>Descrição:</td>
							<td>{{ $model->ds_plano }}</td>
						</tr>
						<tr>
							<td>Tipo de Plano:</td>
							<td>
								@foreach($model->tipoPlanos as $tipoPlano)
									{{$tipoPlano->descricao}}<br>
								@endforeach
							</td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="form-group text-right m-b-0">
					<a href="{{ route('planos.edit', $model->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
					<a href="{{ route('planos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
				</div>
			</div>
		</div>
	</div>
@endsection
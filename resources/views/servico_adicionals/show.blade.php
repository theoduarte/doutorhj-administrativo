@extends('layouts.master')

@section('title', 'Doutor HJ: Serviços Adicionais')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('servico_adicionals.index') }}">Lista de Serviços</a></li>
					<li class="breadcrumb-item active">Detalhes do Serviço</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Serviço</h4>

				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%"><strong>Código(ID):</strong></td>
							<td width="75%">{{ $servico_adicionals->id }}</td>
						</tr>
						<tr>
							<td><strong>Título:</strong></td>
							<td>{{ $servico_adicionals->titulo }}</td>
						</tr>
						<tr>
							<td><strong>Descrição:</strong></td>
							<td>{{ $servico_adicionals->ds_servico }}</td>
						</tr>
						<tr>
							<td><strong>Status:</strong></td>
							<td>@if($servico_adicionals->cs_status == 'A') <span class="text-success"><strong><i class="ion-checkmark-circled"></i> Ativo</strong></span> @else <span class="text-danger"><strong><i class="ion-close-circled"></i> Inativo</strong></span> @endif</td>
						</tr>
						<tr>
							<td><strong>ID do Plano:</strong></td>
							<td>{{ $servico_adicionals->plano->ds_plano }}</td>
						</tr>
						<tr>
							<td><strong>Criado em:</strong></td>
							<td>{{ $servico_adicionals->created_at }}</td>
						</tr>
							<td><strong>Atualizado em:</strong></td>
							<td>{{ $servico_adicionals->updated_at }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('servico_adicionals.edit', $servico_adicionals->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('servico_adicionals.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection

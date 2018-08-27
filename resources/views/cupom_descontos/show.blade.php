@extends('layouts.master')

@section('title', 'Doutor HJ: Cupons de Desconto')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('cupom_descontos.index') }}">Lista de Cupons</a></li>
					<li class="breadcrumb-item active">Detalhes do Cupom</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Cupom</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código:</td>
							<td width="75%"><em><strong>{{ $cupom_desconto->codigo }}</strong></em></td>
						</tr>
						<tr>
							<td>Título:</td>
							<td>{{ $cupom_desconto->titulo }}</td>
						</tr>
						<tr>
							<td>Descrição:</td>
							<td>{{ $cupom_desconto->descricao }}</td>
						</tr>
						<tr>
							<td>Percentual de desconto:</td>
							<td>{{ $cupom_desconto->percentual }}%</td>
						</tr>
						<tr>
							<td>Vigência:</td>
							<td>De <strong>{{ date('d.m.Y H:i', strtotime($cupom_desconto->dt_inicio)) }}</strong>   até   <strong>{{ date('d.m.Y H:i', strtotime($cupom_desconto->dt_fim)) }}</strong></td>
						</tr>
						<tr>
							<td>Sexo:</td>
							<td>@if($cupom_desconto->cs_sexo == 'M') Masc. @elseif($cupom_desconto->cs_sexo == 'F') Fem. @else TODOS @endif</td>
						</tr>
						<tr>
							<td>Dt. Nasc limite:</td>
							<td>Os nascidos até <strong>{{ date('d.m.Y H:i', strtotime($cupom_desconto->dt_nascimento)) }}</strong></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('cupom_descontos.edit', $cupom_desconto->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('cupom_descontos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection
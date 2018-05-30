@extends('layouts.master')

@section('title', 'Menus')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('menus.index') }}">Lista de Menus</a></li>
					<li class="breadcrumb-item active">Detalhes do Menu</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Menu</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código (id):</td>
							<td width="75%">{{ $menu->id }}</td>
						</tr>
						<tr>
							<td>Título:</td>
							<td>{{ $menu->titulo }}</td>
						</tr>
						<tr>
							<td>Ícone:</td>
							<td><i class="{{ $menu->ic_menu_class }}"></i></td>
						</tr>
						<tr>
							<td>Descrição:</td>
							<td>{{ $menu->descricao }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('menus.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection
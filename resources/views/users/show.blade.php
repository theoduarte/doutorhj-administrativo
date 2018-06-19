@extends('layouts.master')

@section('title', 'Doctor HJ: Usuário')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuários</a></li>
					<li class="breadcrumb-item active">Detalhes do Item</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="header-title m-t-0 m-b-20">Detalhes do Usuário</h4>
				
				<table class="table table-bordered table-striped view-doutorhj">
					<tbody>
						<tr>
							<td width="25%">Código (id):</td>
							<td width="75%">{{ $usuario->id }}</td>
						</tr>
						<tr>
							<td>Nome Completo:</td>
							<td>{{ $usuario->name }}</td>
						</tr>
						<tr>
							<td>E-mail:</td>
							<td>{{ $usuario->email }}</td>
						</tr>
						<tr>
							<td>Avatar:</td>
							<td><img class="card-img-top img-fluid" src="@if($usuario->avatar != 'users/default.png' & $usuario->avatar != '')/files/users/{{$usuario->id}}/thumb/{{ str_replace(public_path('files/users/'.$usuario->id).'/', '', $usuario->avatar) }} @else /files/users/default.png @endif" alt="Imagem/Avatar" style="width: 128px"></td>
						</tr>
						<tr>
							<td>Tipo de Usuário:</td>
							<td>
							@if(trim($usuario->tp_user) == 'ADM')
							<strong><em>Administrador</em></strong>
							@elseif(trim($usuario->tp_user) == 'O')
							<strong><em>Operador</em></strong>
							@elseif(trim($usuario->tp_user) == 'PAC')
							<strong><em>Paciente</em></strong>
							@elseif(trim($usuario->tp_user) == 'CLI')
							<strong><em>Responsável Clínica</em></strong>
							@endif
							</td>
						</tr>
						<tr>
							<td>Perfil de Usuário:</td>
							<td>@if($usuario->perfiluser != null) <strong><em>{{ $usuario->perfiluser->titulo }}</em></strong> @else <span class="text-danger"> -- Não Informado -- </span> @endif</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('users.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection
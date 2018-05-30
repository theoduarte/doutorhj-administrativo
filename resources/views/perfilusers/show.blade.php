@extends('layouts.master')

@section('title', 'Perfis de Usuário')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('perfilusers.index') }}">Perfis de Usuário</a></li>
					<li class="breadcrumb-item active">Detalhes do Perfil</li>
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
							<td width="75%">{{ $perfiluser->id }}</td>
						</tr>
						<tr>
							<td>Título:</td>
							<td>{{ $perfiluser->titulo }}</td>
						</tr>
						<tr>
							<td>Descrição:</td>
							<td>{{ $perfiluser->descricao }}</td>
						</tr>
						<tr>
							<td>Tipo de Permissão:</td>
							<td>{{ $list_tipo_permissao[$perfiluser->tipo_permissao] }}</td>
						</tr>
						<tr>
							<td>Lista de Permissões:</td>
							<td>
								<div class="cvx-basic-tree">
									<ul>
										<li>DoutorHj: Entidades
											<ul>
												<li>Cargos
													<ul>
														<li data-jstree='{"type":"file", "type":"has_permission"}'>Listar</li>
														<li data-jstree='{"opened":true, "type":"not_allowed"}'>Adicionar</li>
														<li data-jstree='{"opened":true, "type":"has_permission"}'>Exibir</li>
														<li data-jstree='{"opened":true, "type":"not_allowed"}'>Atualizar</li>
														<li data-jstree='{"opened":true, "type":"not_allowed"}'>Excluir</li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</td>
						</tr>
						<tr>
							<td>Lista de Menus:</td>
							<td>
								<div class="cvx-basic-tree">
									<ul>
										<li>DoutorHj: Menus do Sistema
											<ul>
												<li>Cadastros
													<ul>
														<li data-jstree='{"opened":true, "type":"has_permission"}'>Cargos</li>
													</ul>
												</li>
												<li>Configurações
													<ul>
														<li data-jstree='{"type":"file", "type":"has_permission"}'>Menus</li>
														<li data-jstree='{"opened":true, "type":"has_permission"}'>Itens de Menu</li>
														<li data-jstree='{"opened":true, "type":"not_allowed"}'>Perfils de Usuário</li>
														<li data-jstree='{"opened":true, "type":"not_allowed"}'>Permissões</li>
													</ul>
												</li>
												<li>Auditoria
													<ul>
														<li data-jstree='{"type":"file", "type":"not_allowed"}'>Registro de Logs</li>
														<li data-jstree='{"opened":true, "type":"not_allowed"}'>Tipos de Logs</li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="form-group text-right m-b-0">
				<a href="{{ route('perfilusers.edit', $perfiluser->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
				<a href="{{ route('perfilusers.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
			</div>
		</div>
	</div>
</div>
@endsection
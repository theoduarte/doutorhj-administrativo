@extends('layouts.master')

@section('title', 'Perfis de Usuário')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
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
				<div class="row">
					<div class="col-md-2">
						<h4 class="header-title m-t-0 m-b-20">Detalhes do Menu</h4>
					</div>
					<div class="col-md-2 text-center text-success">
						<span class="ti-check-box"></span> PERMITIDO
					</div>
					<div class="col-md-2 text-center text-danger">
						<span class="ti-na"></span> SEM PERMISSÃO
					</div>
				</div>
				
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
												@foreach($list_permissaos_grouped as $titulo => $grouped)
                                                <li data-jstree='{"type":"tree_node", "opened":true}'>{{ ucfirst($titulo) }}
                                                    <ul>
                                                    	@foreach($grouped as $permissao)
                                                    	@php ($tem_permissao = false)
                                                    	
                                                        <li data-jstree='{"opened":true, @foreach($list_selecionadas_permissaos->permissaos as $pss) @if($permissao["id"] == $pss->id)  <?php $tem_permissao = true; ?> "type":"has_permission"  @endif @endforeach @if(!$tem_permissao) "type":"not_allowed" @endif }'>{{ $permissao["titulo_novo"] }}</li>                                                
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
												<!-- <li>Cargos
													<ul>
														<li data-jstree='{"opened":true, "type":"has_permission"}'>Listar</li>
														<li data-jstree='{"opened":true, "type":"not_allowed"}'>Adicionar</li>
														<li data-jstree='{"opened":true, "type":"has_permission"}'>Exibir</li>
														<li data-jstree='{"opened":true, "type":"not_allowed"}'>Atualizar</li>
														<li data-jstree='{"opened":true, "type":"not_allowed"}'>Excluir</li>
													</ul>
												</li> -->
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
                                                
                                                @foreach($list_selecionados_menus as $grouped)
                                                <li data-jstree='{"type":"tree_node", "opened":false}'>{{ ucfirst($grouped->titulo) }}
                                                    <ul>
                                                    	@foreach($grouped->itemmenus as $itemmenu)
                                                    	
                                                    	
                                                        <li data-jstree='{"opened":true, "type":"has_permission" }'>{{ $itemmenu->titulo }}</li>                                                
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                                
												<!-- <li>Cadastros
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
												</li> -->
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
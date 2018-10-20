@extends('layouts.master')

@section('title', 'Doutor HJ: Registro de Logs')

@section('container')
<div class="container-fluid">
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Cadastros</a></li>
					<li class="breadcrumb-item active">Logs do Sistema</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Registro de Logs</h4>
				<p class="text-muted m-b-30 font-13">
					Logs do Sistema
				</p>
				
				<div class="row justify-content-between">
					<div class="col-8">
						
					</div>				
					<div class="col-1">
						<div class="form-group text-right m-b-0">
							<a href="{{ route('registro_logs.index') }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" title="Limpar Busca"><i class="ion-close"></i> Limpar Busca</a>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group float-right">
							<form action="{{ route('registro_logs.index') }}" id="form-search"  method="get">
								<div class="input-group bootstrap-touchspin">
									<input type="text" id="search_term" value="<?php echo isset($_GET['search_term']) ? $_GET['search_term'] : ''; ?>" name="search_term" class="form-control" style="display: block;">
									<span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
									<span class="input-group-btn"><button type="button" class="btn btn-primary bootstrap-touchspin-up" onclick="$('#form-search').submit()"><i class="fa fa-search"></i></button></span>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
					<tr>
						<th>@sortablelink('id')</th>
						<th>@sortablelink('titulo', 'Código')</th>
						<th>@sortablelink('user_id', 'Usuário')</th>
						<th>@sortablelink('descricao', 'Descrição')</th>
						<th>@sortablelink('created_at', 'Data/hora')</th>
						<th>Ações</th>
					</tr>
					@foreach($registros as $registro)
				
					<tr>
						<td>{{$registro->id}}</td>
						<td>{{$registro->titulo}}</td>
						<td class="text-left">
							<strong class="text-primary">Nome:</strong> <span class="text-danger">{{$registro->user->name}}</span><br>
							<strong class="text-primary">E-mail:</strong> <span class="text-danger">{{$registro->user->email}}</span>
						</td>
						<td>
							<div class="row">
								<div class="col-md-6">
									<label><strong>Registro anterior</strong></label>
									@if(!empty($registro->descricao['reg_anterior']))
									<ul class="text-left">
										@if(!empty($registro->descricao['reg_anterior']['atendimento']))
										<li><strong class="text-primary">Item Atendimento:</strong> <span @if($registro->descricao['reg_anterior']['atendimento']['ds_preco'] != $registro->descricao['reg_novo']['atendimento']['ds_preco']) class="text-danger" @endif>{{ $registro->descricao['reg_anterior']['atendimento']['ds_preco'] }}</span></li>
										<li><strong class="text-primary">Cód. Atendimento:</strong> <span @if($registro->descricao['reg_anterior']['atendimento']['id'] != $registro->descricao['reg_novo']['atendimento']['id']) class="text-danger" @endif>{{ $registro->descricao['reg_anterior']['atendimento']['id'] }}</span></li>
										<hr>
										<li><strong class="text-primary">Cód. Plano:</strong> <span @if($registro->descricao['reg_anterior']['preco']['plano_id'] != $registro->descricao['reg_novo']['preco']['plano_id']) class="text-danger" @endif>{{ $registro->descricao['reg_anterior']['preco']['plano']['ds_plano'] }}</span></li>
										<li><strong class="text-primary">Vl. Comercial:</strong> <span @if($registro->descricao['reg_anterior']['preco']['vl_comercial'] != $registro->descricao['reg_novo']['preco']['vl_comercial']) class="text-danger" @endif>{{ $registro->descricao['reg_anterior']['preco']['vl_comercial'] }}</span></li>
										<li><strong class="text-primary">Vl. Comercial:</strong> <span @if($registro->descricao['reg_anterior']['preco']['vl_net'] != $registro->descricao['reg_novo']['preco']['vl_net']) class="text-danger" @endif>{{ $registro->descricao['reg_anterior']['preco']['vl_net'] }}</span></li>
										<li><strong class="text-primary">Data início:</strong> <span @if($registro->descricao['reg_anterior']['preco']['data_inicio'] != $registro->descricao['reg_novo']['preco']['data_inicio']) class="text-danger" @endif>{{ $registro->descricao['reg_anterior']['preco']['data_inicio'] }}</span></li>
										<li><strong class="text-primary">Data fim:</strong> <span @if($registro->descricao['reg_anterior']['preco']['data_fim'] != $registro->descricao['reg_novo']['preco']['data_fim']) class="text-danger" @endif>{{ $registro->descricao['reg_anterior']['preco']['data_fim'] }}</span></li>
										<hr>
										@endif
										
										@if(!empty($registro->descricao['reg_anterior']['filial']))
										<li><strong class="text-primary">Cód. Filial:</strong> <span>{{ $registro->descricao['reg_anterior']['filial']['id'] }}</span></li>
										<li><strong class="text-primary">Nome fantasia:</strong> <span>{{ $registro->descricao['reg_anterior']['filial']['nm_nome_fantasia'] }}</span></li>
										<li><strong class="text-primary"></strong><a href="{{ route('clinicas.show', $registro->descricao['reg_anterior']['filial']['clinica_id']) }}" title="Exibir"><i class="mdi mdi-eye"></i> Ver Clínica Matriz</a></li>
										<hr>
										@endif
										
										@if(!empty($registro->descricao['reg_anterior']['clinica']))
										<li><strong class="text-primary">Cód. Clínica:</strong> <span>{{ $registro->descricao['reg_anterior']['clinica']['id'] }}</span></li>
										<li><strong class="text-primary">Razão social:</strong> <span>{{ $registro->descricao['reg_anterior']['clinica']['nm_razao_social'] }}</span></li>
										<li><strong class="text-primary">Nome fantasia:</strong> <span>{{ $registro->descricao['reg_anterior']['clinica']['nm_fantasia'] }}</span></li>
										<li><strong class="text-primary">Obs:</strong> <span>{{ $registro->descricao['reg_anterior']['clinica']['obs_procedimento'] }}</span></li>
										<li><strong class="text-primary">Tipo Prestador:</strong> <span>{{ $registro->descricao['reg_anterior']['clinica']['tp_prestador'] }}</span></li>
										<li><strong class="text-primary"></strong><a href="{{ route('users.show', $registro->descricao['reg_anterior']['responsavel']['user_id']) }}" title="Exibir"><i class="mdi mdi-eye"></i> Ver Responsável</a></li>
										<li><strong class="text-primary">Tipo Documento:</strong> <span>{{ $registro->descricao['reg_anterior']['documento']['tp_documento'] }}</span></li>
										<li><strong class="text-primary">Nr. Documento:</strong> <span>{{ $registro->descricao['reg_anterior']['documento']['te_documento'] }}</span></li>
										<li><strong class="text-primary">Tipo Contato:</strong> <span>{{ $registro->descricao['reg_anterior']['contato']['tp_contato'] }}</span></li>
										<li><strong class="text-primary">Nr. Documento:</strong> <span>{{ $registro->descricao['reg_anterior']['contato']['ds_contato'] }}</span></li>
										<hr>
										@endif
										
										@if(!empty($registro->descricao['reg_anterior']['user']))
										<li><strong class="text-primary">Id.:</strong> <span>{{ $registro->descricao['reg_anterior']['user']['id'] }}</span></li>
										<li><strong class="text-primary">Nome de usuário:</strong> <span>{{ $registro->descricao['reg_anterior']['user']['name'] }}</span></li>
										<li><strong class="text-primary">E-mail:</strong> <span>{{ $registro->descricao['reg_anterior']['user']['email'] }}</span></li>
										<li><strong class="text-primary">Status:</strong> <span>@if($registro->descricao['reg_anterior']['user']['cs_status'] == 'A') Ativo @else Inativo @endif</span></li>
										<hr>
										@endif
									</ul>
									@else
									--------
									@endif
								</div>
								<div class="col-md-6">
									<label><strong>Registro atual</strong></label>
									@if(sizeof($registro->descricao['reg_novo']) > 0)
									<ul class="text-left">
										@if(!empty($registro->descricao['reg_anterior']['atendimento']))
										<li><strong class="text-primary">Item Atendimento:</strong> <span @if($registro->descricao['reg_anterior']['atendimento']['ds_preco'] != $registro->descricao['reg_novo']['atendimento']['ds_preco']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['atendimento']['ds_preco'] }}</span></li>
										<li><strong class="text-primary">Cód. Atendimento:</strong> <span @if($registro->descricao['reg_anterior']['atendimento']['id'] != $registro->descricao['reg_novo']['atendimento']['id']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['atendimento']['id'] }}</span></li>
										<hr>
										@endif
										
										@if(!empty($registro->descricao['reg_anterior']['preco']))
										<li><strong class="text-primary">Cód. Plano:</strong> <span @if(empty($registro->descricao['reg_anterior']['preco']) || ($registro->descricao['reg_anterior']['preco']['plano_id'] != $registro->descricao['reg_novo']['preco']['plano_id'])) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['preco']['plano']['ds_plano'] }}</span></li>
										<li><strong class="text-primary">Vl. Comercial:</strong> <span @if(empty($registro->descricao['reg_anterior']['preco']) || ($registro->descricao['reg_anterior']['preco']['vl_comercial'] != $registro->descricao['reg_novo']['preco']['vl_comercial'])) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['preco']['vl_comercial'] }}</span></li>
										<li><strong class="text-primary">Vl. Comercial:</strong> <span @if(empty($registro->descricao['reg_anterior']['preco']) || ($registro->descricao['reg_anterior']['preco']['vl_net'] != $registro->descricao['reg_novo']['preco']['vl_net'])) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['preco']['vl_net'] }}</span></li>
										<li><strong class="text-primary">Data início:</strong> <span @if($registro->descricao['reg_anterior']['preco']['data_inicio'] != $registro->descricao['reg_novo']['preco']['data_inicio']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['preco']['data_inicio'] }}</span></li>
										<li><strong class="text-primary">Data fim:</strong> <span @if($registro->descricao['reg_anterior']['preco']['data_fim'] != $registro->descricao['reg_novo']['preco']['data_fim']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['preco']['data_fim'] }}</span></li>
										@elseif(!empty($registro->descricao['reg_novo']['preco']))
										<li><strong class="text-primary">Cód. Plano:</strong> <span>{{ $registro->descricao['reg_novo']['preco']['plano']['ds_plano'] }}</span></li>
										<li><strong class="text-primary">Vl. Comercial:</strong> <span>{{ $registro->descricao['reg_novo']['preco']['vl_comercial'] }}</span></li>
										<li><strong class="text-primary">Vl. Comercial:</strong> <span>{{ $registro->descricao['reg_novo']['preco']['vl_net'] }}</span></li>
										<li><strong class="text-primary">Data início:</strong> <span>{{ $registro->descricao['reg_novo']['preco']['data_inicio'] }}</span></li>
										<li><strong class="text-primary">Data fim:</strong> <span>{{ $registro->descricao['reg_novo']['preco']['data_fim'] }}</span></li>
										<hr>
										@endif
										
										@if(!empty($registro->descricao['reg_anterior']['filial']))
										<li><strong class="text-primary">Cód. Filial:</strong> <span @if($registro->descricao['reg_anterior']['filial']['id'] != $registro->descricao['reg_novo']['filial']['id']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['filial']['id'] }}</span></li>
										<li><strong class="text-primary">Nome fantasia:</strong> <span @if($registro->descricao['reg_anterior']['filial']['nm_nome_fantasia'] != $registro->descricao['reg_novo']['filial']['nm_nome_fantasia']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['filial']['nm_nome_fantasia'] }}</span></li>
										<li><strong class="text-primary"></strong><a href="{{ route('clinicas.show', $registro->descricao['reg_anterior']['filial']['clinica_id']) }}" title="Exibir"><i class="mdi mdi-eye"></i> Ver Clínica Matriz</a></li>
										@elseif(!empty($registro->descricao['reg_novo']['filial']))
										<li><strong class="text-primary">Cód. Filial:</strong> <span>{{ $registro->descricao['reg_novo']['filial']['id'] }}</span></li>
										<li><strong class="text-primary">Nome fantasia:</strong> <span>{{ $registro->descricao['reg_novo']['filial']['nm_nome_fantasia'] }}</span></li>
										<li><strong class="text-primary"></strong><a href="{{ route('clinicas.show', $registro->descricao['reg_novo']['filial']['clinica_id']) }}" title="Exibir"><i class="mdi mdi-eye"></i> Ver Clínica Matriz</a></li>
										<hr>
										@endif
										
										@if(!empty($registro->descricao['reg_anterior']['clinica']))
										<li><strong class="text-primary">Cód. Clínica:</strong> <span @if($registro->descricao['reg_anterior']['clinica']['id'] != $registro->descricao['reg_novo']['clinica']['id']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['clinica']['id'] }}</span></li>
										<li><strong class="text-primary">Razão social:</strong> <span @if($registro->descricao['reg_anterior']['clinica']['nm_razao_social'] != $registro->descricao['reg_novo']['clinica']['nm_razao_social']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['clinica']['nm_razao_social'] }}</span></li>
										<li><strong class="text-primary">Nome fantasia:</strong> <span @if($registro->descricao['reg_anterior']['clinica']['nm_fantasia'] != $registro->descricao['reg_novo']['clinica']['nm_fantasia']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['clinica']['nm_fantasia'] }}</span></li>
										<li><strong class="text-primary">Obs:</strong> <span @if($registro->descricao['reg_anterior']['clinica']['obs_procedimento'] != $registro->descricao['reg_novo']['clinica']['obs_procedimento']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['clinica']['obs_procedimento'] }}</span></li>
										<li><strong class="text-primary">Tipo Prestador:</strong> <span @if($registro->descricao['reg_anterior']['clinica']['tp_prestador'] != $registro->descricao['reg_novo']['clinica']['tp_prestador']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['clinica']['tp_prestador'] }}</span></li>
										<li><strong class="text-primary"></strong><a href="{{ route('users.show', $registro->descricao['reg_novo']['responsavel']['user_id']) }}" title="Exibir"><i class="mdi mdi-eye"></i> Ver Responsável</a></li>
										<li><strong class="text-primary">Tipo Documento:</strong> <span @if($registro->descricao['reg_anterior']['documento']['tp_documento'] != $registro->descricao['reg_novo']['documento']['tp_documento']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['documento']['tp_documento'] }}</span></li>
										<li><strong class="text-primary">Nr. Documento:</strong> <span @if($registro->descricao['reg_anterior']['documento']['te_documento'] != $registro->descricao['reg_novo']['documento']['te_documento']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['documento']['te_documento'] }}</span></li>
										<li><strong class="text-primary">Tipo Contato:</strong> <span @if($registro->descricao['reg_anterior']['contato']['tp_contato'] != $registro->descricao['reg_novo']['contato']['tp_contato']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['contato']['tp_contato'] }}</span></li>
										<li><strong class="text-primary">Nr. Documento:</strong> <span @if($registro->descricao['reg_anterior']['contato']['ds_contato'] != $registro->descricao['reg_novo']['contato']['ds_contato']) class="text-danger" @endif>{{ $registro->descricao['reg_novo']['contato']['ds_contato'] }}</span></li>
										<hr>
										@elseif(!empty($registro->descricao['reg_novo']['clinica']))
										<li><strong class="text-primary">Cód. Clínica:</strong> <span>{{ $registro->descricao['reg_novo']['clinica']['id'] }}</span></li>
										<li><strong class="text-primary">Razão social:</strong> <span>{{ $registro->descricao['reg_novo']['clinica']['nm_razao_social'] }}</span></li>
										<li><strong class="text-primary">Nome fantasia:</strong> <span>{{ $registro->descricao['reg_novo']['clinica']['nm_fantasia'] }}</span></li>
										<li><strong class="text-primary">Obs:</strong> <span>{{ $registro->descricao['reg_novo']['clinica']['obs_procedimento'] }}</span></li>
										<li><strong class="text-primary">Tipo Prestador:</strong> <span>{{ $registro->descricao['reg_novo']['clinica']['tp_prestador'] }}</span></li>
										<li><strong class="text-primary"></strong><a href="{{ route('users.show', $registro->descricao['reg_novo']['responsavel']['user_id']) }}" title="Exibir"><i class="mdi mdi-eye"></i> Ver Responsável</a></li>
										<li><strong class="text-primary">Tipo Documento:</strong> <span>{{ $registro->descricao['reg_novo']['documento']['tp_documento'] }}</span></li>
										<li><strong class="text-primary">Nr. Documento:</strong> <span>{{ $registro->descricao['reg_novo']['documento']['te_documento'] }}</span></li>
										<li><strong class="text-primary">Tipo Contato:</strong> <span>{{ $registro->descricao['reg_novo']['contato']['tp_contato'] }}</span></li>
										<li><strong class="text-primary">Nr. Documento:</strong> <span>{{ $registro->descricao['reg_novo']['contato']['ds_contato'] }}</span></li>
										<hr>
										@endif
										
										@if(!empty($registro->descricao['reg_anterior']['user']))
										<li><strong class="text-primary">Id.:</strong> <span @if($registro->descricao['reg_anterior']['user']['id'] != $registro->descricao['reg_anterior']['user']['id']) class="text-danger" @endif>{{ $registro->descricao['reg_anterior']['user']['id'] }}</span></li>
										<li><strong class="text-primary">Nome de usuário:</strong> <span @if($registro->descricao['reg_anterior']['user']['name'] != $registro->descricao['reg_anterior']['user']['name']) class="text-danger" @endif>{{ $registro->descricao['reg_anterior']['user']['name'] }}</span></li>
										<li><strong class="text-primary">E-mail:</strong> <span @if($registro->descricao['reg_anterior']['user']['email'] != $registro->descricao['reg_anterior']['user']['email']) class="text-danger" @endif>{{ $registro->descricao['reg_anterior']['user']['email'] }}</span></li>
										<li><strong class="text-primary">Status:</strong> <span>@if($registro->descricao['reg_anterior']['user']['cs_status'] == 'A') Ativo @else Inativo @endif</span></li>
										<hr>
										@elseif(!empty($registro->descricao['reg_novo']['user']))
										<li><strong class="text-primary">Id.:</strong> <span>{{ $registro->descricao['reg_novo']['user']['id'] }}</span></li>
										<li><strong class="text-primary">Nome de usuário:</strong> <span>{{ $registro->descricao['reg_novo']['user']['name'] }}</span></li>
										<li><strong class="text-primary">E-mail:</strong> <span>{{ $registro->descricao['reg_novo']['user']['email'] }}</span></li>
										<li><strong class="text-primary">Status:</strong> <span>@if($registro->descricao['reg_novo']['user']['cs_status'] == 'A') Ativo @else Inativo @endif</span></li>
										<hr>
										@endif
									</ul>
									@else
									--------
									@endif
								</div>
							</div>
						</td>
						<td>{{$registro->created_at}}</td>
						<td>
							<a href="{{ route('registro_logs.show', $registro->id) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir log completo"><i class="mdi mdi-eye"></i></a>
							<!-- <a href="{{ route('registro_logs.edit', $registro->id) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a> -->
						</td>
					</tr>
					@endforeach
				</table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">{{ sprintf("%02d", $registros->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $registros->count()) }} Registro(s) exibido(s)</span>
                		{!! $registros->appends(request()->input())->links() !!}
                	</div>
                </tfoot>
           </div>
       </div>
	</div>
</div>
@endsection
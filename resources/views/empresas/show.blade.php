@extends('layouts.master')

@section('title', 'Doutor HJ: Empresas')

@section('container')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<h4 class="page-title">Doutor HJ</h4>
					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('empresas.index') }}">Lista de Empresas</a></li>
						<li class="breadcrumb-item active">Detalhes do Empresa</li>
					</ol>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card-box">
					<h4 class="header-title m-t-0 m-b-20">Detalhes do Empresa</h4>

					<table class="table table-bordered table-striped view-doutorhj">
						<tbody>
						<tr>
							<td>Código (id):</td>
							<td>{{ $model->id }}</td>
						</tr>
						<tr>
							<td>Tipo de Empresa:</td>
							<td>{{ $model->tipoEmpresa->descricao }}</td>
						</tr>
						<tr>
							<td>Razão Social:</td>
							<td>{{ $model->razao_social }}</td>
						</tr>
						<tr>
							<td>Nome Fantasia:</td>
							<td>{{ $model->nome_fantasia }}</td>
						</tr>
						<tr>
							<td>CNPJ:</td>
							<td>{{ $model->cnpj }}</td>
						</tr>
						<tr>
							<td>Inscrição Estadual:</td>
							<td>{{ $model->inscricao_estadual }}</td>
						</tr>
						<tr>
							<td colspan="2"><h4>Contato</h4></td>
						</tr>
						<tr>
							<td>Contato Administrativo:</td>
							<td>{{ $model->contatos->where('tp_contato', 'CA')->first()->ds_contato}}</td>
						</tr>
						<tr>
							<td>Contato Financeiro:</td>
							<td>{{ $model->contatos->where('tp_contato', 'CF')->first()->ds_contato}}</td>
						</tr>
						<tr>
							<td colspan="2"><h4>Endereço</h4></td>
						</tr>
						<tr>
							<td>CEP</td>
							<td>{{$model->endereco->first()->nr_cep}}</td>
						</tr>
						<tr>
							<td>Tipo de Logradouro</td>
							<td>@if( $model->endereco->sg_logradouro != null ) {{$model->endereco->first()->sg_logradouro}} @else <span class="text-danger">-- NÃO INFORMADO --</span> @endif</td>
						</tr>
						<tr>
							<td>Endereço</td>
							<td>{{$model->endereco->te_endereco}}</td>
						</tr>
						<tr>
							<td>Número</td>
							<td>{{$model->endereco->nr_logradouro}}</td>
						</tr>
						<tr>
							<td>Complemento</td>
							<td>{{$model->endereco->te_complemento}}</td>
						</tr>
						<tr>
							<td>Bairro</td>
							<td>{{$model->endereco->te_bairro}}</td>
						</tr>
						<tr>
							<td>Cidade</td>
							<td>{{ $model->endereco->cidade->nm_cidade }}</td>
						</tr>
						<tr>
							<td>Estado</td>
							<td>{{ $model->endereco->cidade->sg_estado }}</td>
						</tr>
						<tr>
							<td colspan="2"><h4>Dados Financeiros</h4></td>
						</tr>
						<tr>
							<td>Anuidade:</td>
							<td>{{ $model->anuidade }}</td>
						</tr>
						<tr>
							<td>Desconto:</td>
							<td>{{ $model->desconto }}</td>
						</tr>
						<tr>
							<td>Limite da Empresa:</td>
							<td>{{ $model->vl_max_empresa }}</td>
						</tr>
						<tr>
							<td>Limite dos Funcionários:</td>
							<td>{{ $model->vl_max_funcionario }}</td>
						</tr>
						{{--<tr>--}}
							{{--<td>Tipo de Empresa:</td>--}}
							{{--<td>--}}
								{{--@foreach($model->tipoEmpresas as $tipoEmpresa)--}}
									{{--{{$tipoEmpresa->descricao}}<br>--}}
								{{--@endforeach--}}
							{{--</td>--}}
						{{--</tr>--}}
						</tbody>
					</table>
				</div>
				<div class="form-group text-right m-b-0">
					<a href="{{ route('empresas.edit', $model->id) }}" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-lead-pencil"></i> Editar</a>
					<a href="{{ route('empresas.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
				</div>
			</div>
		</div>
	</div>
@endsection
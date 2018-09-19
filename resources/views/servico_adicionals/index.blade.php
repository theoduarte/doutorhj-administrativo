@extends('layouts.master')

@section('title', 'Doutor HJ: Serviços Adicionais')

@section('container')
<div class="container-fluid">
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="">Cadastros</a></li>
					<li class="breadcrumb-item active">Serviço Adicional</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Serviços Adicionais</h4>
				<p class="text-muted m-b-30 font-13">
					Listagem completa
				</p>

				<div class="row justify-content-between">
					<div class="col-3">
						<div class="float-left">
							<a href="{{ route('servico_adicionals.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i> Adicionar Serviço</a>
						</div>
					</div>


					<div class="col-6">
						<div class="form-group float-right">
							<form action="{{ route('servico_adicionals.index') }}" id="form-search"  method="get">
								<div class="input-group bootstrap-touchspin">
									<input type="text" id="search_term" value="<?php echo isset($_GET['search_term']) ? $_GET['search_term'] : ''; ?>" name="search_term" class="form-control" style="display: block;">
									<span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
									<span class="input-group-btn"><button type="button" class="btn btn-primary bootstrap-touchspin-up" onclick="$('#form-search').submit()"><i class="fa fa-search"></i></button></span>
								</div>
							</form>
						</div>
					</div>
					<div class="col-3">
						<div class="float-right">
							<a href="{{ route('servico_adicionals.index') }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><i class="ion-close"></i> Limpar Busca</a>
						</div>
					</div>
				</div>

				<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
					<tr>
						<th>@sortablelink('id')</th>
						<th>@sortablelink('titulo', 'Título')</th>
						<th>@sortablelink('cs_status', 'Status')</th>
						<th>@sortablelink('plano_id', 'ID do Plano')</th>
						<th>Ações</th>
					</tr>
					@foreach($servico_adicionals as $servico)

					<tr>
						<td>{{ sprintf("%04d", $servico->id) }}</td>
						<td>{{$servico->titulo}}</td>
						<td>@if($servico->cs_status == 'A') <span class="text-success"><strong><i class="ion-checkmark-circled"></i> Ativo</strong></span> @else <span class="text-danger"><strong><i class="ion-close-circled"></i> Inativo</strong></span> @endif</td>
						<td>{{$servico->plano->ds_plano}}</td>
						<td>
							<a href="{{ route('servico_adicionals.show', $servico->id) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
							<a href="{{ route('servico_adicionals.edit', $servico->id) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
							<a href="{{ route('servico_adicionals.destroy', $servico->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o serviço: {{ $servico->titulo }}"><i class="ti-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">{{ sprintf("%02d", $servico_adicionals->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $servico_adicionals->count()) }} Registro(s) exibido(s)</span>
                		{!! $servico_adicionals->appends(request()->input())->links() !!}
                	</div>
                </tfoot>
           </div>
       </div>
	</div>
</div>
@endsection

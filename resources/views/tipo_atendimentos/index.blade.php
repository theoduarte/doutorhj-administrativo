@extends('layouts.master')

@section('title', 'Doctor HJ: Tipos de Atendimentos')

@section('container')
<div class="container-fluid">
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Cadastros</a></li>
					<li class="breadcrumb-item active">Tipos de Atendimentos</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Tipos de Atendimentos</h4>
				<p class="text-muted m-b-30 font-13">
					Listagem completa
				</p>
				
				<div class="row justify-content-between">
					<div class="col-8">
						<div class="form-group">
							<a href="{{ route('tipo_atendimentos.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i> Adicionar Tipo</a>
						</div>
					</div>				
					<div class="col-1">
						<div class="form-group text-right m-b-0">
							<a href="{{ route('tipo_atendimentos.index') }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" title="Limpar Busca"><i class="ion-close"></i> Limpar Busca</a>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group float-right">
							<form action="{{ route('tipo_atendimentos.index') }}" id="form-search"  method="get">
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
						<th>@sortablelink('cd_atendimento', 'Código')</th>
						<th>@sortablelink('ds_atendimento', 'Título')</th>
						<th>TAG (value)</th>
						<th>Status</th>
						<th>Ações</th>
					</tr>
					@foreach($tipo_atendimentos as $tipo_atend)
				
					<tr>
						<td>{{ sprintf("%04d", $tipo_atend->id) }}</td>
						<td>{{$tipo_atend->cd_atendimento}}</td>
						<td>{{$tipo_atend->ds_atendimento}}</td>
						<td>{{$tipo_atend->tag_value}}</td>
						<td>{{$tipo_atend->getStatusString()}}</td>
						<td>
							<a href="{{ route('tipo_atendimentos.show', $tipo_atend->id) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
							<a href="{{ route('tipo_atendimentos.edit', $tipo_atend->id) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
							<!-- <a href="{{ route('tipo_atendimentos.destroy', $tipo_atend->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o Grupo de Procedimento: {{ $tipo_atend->ds_grupo }}"><i class="ti-trash"></i></a> -->
						</td>
					</tr>
					@endforeach
				</table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">{{ sprintf("%02d",$tipo_atendimentos->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $tipo_atendimentos->count()) }} Registro(s) exibido(s)</span>
                		{!! $tipo_atendimentos->links() !!}
                	</div>
                </tfoot>
           </div>
       </div>
	</div>
</div>
@endsection
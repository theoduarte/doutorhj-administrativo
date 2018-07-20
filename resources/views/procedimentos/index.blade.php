@extends('layouts.master')

@section('title', 'Doctor HJ: Procedimentos')

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
					<li class="breadcrumb-item active">Procedimentos</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Procedimentos</h4>
				<p class="text-muted m-b-30 font-13">
					Listagem completa segundo o CBHPM
				</p>
				
				<div class="row justify-content-between">
					<div class="col-8">
						<div class="form-group">
							<a href="{{ route('procedimentos.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i> Adicionar Procedimento</a>
						</div>
					</div>				
					<div class="col-1">
						<div class="form-group text-right m-b-0">
							<a href="{{ route('procedimentos.index') }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" title="Limpar Busca"><i class="ion-close"></i> Limpar Busca</a>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group float-right">
							<form action="{{ route('procedimentos.index') }}" id="form-search"  method="get">
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
						<th>@sortablelink('cd_procedimento', 'Código')</th>
						<th>@sortablelink('ds_procedimento', 'Descrição')</th>
						<th>@sortablelink('tipoatendimento_id', 'Tipo Atendt.')</th>
						<th>@sortablelink('grupoprocedimento_id', 'Grupo Procedimento')</th>
						<th>Nomes Populares</th>
						<th>Ações</th>
					</tr>
					@foreach($procedimentos as $procedimento)
				
					<tr>
						<td>{{$procedimento->id}}</td>
						<td>{{$procedimento->cd_procedimento}}</td>
						<td>{{$procedimento->ds_procedimento}}</td>
						<td>@if($procedimento->tipoatendimento != null) {{ $procedimento->tipoatendimento->ds_atendimento }} @else <span class="text-danger"><strong><i class="ion-close-circled"></i> Não informado</strong></span> @endif</td>
						<td>@if($procedimento->grupoprocedimento != null) {{ $procedimento->grupoprocedimento->ds_grupo }} @else <span class="text-danger"><strong><i class="ion-close-circled"></i> Não informado</strong></span> @endif</td>
						<td>@if( isset($procedimento->tag_populars) && sizeof($procedimento->tag_populars) > 0 ) <ul class="list-profissional-especialidade">@foreach($procedimento->tag_populars as $tag) <li><i class="mdi mdi-check"></i> {{ $tag->cs_tag }}</li> @endforeach</ul> @else <span class="text-danger"> <i class="mdi mdi-close-circle"></i> NENHUMA TAG SELECIONADA</span>  @endif</td>
						<td>
							<a onclick="loadTags(this, {{ $procedimento->id }}, '{{$procedimento->ds_procedimento}}', 'proced')" class="btn btn-icon waves-effect btn-success btn-sm m-b-5" data-toggle="tooltip" data-placement="left" title="Nomes Populares"><i class="mdi mdi-tag-multiple"></i></a>
							<a href="{{ route('procedimentos.show', $procedimento->id) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
							<a href="{{ route('procedimentos.edit', $procedimento->id) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
							<a href="{{ route('procedimentos.destroy', $procedimento->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o Procedimento: {{ $procedimento->cd_procedimento }}"><i class="ti-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">{{ sprintf("%02d", $procedimentos->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $procedimentos->count()) }} Registro(s) exibido(s)</span>
                		{!! $procedimentos->appends(request()->input())->links() !!}
                	</div>
                </tfoot>
           </div>
       </div>
	</div>
</div>

@include('includes/tags')

@endsection
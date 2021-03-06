@extends('layouts.master')

@section('title', 'Doutor HJ: Cupons de Desconto')

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
					<li class="breadcrumb-item active">Cupons de Desconto</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Cupons de Desconto</h4>
				<p class="text-muted m-b-30 font-13">
					Listagem completa
				</p>
				
				<div class="row justify-content-between">
					<div class="col-8">
						<div class="form-group">
							<a href="{{ route('cupom_descontos.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i> Adicionar Cupom</a>
						</div>
					</div>				
					<div class="col-1">
						<div class="form-group text-right m-b-0">
							<a href="{{ route('cupom_descontos.index') }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" title="Limpar Busca"><i class="ion-close"></i> Limpar Busca</a>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group float-right">
							<form action="{{ route('cupom_descontos.index') }}" id="form-search"  method="get">
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
						<th>@sortablelink('titulo', 'Título')</th>
						<th>@sortablelink('codigo', 'Código')</th>
						<th>@sortablelink('percentual', 'Percentual')</th>
						<th>Vigência</th>
						<th>@sortablelink('cs_sexo', 'Sexo')</th>
						<th>@sortablelink('cs_status', 'Status')</th>
						<th>@sortablelink('dt_nascimento', 'Dt Nasc.')</th>
						<th>Ações</th>
					</tr>
					@foreach($cupom_descontos as $cupom)
				
					<tr>
						<td>{{ sprintf("%04d", $cupom->id) }}</td>
						<td>{{$cupom->titulo}}</td>
						<td>{{$cupom->codigo}}</td>
						<td>{{$cupom->percentual}}%</td>
						<td>de <strong>{{ date('d-m-Y', strtotime($cupom->dt_inicio)) }}</strong> até <strong>{{ date('d-m-Y', strtotime($cupom->dt_fim)) }}</strong></td>
						<td>@if($cupom->cs_sexo == 'T') Todos @elseif($cupom->cs_sexo == 'M') Masc. @else Fem. @endif</td>
						<td>@if($cupom->cs_status == 'A') <span class="text-success"><strong><i class="ion-checkmark-circled"></i> Ativo</strong></span> @else <span class="text-danger"><strong><i class="ion-close-circled"></i> Inativo</strong></span> @endif</td>
						<td>{{ date('d-m-Y', strtotime($cupom->dt_nascimento)) }}</td>
						<td>
							<a href="{{ route('cupom_descontos.show', $cupom->id) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
							<a href="{{ route('cupom_descontos.edit', $cupom->id) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
							<a href="{{ route('cupom_descontos.destroy', $cupom->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o Cupom de Desconto: {{ $cupom->codigo }}"><i class="ti-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">{{ sprintf("%02d", $cupom_descontos->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $cupom_descontos->count()) }} Registro(s) exibido(s)</span>
                		{!! $cupom_descontos->appends(request()->input())->links() !!}
                	</div>
                </tfoot>
           </div>
       </div>
	</div>
</div>
@endsection
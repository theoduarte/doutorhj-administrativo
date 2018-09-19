@extends('layouts.master')

@section('title', 'Doutor HJ: Entidades')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('entidades.index') }}">Lista de entidades</a></li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card-box">
			<h4 class="m-t-0 header-title">Entidades</h4>
			<p class="text-muted m-b-30 font-13"}>Listagem Completa</p>

			<div class="row">
				<div class="col-12">
					<form class="form-edit-add" role="form" action="{{ route('entidades.index') }}" method="get" ecntype="multipart/form-data">
						<div class="float-right">
							<a href="{{ route('entidades.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"> <i class="fa fa-plus m-r-5"></i>Adicionar Entidade</a>
						</div>
						<div class="row">
							<div style="width: 530px !important;">
								<label for="tp_filtro_entidade">Filtrar por:</label><br>
								<div class="form-group">
									<input type="radio" id="tp_filtro_titulo" name="tp_filtro" value="titulo" @if( old('tp_filtro')=='titulo') checked @endif>
									<label for="tp_filtro_titulo" style="cursor: pointer;">Titulo&nbsp;&nbsp;&nbsp;</label>

									<input type="radio" id="tp_filtro_abreviacao" name="tp_filtro" value="abreviacao" @if( old('tp_filtro')=='abreviacao') checked @endif>
									<label for="tp_filtro_abreviacao" style="cursor: pointer;">Abreviação&nbsp;&nbsp;&nbsp;</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div style="width:30% !important;">
								<input type="text" class="form-control" name="nm_busca" id="nm_busca" value="{{ old('nm_busca') }}">
							</div>
							<div class="col-1">
								<button type="submit" class="btn btn-primary" id="btnPesquisar"> <i class="fa fa-search"></i> </button>
							</div>
						</div>
					</form></br>
				</div>

				<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
					<tr>
						<th>@sortablelink('id', 'Cód.')</th>
						<th>@sortablelink('titulo', 'Titulo')</th>
						<th>@sortablelink('abreviacao', 'Abreviação')</th>
						<th>Local</th>
						<th>Ações</th>
					</tr>

					@foreach($entidades as $entidade)
						<tr>
							<td>{{ sprintf("%04d", $entidade->id)}}</td>
							<td>{{ $entidade->titulo }}</td>
							<td>{{ $entidade->abreviacao }}</td>
							<td>{{ $entidade->img_path }}</td>
							<td>
								<a href="{{ route('entidades.show', $entidade->id)}}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5"> <i class="mdi mdi-eye"></i> </a>
								<a href="{{ route('entidades.edit', $entidade->id)}}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5"> <i class="mdi mdi-lead-pencil"></i> </a>
								<a href="{{ route('entidades.destroy', $entidade->id)}}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir a entidade {{$entidade->titulo}}"><i class="ti-trash"></i></a>
							</td>
						</tr>
					@endforeach
				</table>

				<tfoot>
					<div class="cvx-pagination">
						<span class="text-primary">
							{{ sprintf("%02d", $entidades->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $entidades->count()) }} Registro(s) exibido(s)
						</span>
						{!! $entidades->appends(request()->input())->links() !!}
					</div>
				</tfoot>
			</div>
		</div>
	</div>
</div>



@endsection

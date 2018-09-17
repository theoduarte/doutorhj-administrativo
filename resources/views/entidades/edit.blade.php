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
					<li class="breadcrumb-item"><a href="{{ route('entidades.index') }}">Lista de Entidades</a></li>
					<li class="breadcrumb-item active">Cadastrar Entidade</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<form action="{{ route('entidades.update', $model->id) }}" method="post">
		<input type="hidden" name="_method" value="PUT">
		{!! csrf_field() !!}

		<div class="row">
			<div class="col-12">
				<div class="card-box col-12">
					<h4 class="header-title m-t-0 m-b-30">Entidades</h4>

					@if ($errors->any())
						<div class="alert alert-danger fade show">
							<span class="close" data-dismiss="alert">×</span>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="titulo">Título<span class="text-danger">*</span></label>
							<input type="number" id="titulo" class="form-control" name="titulo" placeholder="Título" maxlength="150" required value="{{ $model->titulo }}">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="abreviacao">Abreviação<span class="text-danger">*</span></label>
							<input type="number" id="abreviacao" class="form-control" name="abreviacao" placeholder="Abreviação" maxlength="50" required value="{{ $model->abreviacao }}">
						</div>
					</div>

					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('entidades.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</div>
			</div>
		</div>

	</form>

</div>
@endsection

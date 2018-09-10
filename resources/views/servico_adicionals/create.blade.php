@extends('layouts.master')

@section('title', 'Doutor HJ: Serviços Adicionais')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('servico_adicionals.index') }}">Lista de Serviços Adicionais</a></li>
					<li class="breadcrumb-item active">Adicionar Serviço</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Serviço</h4>

				<form action="{{ route('servico_adicionals.store') }}" method="post">

					{!! csrf_field() !!}

					<div class="form-group">
						<div class="row">
							<div class="col-md-9">
								<label for="titulo">Título<span class="text-danger">*</span></label>
								<input type="text" id="titulo" class="form-control" name="titulo" required maxlength="150" placeholder="Título do Serviço"  >
							</div>
							<div class="col-md-3">
								<label for="codigo">ID Plano<span class="text-danger">*</span></label>
								<input type="text" id="plano_id" class="form-control" name="plano_id" placeholder="ID do Plano"  >
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="descricao">Descrição<span class="text-danger">*</span></label>
						<textarea id="ds_servico" class="form-control" name="ds_servico" placeholder="Descrição do Serviço" ></textarea>
					</div>

					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('servico_adicionals.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

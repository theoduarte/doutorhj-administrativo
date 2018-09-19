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

				<form action="{{ route('servico_adicionals.store') }}" method="post">
					{!! csrf_field() !!}
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label for="titulo">Título<span class="text-danger">*</span></label>
								<input type="text" id="titulo" class="form-control" name="titulo" required maxlength="150" placeholder="Título do Serviço"  >
							</div>

							<div class="form-group col-md-12">
								<label for="plano_id">ID do Plano<span class="text-danger">*</span></label>
								<select id="plano_id" name="plano_id" class="form-control select2" required>
									@foreach($planos as $id=>$ds_plano)
										<option value="{{$id}}" @if ( old('serv_adicional') == $id) selected="selected"  @endif>{{$ds_plano}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="descricao">Descrição</span></label>
						<textarea id="ds_servico" class="form-control" name="ds_servico" placeholder="Descrição do Serviço" ></textarea>
					</div>

					<div class="col-md-3">
						<label for="cs_status">Status<span class="text-danger">*</span></label>
						<select id="cs_status" class="form-control" name="cs_status" required>
							<option value="A">Ativo</option>
							<option value="I">Inativo</option>
						</select>
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

@push('scripts')
<script type="text/javascript">
	jQuery(document).ready(function($) {


	});
</script>
@endpush

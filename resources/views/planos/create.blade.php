@extends('layouts.master')

@section('title', 'Planos')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('planos.index') }}">Lista de Planos</a></li>
					<li class="breadcrumb-item active">Cadastrar Plano</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<form action="{{ route('planos.store') }}" method="post">
		{!! csrf_field() !!}
    	<div class="row">
	        <div class="col-12">
                <div class="card-box col-12">
                    <h4 class="header-title m-t-0 m-b-30">Planos</h4>

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
						<div class="form-group col-md-3">
							<label for="cd_plano">Código<span class="text-danger">*</span></label>
							<input type="number" id="cd_plano" class="form-control" name="cd_plano" placeholder="Código" required value="{{old('cd_plano')}}">
						</div>

						<div class="form-group col-md-6">
							<label for="tipoPlanos">Tipo de Plano<span class="text-danger">*</span></label>
							<select id="tipoPlanos" name="tipoPlanos[]" class="form-control select2" multiple required>
								@foreach($tipoPlanos as $id=>$plano)
									<option value="{{$id}}" @if ( old('tp_plano_id') == $id) selected="selected"  @endif>{{$plano}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group col-md-3">
							<label for="cd_plano">Anuidade<span class="text-danger">*</span></label>
							<input type="text" id="anuidade" class="form-control maskAnuidade" name="anuidade" placeholder="Anuidade" required value="{{old('anuidade')}}">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="ds_plano">Descrição<span class="text-danger">*</span></label>
							<input type="text" id="ds_plano" class="form-control" name="ds_plano" placeholder="Descrição" maxlength="150" required value="{{old('ds_plano')}}">
						</div>
					</div>

					<div class="form-row">
						<div class="col-md-12">
							<div class="form-group text-right m-b-0">
								<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Cadastrar</button>
								<a href="{{ route('planos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
							</div>
						</div>
					</div>
                </div>
       		</div>
    	</div>
   </form>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
	jQuery(document).ready(function($) {


	});
</script>
@endpush
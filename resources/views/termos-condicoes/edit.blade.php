@extends('layouts.master')

@section('title', 'Termos e Condições')

@section('container')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Cadastros</a></li>
					<li class="breadcrumb-item"><a href="{{ route('termos-condicoes.index') }}">Lista de Termos e Condições</a></li>
					<li class="breadcrumb-item active">Editar Termos e Condições</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
				    @foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
					</ul>
				</div>
			@endif
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Termos e Condições</h4>				
				<form action="{{ route('termos-condicoes.update', $termosCondicoes) }}" method="post" novalidate>
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
					
					<div class="form-group">
						<div class="col-md-8">
							<label for="dt_inicial">Data inicial<span class="text-danger">*</span></label>
							<label for="dt_final" style="float: right;">Data Final<span class="text-danger">*</span></label>
							<div class="input-daterange-datepicker input-group" id="date-range">
	                            <input type="text" id="dt1" class="form-control" name="dt_inicial" 	value="{{ old('dt_inicial') ? old('dt_inicial') : $termosCondicoes->dt_inicial }}" required placeholder="Início da Vigência" >
	                            <input type="text" id="dt2" class="form-control" name="dt_final" 	value="{{ old('dt_final') ? old('dt_final') : $termosCondicoes->dt_final }}" required placeholder="Fim da Vigência"  >
	                        </div>
						</div>
					</div>

					<div class="form-group">
						<label for="ds_termo">Termos e condições<span class="text-danger">*</span></label>
						<textarea id="ds_termo" class="form-control" name="ds_termo" required>{{ old('ds_termo') ? old('ds_termo') : $termosCondicoes->ds_termo }}</textarea>
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('termos-condicoes.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
	<!-- TinyMCE JS -->
	<script src="/libs/tinymce/tinymce.min.js"></script>
	<script src="/libs/tinymce/jquery.tinymce.min.js"></script>
	
	<script type="text/javascript">
		tinymce.init({
		  selector: 'textarea',
		  height: 500,
		  theme: 'modern',
  		  menubar: true,
		  plugins: [
		    'advlist autolink lists link image charmap print preview anchor textcolor',
		    'searchreplace visualblocks code fullscreen',
		    'insertdatetime media table contextmenu paste code help wordcount'
		  ],
		  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
		  content_css: [
		    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		    '//www.tinymce.com/css/codepen.min.css']
		});
	</script>
@endpush
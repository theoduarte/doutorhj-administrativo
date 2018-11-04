@extends('layouts.master')

@section('title', 'Requisitos de Titulação')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('requisitos.index') }}">Lista de Requisitos de Titulação</a></li>
					<li class="breadcrumb-item active">Adicionar Requisito</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Requisito</h4>
				
				<form action="{{ route('requisitos.store') }}" method="post">
				
					{!! csrf_field() !!}
					
					<div class="form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
						<label for="titulo">Título<span class="text-danger">*</span></label>
						<input type="text" id="titulo" class="form-control" name="titulo" required placeholder="Título do Requisito" value="{{ old('titulo') }}"  autocomplete="off">
						@if ($errors->has('titulo'))
	                    <span class="help-block text-danger">
	                    	<strong>{{ $errors->first('titulo') }}</strong>
	                    </span>
	                    @endif
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('requisitos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
		
    $( "#titulo" ).autocomplete({
    	  source: function( request, response ) {
    		  jQuery.ajax( {
    	    	  type: 'POST',
    	    	  dataType : 'json',
    	    	  url: "{{ route('listar-requisitos') }}",
    	    	  data: {
        	    	  'titulo': $('#titulo').val(),
        	    	  '_token': laravel_token
        	   	  },
    	          success  : function( data ) {
    	            response( data );
    	          }
    	      });
    	  },
    	  minLength : 3,
    	  select: function(event, ui) {
        	  var arConsulta = ui.item;
        	  
        	  $( "#titulo" ).val(arConsulta.value);
    	  }
    });
});
</script>
@endsection
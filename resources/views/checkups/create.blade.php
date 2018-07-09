@extends('layouts.master')

@section('title', 'Checkups')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('checkups.index') }}">Lista de Checkups</a></li>
					<li class="breadcrumb-item active">Cadastrar Checkup</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card-box">
                <h4 class="header-title m-t-0">Adicionar Checkup</h4>
                
                <form action="{{ route('checkups.store') }}" method="post">
                
                    {!! csrf_field() !!}
                    
                    <div class="form-group">
                        <label for="titulo">Título<span class="text-danger">*</span></label>
                        <input type="text" id="titulo" class="form-control" name="titulo" placeholder="Título do checkup" maxlength="150" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tipo">Tipo<span class="text-danger">*</span></label>
                        <input type="text" id="tipo" class="form-control" name="tipo" placeholder="Tipo do checkup" maxlength="150" required>
                    </div>
                    
                    <div class="form-group text-right m-b-0">
                        <button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
                        <a href="{{ route('tipo_atendimentos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
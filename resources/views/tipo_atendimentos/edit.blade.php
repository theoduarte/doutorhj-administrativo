@extends('layouts.master')

@section('title', 'Doctor HJ: Tipo de Atendimentos')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('tipo_atendimentos.index') }}">Lista de Tipos</a></li>
					<li class="breadcrumb-item active">Editar Tipo</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Editar Tipo</h4>
				
				<form action="{{ route('tipo_atendimentos.update', $tipo_atendimento->id) }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="cd_atendimento">Código<span class="text-danger">*</span></label>
						<input type="text" id="cd_atendimento" class="form-control" name="cd_atendimento" value="{{ $tipo_atendimento->cd_atendimento }}" placeholder="Código do Tipo de Atendimento" maxlength="3" required  >
					</div>
					
					<div class="form-group">
						<label for="ds_atendimento">Título<span class="text-danger">*</span></label>
						<input type="text" id="ds_atendimento" class="form-control" name="ds_atendimento" value="{{ $tipo_atendimento->ds_atendimento }}" placeholder="Título do Tipo de Atendimento" maxlength="150" required  >
					</div>
					
					<div class="form-group">
						<label for="tag_value">TAG (value)<span class="text-danger"></span></label>
						<input type="text" id="tag_value" class="form-control" name="tag_value" value="{{ $tipo_atendimento->tag_value }}" placeholder="Valor da tag nos campos de busca" maxlength="150">
					</div>
					
					<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    	<div class="row">
                            <div class="col-5">
                             	<label for="cs_status-a" class="control-label">Status<span class="text-danger">*</span></label>
                                <br>
                                <input type="radio" value="A" id="cs_status-a" name="cs_status" @if( $tipo_atendimento->cs_status == 'A' ) checked @endif autofocus style="cursor: pointer;">
                                <label for="cs_status-a" style="cursor: pointer;">Ativo</label>
             					<br>
                                <input type="radio" value="I" id="cs_status-i" name="cs_status" @if( $tipo_atendimento->cs_status == 'I' ) checked @endif autofocus style="cursor: pointer;">
                                <label for="cs_status-i" style="cursor: pointer;">Inativo</label>
                            </div>
                        </div>
                        <small>* A inativação apenas retira a opção dos campos de busca da landing page (Parte pública).</small>
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
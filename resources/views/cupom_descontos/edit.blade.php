@extends('layouts.master')

@section('title', 'Doutor HJ: Cupons de Desconto')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('cupom_descontos.index') }}">Lista de Cupons de Desconto</a></li>
					<li class="breadcrumb-item active">Editar Cupom de Desconto</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Editar Cupom de Desconto</h4>
				
				<form action="{{ route('cupom_descontos.update', $cupom_desconto->id) }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-9">
								<label for="titulo">Título<span class="text-danger">*</span></label>
								<input type="text" id="titulo" class="form-control" name="titulo" value="{{ $cupom_desconto->titulo }}" required maxlength="150" placeholder="Título do Cupom de Desconto"  >
							</div>
							<div class="col-md-3">
								<label for="codigo">Código<span class="text-danger">*</span></label>
								<input type="text" id="codigo" class="form-control" name="codigo" value="{{ $cupom_desconto->codigo }}" required maxlength="100" placeholder="Cód. do Cupom"  >
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="descricao">Descrição<span class="text-danger">*</span></label>
						<textarea id="descricao" class="form-control" name="descricao" placeholder="Descrição do Cupom de Desconto" >{{ $cupom_desconto->descricao }}</textarea>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="percentual">Percentual (%)<span class="text-danger">*</span></label>
								<input type="text" id="percentual" class="form-control" name="percentual" value="{{ $cupom_desconto->percentual }}" onkeypress="onlyNumbers(event)" required placeholder="Ex.: 50 para 50% ou 10 para 10%"  >
							</div>
							<div class="col-md-8">
								<label for="dt_inicio">Data início<span class="text-danger">*</span></label>
								<label for="dt_fim" style="float: right;">Data fim<span class="text-danger">*</span></label>
								<div class="input-daterange-datepicker input-group" id="date-range">
                                    <input type="text" id="dt1" class="form-control" name="dt_inicio" value="{{ $cupom_desconto->getDtInicio() }}" required placeholder="Início da Vigência"  >
                                    <input type="text" id="dt2" class="form-control" name="dt_fim" value="{{ $cupom_desconto->getDtFim() }}" required placeholder="Fim da Vigência"  >
                                </div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label for="cs_sexo">Sexo<span class="text-danger">*</span></label>
        						<select id="cs_sexo" class="form-control" name="cs_sexo" required>
        						<option value="T" @if($cupom_desconto->cs_sexo == 'T') selected="selected" @endif>Todos</option>
        						<option value="M" @if($cupom_desconto->cs_sexo == 'M') selected="selected" @endif>Masculino</option>
        						<option value="F" @if($cupom_desconto->cs_sexo == 'F') selected="selected" @endif>Feminino</option>
        						</select>
							</div>
							<div class="col-md-6">
								<label for="dt_nascimento">Limite de nascimento dos beneficiários<span class="text-danger">*</span></label>
								<input type="text" id="dt_nascimento" class="form-control input-datepicker" name="dt_nascimento" value="{{ $cupom_desconto->getDtNascimento() }}" required placeholder="Data de Nascimento" >
							</div>
							<div class="col-md-3">
								<label for="cs_status">Status<span class="text-danger">*</span></label>
        						<select id="cs_status" class="form-control" name="cs_status" required>
        						<option value="A" @if($cupom_desconto->cs_status == 'A') selected="selected" @endif >Ativo</option>
        						<option value="I" @if($cupom_desconto->cs_status == 'I') selected="selected" @endif >Inativo</option>
        						</select>
							</div>
						</div>
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('cupom_descontos.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
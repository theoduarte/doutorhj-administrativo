@extends('layouts.master')

@section('title', 'Doctor HJ: Cupons de Desconto')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('cupom_descontos.index') }}">Lista de Cupons de Desconto</a></li>
					<li class="breadcrumb-item active">Adicionar Cupom de Desconto</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Adicionar Cupom de Desconto</h4>
								
				<form action="{{ route('cupom_descontos.store') }}" method="post">
				
					{!! csrf_field() !!}
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-9">
								<label for="titulo">Título<span class="text-danger">*</span></label>
								<input type="text" id="titulo" class="form-control" name="titulo" required maxlength="150" placeholder="Título do Cupom de Desconto"  >
							</div>
							<div class="col-md-3">
								<label for="codigo">Código<span class="text-danger">*</span></label>
								<input type="text" id="codigo" class="form-control" name="codigo" required maxlength="100" placeholder="Cód. do Cupom"  >
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="descricao">Descrição<span class="text-danger">*</span></label>
						<textarea id="descricao" class="form-control" name="descricao" placeholder="Descrição do Cupom de Desconto" ></textarea>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label for="percentual">Percentual (%)<span class="text-danger">*</span></label>
								<input type="text" id="percentual" class="form-control" name="percentual" onkeypress="onlyNumbers(event)" required placeholder="Ex.: 50 para 50% ou 10 para 10%"  >
							</div>
							<div class="col-md-8">
								<label for="dt_inicio">Data início<span class="text-danger">*</span></label>
								<label for="dt_fim" style="float: right;">Data fim<span class="text-danger">*</span></label>
								<div class="input-daterange-datepicker input-group" id="date-range">
                                    <input type="text" id="dt1" class="form-control" name="dt_inicio" required placeholder="Início da Vigência"  >
                                    <input type="text" id="dt2" class="form-control" name="dt_fim" required placeholder="Fim da Vigência"  >
                                </div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label for="cs_sexo">Sexo<span class="text-danger">*</span></label>
        						<select id="cs_sexo" class="form-control" name="cs_sexo" required>
        						<option value="T">Todos</option>
        						<option value="M">Masculino</option>
        						<option value="F">Feminino</option>
        						</select>
							</div>
							<div class="col-md-6">
								<label for="dt_nascimento">Limite de nascimento dos beneficiários<span class="text-danger">*</span></label>
								<input type="text" id="dt_nascimento" class="form-control input-datepicker" name="dt_nascimento" required placeholder="Data de Nascimento" >
							</div>
							<div class="col-md-3">
								<label for="cs_status">Status<span class="text-danger">*</span></label>
        						<select id="cs_status" class="form-control" name="cs_status" required>
        						<option value="A">Ativo</option>
        						<option value="I">Inativo</option>
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
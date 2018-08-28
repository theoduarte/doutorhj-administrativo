@extends('layouts.master')

@section('title', 'Doutor HJ: termosCondicoes')

@section('container')
<div class="container-fluid">
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Cadastros</a></li>
					<li class="breadcrumb-item active">Termos e Condições</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Termos e Condições</h4>
				<p class="text-muted m-b-30 font-13">
					Listagem completa
				</p>
				
				<div class="row justify-content-between">
					<div class="col-8">
						<div class="form-group">
							<a href="{{ route('termos-condicoes.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i> Adicionar Termos e Condições</a>
						</div>
					</div>
				</div>
				
				<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
					<tr>
						<th>id</th>
						<th>Data Inicial</th>
						<th>Data Final</th>
						<th>Ações</th>
					</tr>
				@foreach($termosCondicoes as $termoCondicao)
				
					<tr>
						<td>{{$termoCondicao->id}}</td>
						<td>{{$termoCondicao->dt_inicial}}</td>
						<td>{{$termoCondicao->dt_final}}</td>
						<td>
							<a href="{{ route('termos-condicoes.show', $termoCondicao) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
							<a href="{{ route('termos-condicoes.edit', $termoCondicao) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
							<a href="{{ route('termos-condicoes.destroy', $termoCondicao) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o Termo e Condição"><i class="ti-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">{{ sprintf("%02d", $termosCondicoes->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $termosCondicoes->count()) }} Registro(s) exibido(s)</span>
                		{!! $termosCondicoes->appends(request()->input())->links() !!}
                	</div>
                </tfoot>
           </div>
       </div>
	</div>
</div>
@endsection
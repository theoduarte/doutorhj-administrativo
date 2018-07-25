@extends('layouts.master')

@section('title', 'Doctor HJ: Gestão de Checkups')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Cadastros</a></li>
					<li class="breadcrumb-item active">Gestão de Checkups</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Checkups</h4>
				<p class="text-muted m-b-30 font-13"></p>

                <div class="float-right">
                    <a href="{{ route('checkups.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i> Adicionar</a>
                </div>

				<br>
				
				<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
					<tr>
						<th>ID</th>
						<th>Título</th>
						<th>Tipo</th>
                        <th>Situação</th>
                        <th>Ações</th>
					</tr>
					@foreach ($checkups as $checkup)
						<tr>
    						<td>{{$checkup->id}}</td>
    						<td>{{$checkup->titulo}}</td>
    						<td>{{$checkup->tipo}}</td>
                            <td>{{$checkup->cs_status == 'A' ? "Ativo" : "Inativo"}}</td>
                            <td>
                                <a href="{{ route('checkups.show', $checkup) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
    							<a href="{{ route('checkups.configure', $checkup) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Editar"><i class="ti-settings"></i></a>
                                <a href="{{ route('checkups.edit', $checkup) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
                                <a href="{{ route('checkups.destroy', $checkup) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja inativar o checkup? {{$checkup->titulo}} {{$checkup->tipo}}"><i class="ti-trash"></i></a>
    						</td>
    					</tr>
					@endforeach
				</table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">
                			{{ sprintf("%02d", $checkups->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $checkups->count()) }} Registro(s) exibido(s)
                		</span>
                		{!! $checkups->links() !!}
                	</div>
                </tfoot>
           </div>
       </div>
	</div>
</div>
@endsection
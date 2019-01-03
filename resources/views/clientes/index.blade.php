@extends('layouts.master')

@section('title', 'DoutorHoje: Gestão de Clientes')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="clientes">Lista de Clientes</a></li>
					<li class="breadcrumb-item active">Gestão de Clientes</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Clientes</h4>
				<p class="text-muted m-b-30 font-13"></p>
				
				<div class="row justify-content-between">
					<div class="col-12"> 
						<form class="form-edit-add" role="form" action="{{ route('clientes.index') }}" method="get" enctype="multipart/form-data">
                    		{{ csrf_field() }}
                			
            				<div class="row">
            					<div class="col-4">
        				            <label for="tp_filtro_nome">Filtrar por:</label><br>
                                    <input type="radio" id="tp_filtro_nome" name="tp_filtro" value="nome" @if(old('tp_filtro')=='nome') checked @endif>
                                    <label for="tp_filtro_nome" style="cursor: pointer;">Nome&nbsp;&nbsp;&nbsp;</label>
                            
                                    <input type="radio" id="tp_filtro_email" name="tp_filtro" value="email" @if(old('tp_filtro')=='email') checked @endif>
                                    <label for="tp_filtro_email" style="cursor: pointer;">E-mail&nbsp;&nbsp;</label>
                                </div>
            				</div>
            				<div class="row">
            					<div class="col-4">
            						<input type="text" class="form-control" id="nm_busca" name="nm_busca" value="{{ old('nm_busca') }}">
            					</div>
      							<div style="width:150px !important;">
                					<input type="checkbox"  id="tp_usuario_somente_ativos" name="tp_usuario_somente_ativos" value="ativo" @if(old('tp_usuario_somente_ativos')=='ativo') checked @endif >
                					<label for="tp_usuario_somente_ativos" style="cursor: pointer;">Clientes Ativos</label>
                					<br>
                					<input type="checkbox"  id="tp_usuario_somente_inativos" name="tp_usuario_somente_inativos" value="inativo" @if(old('tp_usuario_somente_inativos')=='inativo') checked @endif>
                					<label for="tp_usuario_somente_inativos" style="cursor: pointer;">Clientes Inativos</label>
                				</div>
                				<div class="col-4" >
                					<button type="submit" class="btn btn-primary" id="btnPesquisar">Pesquisar</button>
                				</div>				
            				</div>
                    	</form>
					</div>
				</div>
				
				<br>
				
				<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
					<tr>
						<th>Usuário ID</th>
                        <th>Paciente ID</th>
                        <th>@sortablelink('nm_primario', 'Nome')</th>
						<th>@sortablelink('user.email', 'E-mail')</th>
						<th>Tipo Documento</th>
                        <th>Documento</th>
                        <th>Dt. Nasc.</th>
                        <th>Status Usuário</th>
						<th>Status Paciente</th>
						<th>Ações</th>
					</tr>
					@foreach ($pacientes as $paciente)
						<tr>
    						<td>{{ !empty($paciente->user) ? $paciente->user->id : null }}</td>
                            <td>{{ $paciente->id }}</td>
                            <td>{{ $paciente->nm_primario }} {{ $paciente->nm_secundario }} @if( !empty($paciente->responsavel_id) ) <small>({{ $paciente->responsavel->nm_primario . ' ' . $paciente->responsavel->nm_secundario }} - {{ $paciente->responsavel->id }})</small> @endif </td>
    						<td>{{ !empty($paciente->user) ? $paciente->user->email : null}}</td>
                            <td>{{ !empty($paciente->documentos[0]) ? $paciente->documentos[0]->tp_documento : null }}</td>
                	 		<td>{{ !empty($paciente->documentos[0]) ? $paciente->documentos[0]->te_documento : null }}</td>
                            <td>{{ $paciente->dt_nascimento }}</td>
                            <td>
                                @if( !empty($paciente->user) )
                   	 				@if( $paciente->user->cs_status == 'A' ) 
                   	 					Ativo
                   	 				@elseif( $paciente->user->cs_status == 'I' )
                   	 					Inativo
                   	 				@endif
                                @endif
                	 		</td>
							<td>
								@if( $paciente->cs_status == 'A' ) 
                                    Ativo
                                @elseif( $paciente->cs_status == 'I' )
                                    Inativo
                            	@endif</td>
    						<td>
                                @if( !empty($paciente->user) )
    							<a href="{{ route('clientes.show', $paciente->user->id) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
    							<a href="{{ route('clientes.edit', $paciente->user->id) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
    							<a href="{{ route('clientes.destroy', $paciente->user->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja inativar o cliente? {{$paciente->name}}"><i class="ti-trash"></i></a>
                                @endif
    						</td>
    					</tr>
					@endforeach
				</table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">
                			{{ sprintf("%02d", $pacientes->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $pacientes->count()) }} Registro(s) exibido(s)
                		</span>
                		{!! $pacientes->links() !!}
                	</div>
                </tfoot>
           </div>
       </div>
	</div>
</div>
@endsection
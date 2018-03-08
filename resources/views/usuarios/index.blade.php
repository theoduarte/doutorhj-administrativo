@extends('layouts.master')

@section('title', 'Doutor HJ: Gestão de Usuários')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Cadastros</a></li>
					<li class="breadcrumb-item active">Gestão de Usuários</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Gestão de Usuários</h4>
				<p class="text-muted m-b-30 font-13"></p>
				
				<div class="row justify-content-between">
					<div class="col-12"> 
						<form class="form-edit-add" role="form" action="{{ route('usuarios.index') }}" method="get" enctype="multipart/form-data">
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
                				<div  style="width: 120px !important;">
                					<input type="checkbox"  id="tp_usuario_cliente_paciente" name="tp_usuario_cliente_paciente" value="paciente" @if(old('tp_usuario_cliente_paciente')=='paciente') checked @endif>
                					<label for="tp_usuario_cliente_paciente" style="cursor: pointer;">Paciente</label>    
            
                					<label for="tp_usuario_cliente_profissional"></label><br>
                					<input type="checkbox"  id="tp_usuario_cliente_profissional" name="tp_usuario_cliente_profissional" value="profissional" @if(old('tp_usuario_cliente_profissional')=='profissional') checked @endif>
                					<label for="tp_usuario_cliente_profissional" style="cursor: pointer;">Profissional</label>
      							</div>
      							<div style="width: 160px !important;">
                					<input type="checkbox"  id="tp_usuario_somente_ativos" name="tp_usuario_somente_ativos" value="ativo" @if(old('tp_usuario_somente_ativos')=='ativo') checked @endif >
                					<label for="tp_usuario_somente_ativos" style="cursor: pointer;">Clientes Ativos</label>
            
                					<label for="tp_usuario_somente_inativos"></label><br>
                					<input type="checkbox"  id="tp_usuario_somente_inativos" name="tp_usuario_somente_inativos" value="inativo" @if(old('tp_usuario_somente_inativos')=='inativo') checked @endif>
                					<label for="tp_usuario_somente_inativos" style="cursor: pointer;">Clientes Inativos</label>
                				</div>
                				<div class="col-1" >
                					<button type="submit" class="btn btn-primary" id="btnPesquisar">Pesquisar</button>
                				</div>				
            				</div>
                    	</form>
					</div>
				</div>
				
				<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
					<tr>
						<th>@sortablelink('ID')</th>
						<th>@sortablelink('name', 'Nome')</th>
						<th>@sortablelink('email', 'E-mail')</th>
						<th>@sortablelink('ds_cargo', 'Tipo')</th>
						<th>@sortablelink('ds_cargo', 'Situação')</th>
						<th>Ações</th>
					</tr>
					@foreach ($usuarios as $usuario)
    					<tr>
    						<td>{{$usuario->id}}</td>
    						<td>{{$usuario->name}}</td>
    						<td>{{$usuario->email}}</td>
                	 		<td>
                	 			@switch( $usuario->tp_user )
                	 				@case('PAC')  Paciente 	    @Break
                	 				@case('PRO')  Profissional  @Break
                	 			@endswitch
                	 		</td>
               	 			<td>
                	 			@switch( $usuario->cs_status )
                	 				@case('A')  Ativo   @Break
                	 				@case('I')  Inativo @Break
                	 			@endswitch
                	 		</td>
    						<td>
    							<a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
    							<a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
    							<a href="{{ route('usuarios.destroy', $usuario->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o usuário? {{$usuario->name}}"><i class="ti-trash"></i></a>
    						</td>
    					</tr>
					@endforeach
				</table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">
                			{{ sprintf("%02d", $usuarios->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $usuarios->count()) }} Registro(s) exibido(s)
                		</span>
                		{!! $usuarios->links() !!}
                	</div>
                </tfoot>
           </div>
       </div>
	</div>
</div>
@endsection
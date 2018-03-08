@extends('layouts.painel')

@section('content')
    <h1 class="page-title">
    	<i class="voyager-group"></i> Locais de Atendimento
    </h1>
    
	@if( $permissoes['add'] )
    	<a href="/admin/prestadores/create" title="Editar" class="btn btn-sm btn-primary pull-right edit">
            <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Adicionar</span>
        </a>
    @endif
	
    <div class="page-content container-fluid">
    	<form class="form-edit-add" role="form" action="/admin/prestadores" method="get" enctype="multipart/form-data">
    		{{ csrf_field() }}
        	
    		<div class="panel">
    			<div class="panel-body" style="height:130px;">
    				<div class="col-md-5">
                        <div>
 				         	<label for="tp_filtro_nome">Filtrar por:</label><br>
                            <input type="radio" id="tp_filtro_nome" name="tp_filtro" value="razao_social" @if(old('tp_filtro')=='razao_social') checked @endif>
                            <label for="tp_filtro_nome" style="cursor: pointer;">Razão Social&nbsp;&nbsp;&nbsp;</label>
                    
                            <input type="radio" id="tp_filtro_email" name="tp_filtro" value="email" @if(old('tp_filtro')=='nome_fantasia') checked @endif>
                            <label for="tp_filtro_email" style="cursor: pointer;">Nome Fantasia&nbsp;&nbsp;</label>
                        </div>
                        
    				    <input type="text" class="form-control" id="nm_busca" name="nm_busca" value="{{ old('nm_busca') }}">
    				</div>
					<div class="col-md-3" style="width:250px;">
    					<input type="checkbox" id="consultas_domicilio" name="consultas_domicilio" value="consultas_domicilio" @if(old('consultas_domicilio')=='consultas_domicilio') checked @endif>
    					<label for="consultas_domicilio" style="cursor: pointer;">Consultas em Domicílio</label>    
						<br>
    					<input type="checkbox" id="consultas_consultorio" name="consultas_consultorio" value="consultas_consultorio" @if(old('consultas_consultorio')=='consultas_consultorio') checked @endif>
    					<label for="consultas_consultorio" style="cursor: pointer;">Consultas em Consultório</label>    
						<br>
    					<input type="checkbox" id="consultas_prontosocorro" name="consultas_prontosocorro" value="consultas_prontosocorro" @if(old('consultas_prontosocorro')=='consultas_prontosocorro') checked @endif>
    					<label for="consultas_prontosocorro" style="cursor: pointer;">Consultas em Pronto-Socorro</label>  
    					<br>
    					<input type="checkbox" id="cadastros_confirmar" name="cadastros_confirmar" value="cadastros_confirmar" @if(old('cadastros_confirmar')=='cadastros_confirmar') checked @endif>
    					<label for="cadastros_confirmar" style="cursor: pointer;">Cadastros a Confirmar</label>    
       				</div>
    				<div class="col-md-2">
    					<br>
    					<br>
    					<button type="submit" class="btn btn-primary">Pesquisar</button>
    				</div>
    			</div>
    		</div>
    	</form>
		
		<div class="panel">
			<div class="panel-body">
				<div class="col-md-12">
					
				</div>
			</div>
		</div>
    </div>
@stop
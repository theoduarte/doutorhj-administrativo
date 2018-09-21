@extends('layouts.master')

@section('title', 'Doutor HJ: Empresas')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('empresas.index') }}">Todas as Empresas</a></li>
					<li class="breadcrumb-item active">Empresas</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Planos</h4>
				<p class="text-muted m-b-30 font-13"></p>
				
				<div class="row ">
					<div class="col-12"> 
						<form class="form-edit-add" role="form" action="{{ route('empresas.index') }}" method="get" enctype="multipart/form-data">
                			
        					<div class="float-right">
        						<a href="{{ route('empresas.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i> Adicionar</a>
        					</div>	
            				<div class="row">
            					<div  style="width: 529px !important;">
        				            <label for="tp_filtro_cd_plano">Filtrar por:</label><br>
                                    <input type="radio" id="tp_filtro_cd_plano" name="tp_filtro" value="cd_plano" @if(old('tp_filtro')=='cd_plano') checked @endif>
                                    <label for="tp_filtro_cd_plano" style="cursor: pointer;">Código&nbsp;&nbsp;&nbsp;</label>
                            
                                    <input type="radio" id="tp_filtro_ds_plano" name="tp_filtro" value="ds_plano" @if(old('tp_filtro')=='ds_plano') checked @endif>
                                    <label for="tp_filtro_ds_plano" style="cursor: pointer;">Descricao&nbsp;&nbsp;</label>
                                </div>
            				</div>
            				<div class="row">
            					<div style="width: 510px !important;">
            						<input type="text" class="form-control" id="nm_busca" name="nm_busca" value="{{ old('nm_busca') }}">
            					</div>
                				<div class="col-1" >
                					<button type="submit" class="btn btn-primary" id="btnPesquisar"><i class="fa fa-search"></i> Pesquisar</button>
                				</div>				
            				</div>
                    	</form>
                    	<br>
					</div>
					
					<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
    					<tr>
    						<th>@sortablelink('id', 'Cód.')</th>
    						<th>@sortablelink('cd_plano', 'Código')</th>
    						<th>@sortablelink('ds_plano', 'Descricao')</th>
    						<th>Tipo de Plano</th>
    						<th>Ações</th>
    					</tr>
    					@foreach($empresas as $empresa)
						<tr>
    						<td>{{ sprintf("%04d", $plano->id) }}</td>
    						<td>{{$plano->cd_plano}}</td>
    						<td>{{$plano->ds_plano}}</td>
                	 		<td>
								@foreach($plano->tipoPlanos as $tipoPlano)
									{{$tipoPlano->descricao}}<br>
								@endforeach
							</td>
    						<td>
    							<a href="{{ route('empresas.show', $plano->id) }}"    class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
    							<a href="{{ route('empresas.edit', $plano->id) }}"    class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
    							<a href="{{ route('empresas.destroy', $plano->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o plano {{$plano->ds_plano}}?"><i class="ti-trash"></i></a>
    						</td>
    					</tr>
    					@endforeach
					</table>
                    <tfoot>	
                    	<div class="cvx-pagination">
                    		<span class="text-primary">
                    			{{ sprintf("%02d", $empresas->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $empresas->count()) }} Registro(s) exibido(s)
                    		</span>
                    		{!! $empresas->appends(request()->input())->links() !!}
                    	</div>
                    </tfoot>
				</div>
           </div>
       </div>
	</div>
</div>
@endsection
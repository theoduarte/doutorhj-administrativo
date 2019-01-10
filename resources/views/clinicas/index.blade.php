@extends('layouts.master')

@section('title', 'DoutorHoje: Prestadores')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('clinicas.index') }}">Todas as Clínicas</a></li>
					<li class="breadcrumb-item active">Clínicas</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Clínicas</h4>
				<p class="text-muted m-b-30 font-13"></p>
				
				<div class="row ">
					<div class="col-12"> 
						<form class="form-edit-add" role="form" action="{{ route('clinicas.index') }}" method="get" enctype="multipart/form-data">
                			
        					<div class="float-right">
        						<a href="{{ route('clinicas.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i> Adicionar</a>
        					</div>	
            				<div class="row">
            					<div class="col-md-4"  style="width: 529px !important;">
        				            <label for="tp_filtro_razao_social">Filtrar por:</label><br>
        				            <div class="row">
        				            	<div class="col-md-4">
        				            		<input type="checkbox" id="tp_filtro_razao_social" name="tp_filtro" data-plugin="switchery" data-color="#00b19d" data-size="small" value="nm_razao_social" @if(old('tp_filtro')=='nm_razao_social') checked @endif />
                                    		<label for="tp_filtro_razao_social" style="cursor: pointer; color: #00b19d;">Razão Social&nbsp;&nbsp;&nbsp;</label>
        				            	</div>
        				            	<div class="col-md-4">
        				            		<input type="checkbox" id="tp_filtro_nm_fantasia" name="tp_filtro_nm_fantasia" data-plugin="switchery" data-color="#3bafda" data-size="small" value="nm_fantasia" @if(old('tp_filtro_nm_fantasia')=='nm_fantasia') checked @endif />                            
                                    		<label for="tp_filtro_nm_fantasia" style="cursor: pointer; color: #3bafda;">Nome Fantasia&nbsp;&nbsp;</label>
        				            	</div>
        				            	<div class="col-md-4">
        				            		<input type="checkbox" id="tp_filtro_pre_cadastro" name="tp_filtro_pre_cadastro" data-plugin="switchery" data-color="#f76397" data-size="small" value="pre_cadastro" @if(old('tp_filtro_pre_cadastro')=='pre_cadastro') checked @endif />                            
                                    		<label for="tp_filtro_pre_cadastro" style="cursor: pointer; color: #f76397;">Pré-cadastro&nbsp;&nbsp;</label>
        				            	</div>
        				            </div>
                                </div>
                                <div class="col-md-5">
                                	<div class="row" style="padding-top: 15px;">
                                		<div style="width: 510px !important;">
                    						<input type="text" class="form-control" id="nm_busca" name="nm_busca" value="{{ old('nm_busca') }}">
                    					</div>
                        				<div class="col-1" >
                        					<button type="submit" class="btn btn-primary" id="btnPesquisar"><i class="fa fa-search"></i> Pesquisar</button>
                        				</div>
                                	</div>			
                				</div>
            				</div>
                    	</form>
                    	<br>
					</div>
					
					<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
    					<tr>
    						<th>@sortablelink('id', 'Cód.')</th>
    						<th>@sortablelink('nm_razao_social', 'Razão Social')</th>
    						<th>@sortablelink('nm_fantasia', 'Nome Fantasia')</th>
    						<th>@sortablelink('responsavel_id', 'Responsável')</th>
    						<th>UF</th>
    						<th>Contato</th>
    						<th>Ações</th>
    					</tr>
    					@foreach($prestadores as $prestador)
						<tr>
    						<td>{{ sprintf("%04d", $prestador->id) }}</td>
    						<td>{{$prestador->nm_razao_social}}</td>
    						<td>{{$prestador->nm_fantasia}}</td>
    						<td>{{ $prestador->responsavel->user->name }}</td>
    						<td>@if(sizeof($prestador->enderecos) > 0 && isset($prestador->enderecos->first()->cidade)){{ $prestador->enderecos->first()->cidade->sg_estado }} @endif</td>
                	 		<td>
                	 			@foreach($prestador->contatos as $contato)
                	 				{{$contato->ds_contato}}
                	 			@endforeach
                	 		</td>
    						<td>
    							<a href="{{ route('clinicas.show', $prestador->id) }}"    class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
    							<a href="{{ route('clinicas.edit', $prestador->id) }}"    class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
    							<a href="{{ route('clinicas.destroy', $prestador->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o prestador {{$prestador->nm_razao_social}}?"><i class="ti-trash"></i></a>
    						</td>
    					</tr>
    					@endforeach
					</table>
                    <tfoot>	
                    	<div class="cvx-pagination">
                    		<span class="text-primary">
                    			{{ sprintf("%02d", $prestadores->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $prestadores->count()) }} Registro(s) exibido(s)
                    		</span>
                    		{!! $prestadores->appends(request()->input())->links() !!}
                    	</div>
                    </tfoot>
				</div>
           </div>
       </div>
	</div>
</div>
@endsection
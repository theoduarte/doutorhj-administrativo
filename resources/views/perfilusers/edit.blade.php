@extends('layouts.master')

@section('title', 'Perfis de Usuário')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('perfilusers.index') }}">Lista de Perfis</a></li>
					<li class="breadcrumb-item active">Editar Perfil</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Editar Perfil</h4>
				
				<form action="{{ route('perfilusers.update', $perfiluser->id) }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
					
					<div class="form-group">
						<label for="titulo">Título<span class="text-danger">*</span></label>
						<input type="text" id="titulo" class="form-control" name="titulo" value="{{ $perfiluser->titulo }}" placeholder="Título do Menu" maxlength="150" required  >
					</div>
					
					<div class="form-group">
						<label for="tipo_permissao">Tipo de Permissão<span class="text-danger">*</span></label>
						<select id="tipo_permissao" class="form-control" name="tipo_permissao" placeholder="Selecione o Tipo de Permissão" required>
							<option value="1" @if( $perfiluser->tipo_permissao == 1 ) selected='selected' @endif >Administrador</option>
							<option value="2" @if( $perfiluser->tipo_permissao == 2 ) selected='selected' @endif>Operador DrHoje</option>
							<option value="3" @if( $perfiluser->tipo_permissao == 3 ) selected='selected' @endif>Prestador</option>
							<option value="4" @if( $perfiluser->tipo_permissao == 4 ) selected='selected' @endif>Cliente</option>
							<option value="5" @if( $perfiluser->tipo_permissao == 5 ) selected='selected' @endif>Empresa</option>
							<option value="6" @if( $perfiluser->tipo_permissao == 2 ) selected='selected' @endif>Diretor DrHoje</option>
							<option value="10" @if( $perfiluser->tipo_permissao == 10 ) selected='selected' @endif>Responsável</option>
						</select>
					</div>
					
					<div class="form-group">
						<label for="descricao">Descrição<span class="text-danger">*</span></label>
						<textarea id="descricao" class="form-control" name="descricao" placeholder="Descrição do Menu" required >{{ $perfiluser->descricao }}</textarea>
					</div>
					
					<!-- <div class="form-group">
						<label for="perfiluser_permissao">Permissões<span class="text-danger">*</span></label>
						<select id="perfiluser_permissao" name="perfiluser_permissaos2[]" class="multi-select cvx_select_multiple" multiple="" >
						@foreach($list_permissaos as $permissao)
							<option value="{{ $permissao->id }}"
								<?php foreach ($list_selecionadas_permissaos->permissaos as $pss):?>
								<?php if ($permissao->id == $pss->id):?> selected <?php endif;?>
								<?php endforeach;?>
							>
							{{ $permissao->titulo }}
							</option>
						@endforeach
						</select>
					</div> -->
					
					<div class="form-group">
						<label for="menu_perfiluser">Menus<span class="text-danger">*</span></label>
						<select id="menu_perfiluser" name="perfiluser_menus[]" class="multi-select cvx_select_multiple" multiple="" >
						@foreach($list_menus as $id => $titulo)
							<option value="{{ $id }}"
								<?php foreach ($list_selecionadas_menus->menus as $menu):?>
								<?php if ($id == $menu->id):?> selected <?php endif;?>
								<?php endforeach;?>
							>
							{{ $titulo }}
							</option>
						@endforeach
						</select>
					</div>
					
					<div class="form-group">
						<label for="menu_perfiluser">Permissões do Sistema<span class="text-danger">*</span></label>
						<div id="checkTree">
                            <ul>
                                <li>Painel Administrativo DoutorHoje
                                    <ul>
                                    	@foreach($list_permissaos_grouped as $titulo => $grouped)
                                        <li data-jstree='{"type":"tree_node", "opened":true}'>{{ ucfirst($titulo) }}
                                            <ul>
                                            	@foreach($grouped as $permissao)
                                                <li data-jstree='{@foreach($list_selecionadas_permissaos->permissaos as $pss) @if($permissao["id"] == $pss->id) "selected":true, @endif @endforeach "type":"tree_node"}'>{{ $permissao["titulo_novo"] }}<input type="checkbox" class="cb_item_tree_node" name="perfiluser_permissaos[]" value="{{ $permissao['id'] }}" @foreach($list_selecionadas_permissaos->permissaos as $pss) @if($permissao['id'] == $pss->id) checked="checked"  @endif @endforeach></li>                                                
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('perfilusers.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('layouts.master')

@section('title', 'Doctor HJ: Procedimentos')

@section('container')
<div class="container-fluid">
	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Cadastros</a></li>
					<li class="breadcrumb-item active">Procedimentos</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Procedimentos</h4>
				<p class="text-muted m-b-30 font-13">
					Listagem completa segundo o CBHPM
				</p>
				
				<div class="row justify-content-between">
					<div class="col-8">
						<div class="form-group">
							<a href="{{ route('procedimentos.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i> Adicionar Procedimento</a>
						</div>
					</div>				
					<div class="col-1">
						<div class="form-group text-right m-b-0">
							<a href="{{ route('procedimentos.index') }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" title="Limpar Busca"><i class="ion-close"></i> Limpar Busca</a>
						</div>
					</div>
					<div class="col-2">
						<div class="form-group float-right">
							<form action="{{ route('procedimentos.index') }}" id="form-search"  method="get">
								<div class="input-group bootstrap-touchspin">
									<input type="text" id="search_term" value="<?php echo isset($_GET['search_term']) ? $_GET['search_term'] : ''; ?>" name="search_term" class="form-control" style="display: block;">
									<span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
									<span class="input-group-btn"><button type="button" class="btn btn-primary bootstrap-touchspin-up" onclick="$('#form-search').submit()"><i class="fa fa-search"></i></button></span>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
					<tr>
						<th>@sortablelink('id')</th>
						<th>@sortablelink('cd_procedimento', 'Código')</th>
						<th>@sortablelink('ds_procedimento', 'Descrição')</th>
						<th>@sortablelink('tipoatendimento_id', 'Tipo Atendt.')</th>
						<th>@sortablelink('grupoprocedimento_id', 'Grupo Procedimento')</th>
						<th>Nomes Populares</th>
						<th>Ações</th>
					</tr>
					@foreach($procedimentos as $procedimento)
				
					<tr>
						<td>{{$procedimento->id}}</td>
						<td>{{$procedimento->cd_procedimento}}</td>
						<td>{{$procedimento->ds_procedimento}}</td>
						<td>@if($procedimento->tipoatendimento != null) {{ $procedimento->tipoatendimento->ds_atendimento }} @else <span class="text-danger"><strong><i class="ion-close-circled"></i> Não informado</strong></span> @endif</td>
						<td>@if($procedimento->grupoprocedimento != null) {{ $procedimento->grupoprocedimento->ds_grupo }} @else <span class="text-danger"><strong><i class="ion-close-circled"></i> Não informado</strong></span> @endif</td>
						<td>@if( isset($procedimento->tag_populars) && sizeof($procedimento->tag_populars) > 0 ) <ul class="list-profissional-especialidade">@foreach($procedimento->tag_populars as $tag) <li><i class="mdi mdi-check"></i> {{ $tag->cs_tag }}</li> @endforeach</ul> @else <span class="text-danger"> <i class="mdi mdi-close-circle"></i> NENHUMA TAG SELECIONADA</span>  @endif</td>
						<td>
							<a onclick="loadTags(this, {{ $procedimento->id }}, '{{$procedimento->ds_procedimento}}')" class="btn btn-icon waves-effect btn-success btn-sm m-b-5" data-toggle="tooltip" data-placement="left" title="Nomes Populares"><i class="mdi mdi-tag-multiple"></i></a>
							<a href="{{ route('procedimentos.show', $procedimento->id) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
							<a href="{{ route('procedimentos.edit', $procedimento->id) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
							<a href="{{ route('procedimentos.destroy', $procedimento->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o Procedimento: {{ $procedimento->cd_procedimento }}"><i class="ti-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">{{ sprintf("%02d", $procedimentos->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $procedimentos->count()) }} Registro(s) exibido(s)</span>
                		{!! $procedimentos->appends(request()->input())->links() !!}
                	</div>
                </tfoot>
           </div>
       </div>
	</div>
</div>
<div id="tags-populares-procedimento-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tagsModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" style="margin-top: -10%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="edit-profisisonal-title-modal">DrHoje: Lista de Nomes Populares</h4>
            </div>
            <div class="modal-body" style="padding: 0px;">
            	<div id="accordion" role="tablist" aria-multiselectable="true">
            		<div class="card">
            			<div class="card-header cvx-card-header" role="tab" id="headingOne">
            				<h5 class="mb-0 mt-0">
            					<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i></i> ADICIONAR NOME POPULAR</a>
            				</h5>
            			</div>
            			<div id="collapseOne"  class="collapse" role="tabpanel" aria-labelledby="headingOne">
            				<div class="card-body" style="padding-bottom: 0px;">
            					<div class="row">
            						<div class="col-md-12">
            							<div class="form-group">
            								<input type="text" id="cs_tag" class="form-control" maxlength="150" placeholder="Informe um Nome Popular e clique em Salvar">
            								<input type="hidden" id="ct_tag_id" >
            								<input type="hidden" id="tag_atendimento_id" >
            								<input type="hidden" id="tag_tipo_atendimento" value="proced" >
            							</div>
            						</div>
            					</div>
            					<div class="row">
            						<div class="col-md-12">
            							<div class="modal-footer">
            							<button type="button" class="btn btn-sm btn-secondary waves-effect waves-light" onclick="$('#cs_tag').val('');$('#ct_tag_id').val('');"><i class="mdi mdi-tag-plus"></i> Nova Tag</button>
							                <button type="button" id="btn-save-tag" class="btn btn-sm btn-primary waves-effect waves-light" onclick="addTagPopular(this)"><i class="mdi mdi-content-save"></i> Salvar</button>
							            </div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            		
            		<div class="card">
            			<div class="card-header cvx-card-list" role="tab" id="headingTwo">
            				<h5 class="mb-0 mt-0">
            					<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><i class="ion-clipboard"></i> NOME POPULARES PARA: <br><strong><span id="tag_procedimento"></span></strong></a>
            				</h5>
            			</div>
            			<div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo">
            				<div class="card-body" style="padding: 0px;">
            					<div class="row">
            						<div class="col-md-12">
            							<div class="form-group">
            								<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
            									<tr>
            										<th style="width: 20px; text-align: center;"><i class="ion-pound"></i></th>
            										<th>Nome Popular</th>
            										<th style="width: 40px;">(+)</th>
            										<th style="width: 40px;">(-)</th>
            									</tr>
            									<tbody id="list-all-tags-populares"></tbody>
            								</table>
            							</div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
function loadTags(element, procedimento_id, nome_procedimento) {
    
	$('#tag_procedimento').html(nome_procedimento);
	$('#tag_atendimento_id').val(procedimento_id);

	jQuery.ajax({
		type: 'GET',
		dataType: "json",
        url: '/load-tag-popular',
        data: {
			'tag_atendimento_id': procedimento_id,
			'tipo_tag': 'proced'
		},
        success: function (result) {
            
            if(result.status) {

	            var list_tag_popular = JSON.parse(result.list_tag_popular);

	            var num_tags = list_tag_popular.length;

	            $('#list-all-tags-populares').empty();
	            
	            for(var i = 0; i < num_tags; i++) {

		            var index = i+1;
		            var tag_id = list_tag_popular[i].id;
		            var cs_tag = list_tag_popular[i].cs_tag;
		            
	            	var content_item = '<tr> \
		      	  		<td class="num_filial">'+tag_id+'</td> \
		        		<td>'+cs_tag+'</td> \
		        		<td><button type="button" class="btn btn-success waves-effect waves-light btn-sm m-b-5" title="Editar Tag Popular" onclick="editTagPopular(this)" style="margin-top: 2px;"><i class="ion-edit"></i></button></td> \
		        		<td><button type="button" class="btn btn-danger waves-effect waves-light btn-sm m-b-5" title="Remover Tag Popular" onclick="removerTagPopular(this, '+"'"+cs_tag+"'"+', '+tag_id+')" style="margin-top: 2px;"><i class="ion-trash-a"></i></button></td> \
		        	</tr>';

	            	 $('#list-all-tags-populares').append(content_item);
	            	    
	            }

	            $('#cs_tag').val('');
	            $("#tags-populares-procedimento-modal").modal();
                 
            }
        },
        error: function (result) {
        	
            swal(({
	            title: "Oops",
	            text: "Falha na operação!",
	            type: 'error',
	            confirmButtonClass: 'btn btn-confirm mt-2'
			}));
        }
	});
}

function addTagPopular(input) {
    
	if( $('#cs_tag').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'O Nome popular é campo obrigatório. Por favor, tente novamente.'); return false; }
	if( $('#tag_atendimento_id').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Atendimento não localizado. Por favor, tente novamente.'); return false; }

	$(input).html('<i class="fa fa-spin fa-spinner"></i> Enviando...');
	
	var cs_tag = $('#cs_tag').val();
	var tag_id = $('#ct_tag_id').val();
	var tag_atendimento_id = $('#tag_atendimento_id').val();
	var tag_tipo_atendimento = $('#tag_tipo_atendimento').val();
	
	jQuery.ajax({
		type: 'POST',
		url: '/add-tag-popular',
		data: {
			'tag_id': tag_id,
			'cs_tag': cs_tag,
			'tag_atendimento_id': tag_atendimento_id,
			'tipo_atendimento': tag_tipo_atendimento,
			'_token': laravel_token
		},
        success: function (result) {

        	$(input).html('<i class="mdi mdi-content-save"></i> Salvar');
            
            if(result.status) {

	            var tag_popular = JSON.parse(result.tag_popular);

	            var num_elements = $('#list-all-tags-populares tr').length;
	          	num_elements++;

	            var content = '<tr> \
	      	  		<td class="num_filial">'+tag_popular.id+'</td> \
	        		<td>'+tag_popular.cs_tag+'</td> \
	        		<td><button type="button" class="btn btn-success waves-effect waves-light btn-sm m-b-5" title="Editar Tag Popular" onclick="editTagPopular(this)" style="margin-top: 2px;"><i class="ion-edit"></i></button></td> \
	        		<td><button type="button" class="btn btn-danger waves-effect waves-light btn-sm m-b-5" title="Remover Tag Popular" onclick="removerTagPopular(this, '+"'"+tag_popular.cs_tag+"'"+', '+tag_popular.id+')" style="margin-top: 2px;"><i class="ion-trash-a"></i></button></td> \
	        	</tr>';

	            $('#list-all-tags-populares').append(content);
	            $('#cs_tag').val('');

	            //$.Notification.notify('success','top right', 'DrHoje', result.mensagem);

	            swal({
                    title: 'DoctorHoje',
                    text: result.mensagem,
                    type: 'success',
                    confirmButtonClass: 'btn btn-confirm mt-2',
                    confirmButtonText: 'OK'
                }).then(function () {
               	 $('.modal').removeClass('in').attr("aria-hidden","true").off('click.dismiss.modal').removeClass('show');
                    $('.modal').css("display", "none");
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open');
                    window.location.reload(false); 
                });
                 
            } else {
            	swal(({
    	            title: "Oops",
    	            text: result.mensagem,
    	            type: 'error',
    	            confirmButtonClass: 'btn btn-confirm mt-2'
    			}));
            }
        },
        error: function (result) {
        	$(input).html('<i class="mdi mdi-content-save"></i> Salvar');
        	
            swal(({
	            title: "Oops",
	            text: "Falha na operação!",
	            type: 'error',
	            confirmButtonClass: 'btn btn-confirm mt-2'
			}));
        }
	});
}

function editTagPopular(element) {

	var ct_tag_id = $(element).parent().parent().find('td:nth-child(1)').html();
	var cs_tag = $(element).parent().parent().find('td:nth-child(2)').html();

	$('#ct_tag_id').val(ct_tag_id);
	$('#cs_tag').val(cs_tag);

	if($('.cvx-card-header').find('a').hasClass('collapsed')) {
		$('.cvx-card-header').find('a').trigger("click");
	}
}

function removerTagPopular(input, cs_tag, tag_id) {

	if(tag_id.length == 0) {

    	swal({
	            title: 'DoctorHoje: Alerta!',
	            text: "Nenhum Nome popular foi selecionado!",
	            type: 'warning',
	            confirmButtonClass: 'btn btn-confirm mt-2'
	        }
	    );
        return false;
    }
	
	var mensagem = 'Tem certeza que deseja remover o Nome popular: '+cs_tag;
    swal({
        title: mensagem,
        text: "O Registro será removido da lista",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-confirm mt-2',
        cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Cancelar'
    }).then(function () {

    	$(input).find('i').removeClass('ion-trash-a').addClass('fa fa-spin fa-spinner');

    	jQuery.ajax({
    		type: 'POST',
    	  	url: '/delete-tag-popular',
    	  	data: {
    		  	'tag_id': tag_id,
    			'_token': laravel_token
    		},
    		success: function (result) {

    			if( result.status) {
    				
    				swal({
                        title: 'DoctorHoje',
                        text: result.mensagem,
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    }).then(function () {
                    	$(input).parent().parent().css('background-color', '#ffbfbf');
            			$(input).parent().parent().fadeOut(400, function(){
            		    	$(input).parent().parent().remove();
            		    });
            	    	
            	        /* swal({
            	                title: 'Concluído !',
            	                text: "O Nome Popular foi excluído com sucesso",
            	                type: 'success',
            	                confirmButtonClass: 'btn btn-confirm mt-2'
            	            }
            	        ); */

            			window.location.reload(false);
                    });
    				
    			} else {
    				$.Notification.notify('error','top right', 'DoctorHoje', result.mensagem);
    			}

    			$(input).find('i').removeClass('fa fa-spin fa-spinner').addClass('ion-trash-a');
            },
            error: function (result) {
            	$(input).find('i').removeClass('fa fa-spin fa-spinner').addClass('ion-trash-a');
            	$.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
            }
    	});
    });
}
</script>
@endpush
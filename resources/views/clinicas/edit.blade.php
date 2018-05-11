@extends('layouts.master')

@section('title', 'Clínicas')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('clinicas.index') }}">Lista de Clínicas</a></li>
					<li class="breadcrumb-item active">Cadastrar Clínicas</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<form action="{{ route('clinicas.update', $prestador->id) }}" method="post">
		<input type="hidden" name="_method" value="PUT">
		{!! csrf_field() !!}
    	
    	<div class="row">
	        <div class="col-12">
                <div class="card-box col-12">
                    <h4 class="header-title m-t-0 m-b-30">Clínicas</h4>
    
                    <ul id="cvx-tab" class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#prestador" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                Dados do Prestador
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#precificacaoProcedimento" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Precificação de Procedimentos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#precificacaoConsulta" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Precificação de Consultas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#corpoClinico" data-toggle="tab" aria-expanded="false" class="nav-link">
                                Corpo Clínico
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="prestador">
                        	@include('clinicas/tab_dados_prestador_edit')
                        </div>
                        <div class="tab-pane fade" id="precificacaoProcedimento">
                         	@include('clinicas/precificacaoProcedimento')
                        </div>
                        <div class="tab-pane fade" id="precificacaoConsulta">
                         	@include('clinicas/precificacaoConsulta')
                        </div>
                        <div class="tab-pane fade" id="corpoClinico">
                         	@include('clinicas/tab_corpo_clinico')
                        </div>
                    </div>
                </div>
       		</div>
    	</div>
   </form>
</div>
@push('scripts')
	<script type="text/javascript">
	jQuery(document).ready(function($) {

		$('button[data-toggle="modal"]').on('click', function() {
			 $('input.form-control').val('');
			 $('select.form-control').prop('selectedIndex',0);
			 $('#edit-profisisonal-title-modal').html('Adicionar Profissional');
			 $('#profisisonal-type-operation').val('add');
		});
		
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
	        localStorage.setItem('activeTab', $(e.target).attr('href'));
	    });
	    
	    var activeTab = localStorage.getItem('activeTab');
	    if(activeTab){
	        $('#cvx-tab a[href="' + activeTab + '"]').tab('show');
	    }

	    $('body').on('hidden.bs.modal', '.modal', function () {
	        $(this).removeData('bs.modal');
	    });

	    $( "#nr_cep" ).blur(function() {
	    	jQuery.ajax({
        		type: 'GET',
        	  	url: '/consulta-cep/cep/'+this.value,
        	  	data: {
					'nr_cep': this.value,
					'_token': laravel_token
				},
				success: function (result) {
					$( this ).addClass( "done" );

					if( result != null) {
						var json = JSON.parse(result.endereco);

						$('#te_endereco').val(json.logradouro);
						$('#te_bairro').val(json.bairro);
						$('#nm_cidade').val(json.cidade);
						$('#sg_logradouro').val(json.tp_logradouro);
						$('#sg_estado').val(json.estado);
						$('#cd_cidade_ibge').val(json.ibge);
						$('#nr_latitude_gps').val(json.latitude);
						$('#nr_longitute_gps').val(json.longitude);
						
					} else {

						$('#te_endereco').val('');
						$('#te_bairro').val('');
						$('#nm_cidade').val('');
						$('#sg_logradouro').prop('selectedIndex',0);
						$('#sg_estado').val('');
						$('#cd_cidade_ibge').val('');
						$('#sg_logradouro').prop('selectedIndex',0);
						$('#nr_latitude_gps').val('');
						$('#nr_longitute_gps').val('');
					}
	            },
	            error: function (result) {
	            	$.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
	            }
        	});
		});
		
		$('#btn-save-profissional').click(function(){

			var clinica_id = $('#clinica_id').val();
			var nm_primario = $('#nm_primario').val();
			var nm_secundario = $('#nm_secundario').val();
			var cs_sexo = $('#cs_sexo').val();
			var dt_nascimento = $('#dt_nascimento').val();
			var cs_status = $('#cs_status').val();
			//var especialidade_profissional = $('#especialidade_profissional').val();
			
			var especialidade_profissional = new Array();
			$('#especialidade_profissional :selected').each(function(i, selected) {
				especialidade_profissional[i] = $(selected).val();
			});
			
			var tp_profissional = $('#tp_profissional').val();
			var profissional_id = $('#profissional_id').val();
			var tp_documento_profissional = $('#tp_documento_profissional').val();
			var te_documento_profissional = $('#te_documento_profissional').val();

			if( nm_primario.length == 0 ) { $('#nm_primario').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; } 
			if( nm_secundario.length == 0 ) { $('#nm_secundario').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; }
			if( dt_nascimento.length == 0 ) { $('#dt_nascimento').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; }
			if( te_documento_profissional.length == 0 ) { $('#te_documento_profissional').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; }
			if( especialidade_profissional.length == 0 ) { $('#especialidade_profissional').parent().addClass('has-error').append('<span class="help-block text-danger"><strong>Campo Obrigatório!</strong></span>'); return false; }

			var tp_operation = $('#profisisonal-type-operation').val();
			
			jQuery.ajax({
				type: 'POST',
				url: '/add-profissional',
				data: {
					'clinica_id': clinica_id,
					'nm_primario': nm_primario,
					'nm_secundario': nm_secundario,
					'cs_sexo': cs_sexo,
					'dt_nascimento': dt_nascimento,
					'cs_status': cs_status,
					'especialidade_profissional': especialidade_profissional,
					'tp_profissional': tp_profissional,
					'profissional_id': profissional_id,
					'tp_documento': tp_documento_profissional,
					'te_documento': te_documento_profissional,
					'_token': laravel_token
				},
	            success: function (result) {
		            if(result.status) {

		            	var profissional = JSON.parse(result.profissional);
		            	
		            	 swal({
		                     title: 'DrHoje',
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

		                 if(tp_operation == 'add') {
		                	 $tr = '<tr id="tr-'+profissional.id+'">\
				                 <td>'+profissional.id+'</td>\
				                 <td>'+profissional.nm_primario+' '+profissional.nm_secundario+'</td>\
				                 <td></td>\
				                 <td>'+profissional.updated_at+'</td>\
				                 <td>\
				                 	<a href="#" onclick="openModal('+profissional.id+')" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>\
				                 	<a onclick="deleteProfissional(this, '+profissional.nm_primario+''+profissional.nm_secundario+', '+profissional.id+')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i></a>\
				                 </td>\
				                 </tr>';

			                 $('#table-corpo-clinico  > tbody > tr:first').after($tr);
		                 } else if (tp_operation == 'edit') {
							$('#tr-'+profissional.id).find('td:nth-child(2)').html(profissional.nm_primario+' '+profissional.nm_secundario);
							$('#tr-'+profissional.id).find('td:nth-child(3)').html();
							$('#tr-'+profissional.id).find('td:nth-child(4)').html(profissional.updated_at);
						}
		                 
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
	                swal(({
        	            title: "Oops",
        	            text: "Falha na operação!",
        	            type: 'error',
        	            confirmButtonClass: 'btn btn-confirm mt-2'
        			}));
	            }
			});
		});
	});

	function openModal(profissional_id) {
		$('input.form-control').val('');
		$('select.form-control').prop('selectedIndex',0);
		$('#edit-profisisonal-title-modal').html('Editar Profissional');
		$('#profisisonal-type-operation').val('edit');

		jQuery.ajax({
			type: 'POST',
			url: '/view-profissional',
			data: {
				'profissional_id': profissional_id,
				'_token': laravel_token
			},
            success: function (result) {
                
                var profissional = JSON.parse(result.profissional);
                
	            if(result.status) {
	            	$('#con-close-modal').find('#profissional_id').val(profissional.id);
		            $('#con-close-modal').find('#nm_primario').val(profissional.nm_primario);	
		            $('#con-close-modal').find('#nm_secundario').val(profissional.nm_secundario);
		            $('#con-close-modal').find('#cs_sexo').val(profissional.cs_sexo);
		            $('#con-close-modal').find('#dt_nascimento').val(profissional.dt_nascimento);
		            $('#con-close-modal').find('#tp_profissional').val(profissional.tp_profissional);
		            $('#con-close-modal').find('#tp_documento_profissional').val(profissional.tp_documento);
		            $('#con-close-modal').find('#te_documento_profissional').val(profissional.te_documento);
		            
		            if(profissional.documentos.length > 0) {
		            	$('#con-close-modal').find('#tp_documento_profissional').val(profissional.documentos[0].tp_documento);
			            $('#con-close-modal').find('#te_documento_profissional').val(profissional.documentos[0].te_documento);
		            }

		            $('#con-close-modal').find("#especialidade_profissional option:selected").prop("selected", false);
		            for(var i = 0; i < profissional.especialidades.length > 0; i++) {

		            	$('#con-close-modal').find("#especialidade_profissional option").each(function(){
			            	if($(this).val() == profissional.especialidades[i].id) {
				            	$(this).prop("selected", true);
			            	}
			            });
		            	//$('#con-close-modal').find('#especialidade_profissional').val(profissional.especialidade_id);
		            }

		            $('#con-close-modal').find("#especialidade_profissional").trigger('change.select2');
		            
	            }
            },
            error: function (result) {
                $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
            }
		});
		 
		$("#con-close-modal").modal();
	}

	function deleteProfissional(element, profissional_nome, profissional_id) {
    	
    	var mensagem = 'DrHoje';
        swal({
            title: mensagem,
            text: 'O Profissional "'+profissional_nome+'" será movido da lista',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-confirm mt-2',
            cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Cancelar'
        }).then(function () {
            
        	jQuery.ajax({
    			type: 'POST',
    			url: '/delete-profissional',
    			data: {
    				'profissional_id': profissional_id,
    				'_token': laravel_token
    			},
                success: function (result) {
                    
                    var profissional = JSON.parse(result.profissional);
                    
    	            if(result.status) {
    	            	$(element).parent().parent().remove();
    	            	$.Notification.notify('success','top right', 'DrHoje', result.mensagem);
    	            }
                },
                error: function (result) {
                    $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
                }
    		});
    		
        });
	}
	</script>
    @endpush
@endsection
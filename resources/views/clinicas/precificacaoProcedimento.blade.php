@if($errors->any())
    <div class="col-12 alert alert-danger">
        @foreach ($errors->all() as $error)<div class="col-5">{{ $error }}</div>@endforeach
    </div>
@endif
<div class="form-group">

    <form method="post" action="{{ route('add-precificacao-procedimento',$prestador) }}" id="form-add-consulta">
        {!! csrf_field() !!}
    	<div class="row">
            <div class="col-4">
                <label for="ds_procedimento" class="control-label">Descrição Procedimento<span class="text-danger">*</span></label>
                <input id="ds_procedimento" type="text" class="form-control" name="ds_procedimento" value="{{ old('ds_procedimento') }}" placeholder="Informe a Descrição do Procedimento para buscar" autofocus maxlength="100" required>
                <input type="hidden" id="cd_procedimento" name="cd_procedimento" value="" required>
                <input type="hidden" id="descricao_procedimento" name="descricao_procedimento" value="">
                <input type="hidden" id="procedimento_id" name="procedimento_id" value="">
            </div>
			<div class="col-2">
				<label for="plano_id" class="control-label">Plano<span class="text-danger">*</span></label>
				<select id="plano_id" class="select2" name="plano_id" data-placeholder="Selecione ..." required>
					<option></option>
					@foreach($planos as $id=>$plano)
						<option value="{{ $id }}" @if ( old('plano_id') == $id) selected  @endif>{{$plano}}</option>
					@endforeach
				</select>
			</div>
			<div class="col-2">
				<label for="data-vigencia">Vigência do Preço:<span class="text-danger"></span></label>
				<input type="text" class="form-control input-daterange" id="data-vigencia" name="data-vigencia" value="{{ old('data') }}" autocomplete="off">
			</div>
			<div class="col-2">
				<label for="vl_com_procedimento" class="control-label">Valor Comercial (R$)<span class="text-danger">*</span></label>
				<input id="vl_com_procedimento" type="text" class="form-control mascaraMonetaria" name="vl_com_procedimento" value="{{ old('vl_com_procedimento') }}"  maxlength="15" required>
			</div>
			<div class="col-2">
				<label for="vl_net_procedimento" class="control-label">Valor NET (R$)<span class="text-danger">*</span></label>
				<input id="vl_net_procedimento" type="text" class="form-control mascaraMonetaria" name="vl_net_procedimento" value="{{ old('vl_net_procedimento') }}"  maxlength="15" required>
			</div>
    	</div>
		<div class="row" style="margin-top: 10px;">
			<div class="col-12">
				<div class="pull-right">
					<button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Salvar</button>
					<a onclick="limparProcedimento()" class="btn btn-icon btn-danger" title="Limpar Procedimento"><i class="mdi mdi-close"></i> Limpar</a>
				</div>
			</div>
		</div>
    </form>
    <br>
    <hr>
	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-md-4">
					<span class="text-primary">{{ sprintf("%02d", $total_procedimentos) }} Procedimento(s) encontrado(s) e {{ sprintf("%02d", sizeof($precoprocedimentos)) }} Procedimento(s) exibido(s)</span>
				</div>
				<div class="col-md-4 offset-md-4">
					<form id="form-busca-proced" action="{{ route('clinicas.edit', $prestador->id) }}" method="get" enctype="multipart/form-data">
						<div class="row" style="padding-bottom: 5px;">
							<div class="col-1" >
								<a href="{{ route('clinicas.edit', $prestador->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" title="Limpar Busca"><i class="ion-close"></i></a>
							</div>
							<div style="width: 395px !important; margin-left: 8px;">
								<input type="text" class="form-control" id="nm_busca_proced" name="nm_busca_proced" value="@if(!empty($_GET['nm_busca_proced'])){{$_GET['nm_busca_proced']}}@endif" placeholder="Digite o código ou nome do procedimento" required="required">
							</div>
							<div class="col-1" >
								<button type="submit" class="btn btn-primary" id="btn-pesquisar-proced"><i class="fa fa-search"></i> Pesquisar</button>
							</div>
	                    </div>
                    </form>
				</div>
			</div>
    		<table id="tblPrecosProcedimentos" name="tblPrecosProcedimentos" class="table table-striped table-bordered table-doutorhj">
        		<tr>
					<th width="12">Id</th>
					<th width="80">Código</th>
					<th width="380">Procedimento</th>
					<th class="text-left" style="width: 400px;">Locais Disponíveis</th>
					<th width="300">Nomes Populares</th>
					<th>
						<table class="table">
							<tr>
								<th class="text-nowrap">Plano</th>
								<th class="text-nowrap">Vl. Com.</th>
								<th class="text-nowrap">Vl. NET</th>
								<th class="text-nowrap">Vigência</th>
								<th>Ação</th>
							</tr>
						</table>
					</th>
					<th width="10">Ação</th>
				</tr>
    			@foreach( $precoprocedimentos as $atendimento )
    				<tr id="tr-{{$atendimento->id}}">
    					<td>{{$atendimento->id}} <input type="hidden" class="procedimento_id" value="{{ $atendimento->procedimento->id }}"></td>
    					<td class="text-nowrap"><a href="{{ route('procedimentos.show', $atendimento->procedimento->id) }}" title="Exibir" class="btn-link text-primary"><i class="ion-search"></i> {{$atendimento->procedimento->cd_procedimento}}</a></td>
    					<td>{{$atendimento->ds_preco}}</td>
    					<td>@if( isset($atendimento->filials) && sizeof($atendimento->filials) > 0 ) <ul class="list-profissional-especialidade">@foreach($atendimento->filials as $filial) <li><i class="mdi mdi-check"></i> @if($filial->eh_matriz == 'S') (Matriz) @endif {{ $filial->nm_nome_fantasia }}</li> @endforeach</ul> @else <span class="text-danger"> <i class="mdi mdi-close-circle"></i> NENHUMA FILIAL SELECIONADA</span>  @endif</td>
    					<td>@if( isset($atendimento->procedimento->tag_populars) && sizeof($atendimento->procedimento->tag_populars) > 0 ) <ul class="list-profissional-especialidade">@foreach($atendimento->procedimento->tag_populars as $tag) <li><i class="mdi mdi-check"></i> {{ $tag->cs_tag }}</li> @endforeach</ul> @else <span class="text-danger"> <i class="ion-close-circled"></i></span>  @endif</td>
    					<td>
							<table class="table">
								@foreach($atendimento->precos as $preco)
									<tr>
										<td>{{$preco->plano->ds_plano}}</td>
										<td>{{$preco->vl_comercial}}</td>
										<td>{{$preco->vl_net}}</td>
										<td>{{$preco->data_inicio->format('d/m/Y')}}<br>{{$preco->data_fim->format('d/m/Y')}}</td>
										<td class="text-nowrap">
											<button type="button" class="btn btn-sm btn-default" title="Editar Preço" onclick="loadDataPreco({{$preco->id}})"><i class="mdi mdi-lead-pencil"></i></button>
											<button type="button" class="btn btn-sm btn-danger" title="Exluir Preço" onclick="delLinhaPreco('{{$preco->id}}', '{{$preco->plano->ds_plano}}')"><i class="ti-trash"></i></button>
										</td>
									</tr>
								@endforeach
							</table>
						</td>
    					<td>
    						<a onclick="loadDataProcedimento(this, '{{ $atendimento->id }}')" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar Atendimento"><i class="mdi mdi-lead-pencil"></i> Editar</a>
	                 		<a onclick="delLinhaProcedimento(this, '{{ $atendimento->ds_preco }}', '{{ $atendimento->id }}')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir Atendimento"><i class="ti-trash"></i> Excluir</a>
    					</td>
    				</tr>
				@endforeach 
        	</table>
        	<span id="cvx-procedimento-pagination"></span>
        </div>
	</div>
</div>
<div id="profissional-procedimento-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ProfissionalProcedimentoModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="edit-atendimento-title-modal">DrHoje: Editar Procedimento</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('edit-precificacao-procedimento', $prestador ) }}"  id="form-edit-procedimento">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="atendimento_id" id="atendimento_id_edit" value="" required>
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cd_procedimento_edit" class="control-label">Código do Procedimento</label>
                                <input type="text" id="cd_procedimento_edit" class="form-control" name="cd_procedimento_edit" placeholder="Código do Procedimento" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ds_procedimento_edit" class="control-label">Descrição</label>
                                <input type="text" id="ds_procedimento_edit" class="form-control" name="ds_procedimento" placeholder="Descrição do Procedimento" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="atendimento_filial" class="control-label">Locais de Atendimento</label>
                                <select id="atendimento_filial" class="select2 select2-multiple" name="atendimento_filial[]" multiple="multiple" multiple data-placeholder="Selecione ..." required>
                                    <option value="all"><strong>-- Todos os Locais --</strong></option>
                                	@foreach($list_filials as $filial)
    								    <option value="{{ $filial->id }}">@if($filial->eh_matriz == 'S') (Matriz) @endif {{ $filial->nm_nome_fantasia }}</option>
    								@endforeach  
                                </select>
                            </div>
                        </div>
                    </div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-content-save"></i> Salvar</button>
						<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="mdi mdi-cancel"></i> Cancelar</button>
					</div>
            	</form>
			</div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(function(){
		
        $( "#ds_procedimento" ).autocomplete({
              source: function( request, response ) {
                  $.ajax( {
                      url      : "/procedimentos/consulta/" + $('#ds_procedimento').val(),
                      dataType : "json",
                      success  : function( data ) {
                        response( data );
                      }
                  });
              },
              minLength : 2,
              select: function(event, ui) {
                    arProcedimento = ui.item.id.split(' | ');
                  
                    $('#procedimento_id').val(arProcedimento[0]);
                    $('#cd_procedimento').val(arProcedimento[1]);
                    $('#descricao_procedimento').val(arProcedimento[2]);
              }
        });

        $('#cvx-procedimento-pagination').pagination({
            items: {{$total_procedimentos}},
            itemsOnPage: {{$limit}},
            hrefTextPrefix: '?page_proced=',
            hrefTextSuffix: '&sort_proced={{$sort_proced}}&direction_proced={{$direction_proced}}',
            currentPage: {{$ct_page_proced}},
            prevText: '<<',
            nextText: '>>',
            cssStyle: 'comvex-theme'
        });
        

        $('#con-close-modal').find("#filial_profissional").trigger('change.select2');
    });

	function loadDataPreco(precoId)
	{
		jQuery.ajax({
			type: 'GET',
			url: '/load-data-preco/'+precoId,
			success: function (result) {
				if(result.status) {
					var preco = JSON.parse(result.preco);

					var route = '{{route('precos.update', 'precoId')}}';
					route = route.replace('precoId', precoId);

					$('#form-edit-preco').attr('action', route);

					$('#edit-data-vigencia').daterangepicker({startDate: preco.startDate, endDate: preco.endDate});

					$('#vl_com_edit_procedimento').val(preco.vl_comercial);
					$('#vl_net_edit_procedimento').val(preco.vl_net);

					$('#preco-modal').modal();
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

	function delLinhaPreco(precoId, ds_plano)
	{
		var mensagem = 'DrHoje';
		swal({
			title: mensagem,
			text: 'O Preço "'+ds_plano+'" será movido da lista',
			type: 'warning',
			showCancelButton: true,
			confirmButtonClass: 'btn btn-confirm mt-2',
			cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
			confirmButtonText: 'Sim',
			cancelButtonText: 'Cancelar'
		}).then(function () {
			var route = '{{route('precos.destroy', 'precoId')}}';
			route = route.replace('precoId', precoId);

			jQuery.ajax({
				type: 'POST',
				url: route,
				data: {
					'_method': 'delete',
					'preco_id': precoId,
					'_token': laravel_token
				},
				success: function (result) {
					location.reload();
				},
				error: function (result) {
					$.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
				}
			});

		});
	}

    function loadDataProcedimento(element, atendimentoId)
	{
    	var cd_procedimento = $(element).parent().parent().find('td:nth-child(2)').html();

    	jQuery.ajax({
			type: 'POST',
			url: '/load-data-atendimento',
			data: {
				'atendimento_id': atendimentoId,
				'_token': laravel_token
			},
            success: function (result) {
                
	            if(result.status) {
		            var atendimento = JSON.parse(result.atendimento);
		            var nao_tem_atendimento = true;

			        cd_procedimento = atendimento.procedimento.cd_procedimento;
			        $('#cd_procedimento_edit').val(cd_procedimento);

			        //--realiza o carregamento dos locais onde o atendimento esta disponivel-------------
			        $('#profissional-procedimento-modal').find("#atendimento_filial option:selected").prop("selected", false);
			        for(var i = 0; i < atendimento.filials.length > 0; i++) {

			        	$('#profissional-procedimento-modal').find("#atendimento_filial option").each(function(){
			            	if($(this).val() == atendimento.filials[i].id) {
				            	$(this).prop("selected", true);
			            	}
			            });
			        }

			        $('#profissional-procedimento-modal').find("#atendimento_filial").trigger('change.select2');
	                 
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
		
    	var ds_procedimento = $(element).parent().parent().find('td:nth-child(3)').html();
    	var nm_profissional = $(element).parent().parent().find('td:nth-child(4)').html();

    	$('#form-edit-procedimento #profissional-procedimento-modal').find('input.form-control').val('');
    	$('#form-edit-procedimento #profissional-procedimento-modal').find('select.form-control').prop('selectedIndex',0);

		$('#form-edit-procedimento #atendimento_id_edit').val(atendimentoId);
		$('#form-edit-procedimento #ds_procedimento_edit').val(ds_procedimento);
		 
		$("#profissional-procedimento-modal").modal();
    }

    function limparProcedimento() {
    	$('#form-add-consulta :input').val('');
    }
	
    function delLinhaProcedimento(element, atendimento_nome, atendimento_id) {

    	var mensagem = 'DrHoje';
        swal({
            title: mensagem,
            text: 'O Atendimento "'+atendimento_nome+'" será movido da lista',
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-confirm mt-2',
            cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
            confirmButtonText: 'Sim',
            cancelButtonText: 'Cancelar'
        }).then(function () {
            
        	jQuery.ajax({
                type: 'POST',
                url: '{{ route("delete-precificacao-procedimento") }}',
                data: {
                    '_method': 'delete',
                    'atendimento_id': atendimento_id,
					"_token": "{{ csrf_token() }}"
                },
                success: function (result) {
                    
                    var atendimento = JSON.parse(result.atendimento);
                    
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
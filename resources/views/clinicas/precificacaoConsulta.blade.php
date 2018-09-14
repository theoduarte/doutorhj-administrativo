@if($errors->any())
    <div class="col-12 alert alert-danger">
        @foreach ($errors->all() as $error)<div class="col-5">{{ $error }}</div>@endforeach
    </div>
@endif

<div class="form-group">
    <form method="post" action="{{ route('add-precificacao-consulta',$prestador) }}" id="form-add">
        {!! csrf_field() !!}
		<div class="form-row">
			<div class="form-group col-6">
				<label for="nm_razao_social" class="control-label">Consulta<span class="text-danger">*</span></label>
				<input id="ds_consulta" type="text" class="form-control" name="ds_consulta" value="{{ old('ds_consulta') }}" placeholder="Informe a Descrição da Consulta para buscar" autofocus maxlength="100" required>
				<input type="hidden" id="cd_consulta" name="cd_consulta" value="">
				<input type="hidden" id="descricao_consulta" name="descricao_consulta" value="">
				<input type="hidden" id="consulta_id" name="consulta_id" value="">
			</div>

			<div class="form-group col-6">
				<label for="nm_profissional" class="control-label">Profissional<span class="text-danger">*</span></label>
				<select id="list_profissional_consulta" class="select2 select2-multiple" name="list_profissional_consulta[]" multiple="multiple" multiple data-placeholder="Selecione ...">
					@foreach($list_profissionals as $profissional)
						<option value="{{ $profissional->id }}">{{ $profissional->nm_primario.' '.$profissional->nm_secundario.' ('.$profissional->documentos->first()->tp_documento.': '.$profissional->documentos->first()->te_documento.')' }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-2">
				<label for="plano_id" class="control-label">Plano<span class="text-danger">*</span></label>
				<select id="plano_id" class="select2" name="plano_id" data-placeholder="Selecione ..." required>
					<option></option>
					@foreach($planos as $id=>$plano)
						<option value="{{ $id }}" @if ( old('plano_id') == $id) selected  @endif>{{$plano}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group col-2">
				<label for="data_vigencia_consulta">Vigência do Preço:<span class="text-danger"></span></label>
				<input type="text" class="form-control input-daterange" id="data_vigencia_consulta" name="data-vigencia" value="{{ old('data') }}" autocomplete="off">
			</div>

			<div class="form-group col-2">
				<label for="vl_com_consulta" class="control-label">Valor Comercial (R$)<span class="text-danger">*</span></label>
				<input id="vl_com_consulta" type="text" class="form-control mascaraMonetaria" name="vl_com_consulta" value="{{ old('vl_com_consulta') }}"  maxlength="15" required>
			</div>

			<div class="form-group col-2">
				<label for="vl_net_consulta" class="control-label">Valor NET (R$)<span class="text-danger">*</span></label>
				<input id="vl_net_consulta" type="text" class="form-control mascaraMonetaria" name="vl_net_consulta" value="{{ old('vl_net_consulta') }}"  maxlength="15" required>
			</div>

			<div class="form-group col-2">
				<div style="height: 30px;"></div>
				<button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Salvar</button>
				<a onclick="limparConsulta()" class="btn btn-icon btn-danger" title="Limpar Consulta"><i class="mdi mdi-close"></i> Limpar</a>
			</div>
		</div>
    </form>
	
    <br>
	
    <div class="row">
		<div class="col-12">
    		<table id="tblPrecosConsultas" name="tblPrecosConsultas" class="table table-striped table-bordered table-doutorhj">
        		<tr>
					<th width="12">Id</th>
					<th width="80">Código</th>
					<th width="380">Consulta</th>
					<th width="300">Profissional</th>
					<th width="300">Nomes Populares</th>
					<th width="100">
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
    			@foreach( $precoconsultas as $atendimento )
    				<tr id="tr-{{$atendimento->id}}">
    					<td>{{$atendimento->id}} <input type="hidden" class="consulta_id" value="{{ $atendimento->consulta->id }}"> <input type="hidden" class="profissional_id" value="{{ $atendimento->profissional->id }}"></td>
    					<td><a href="{{ route('consultas.show', $atendimento->consulta->id) }}" title="Exibir" class="btn-link text-primary"><i class="ion-search"></i> {{$atendimento->consulta->cd_consulta}}</a></td>
    					<td>{{$atendimento->ds_preco}}</td>
    					<td>@if($atendimento->profissional->cs_status == 'A') {{$atendimento->profissional->nm_primario.' '.$atendimento->profissional->nm_secundario.' ('.$atendimento->profissional->documentos()->first()->tp_documento.': '.$atendimento->profissional->documentos->first()->te_documento.')' }} @else <span class="text-danger"> <i class="mdi mdi-close-circle"></i> NENHUMA PROFISSIONAL SELECIONADO</span> @endif</td>
    					<td>@if( isset($atendimento->consulta->tag_populars) && sizeof($atendimento->consulta->tag_populars) > 0 ) <ul class="list-profissional-especialidade">@foreach($atendimento->consulta->tag_populars as $tag) <li><i class="mdi mdi-check"></i> {{ $tag->cs_tag }}</li> @endforeach</ul> @else <span class="text-danger"> <i class="ion-close-circled"></i></span>  @endif</td>
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
    						<a onclick="loadDataConsulta(this, '{{ $atendimento->id }}')" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-lead-pencil"></i> Editar</a>
	                 		<a onclick="delLinhaConsulta(this, '{{ $atendimento->ds_preco }}', '{{ $atendimento->id }}')" class="btn btn-danger waves-effect btn-sm m-b-5" title="Excluir"><i class="ti-trash"></i> Excluir</a>
    					</td>
    				</tr>
				@endforeach 
        	</table>
        </div>
	</div>
</div>
<div id="profissional-consulta-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ProfissionalConsultaModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="edit-consulta-title-modal">DrHoje: Editar Consulta</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('edit-precificacao-consulta', $prestador ) }}"  id="form-edit">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="atendimento_id" id="atendimento_id_edit_consulta" value="" required>
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cd_consulta_edit" class="control-label">Código da Consulta</label>
                                <input type="text" id="cd_consulta_edit" class="form-control" name="cd_consulta" placeholder="Código da Consulta" readonly="readonly" required>
                                <input type="hidden" id="consulta_id_edit" name="consulta_id" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ds_consulta_edit" class="control-label">Descrição</label>
                                <input type="text" id="ds_consulta_edit" class="form-control" name="ds_consulta" placeholder="Descrição da Consulta" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nm_profissional_consulta_edit" class="control-label">Profissional</label>
                                <select id="profissional_id_edit" class="form-control" name="profissional_id" required>
                                	<option value="">--- NENHUM PROFISSIONAL SELECIONADO ----</option>
            			            @foreach($list_profissionals as $profissional)
            			            <option value="{{ $profissional->id }}">{{ $profissional->nm_primario.' '.$profissional->nm_secundario.' ('.$profissional->documentos->first()->tp_documento.': '.$profissional->documentos->first()->te_documento.')' }}</option>
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
        $( "#ds_consulta" ).autocomplete({
        	  source: function( request, response ) {
        	      $.ajax( {
        	    	  url: "/consultas/consulta/"+$('#ds_consulta').val(),
        	          dataType : "json",
        	          success  : function( data ) {
        	            response( data );
        	          }
        	      });
        	  },
        	  minLength : 3,
        	  select: function(event, ui) {
            	  arConsulta = ui.item.id.split(' | ')
            	  
           	      $('input[name="consulta_id"]').val(arConsulta[0]);
           	      $('input[name="cd_consulta"]').val(arConsulta[1]);
           	   	  $('input[name="descricao_consulta"]').val(arConsulta[2]);
        	  }
        });

        $( "#nm_profissional_consulta" ).autocomplete({
        	  source: function( request, response ) {
        	      $.ajax( {
        	    	  type: 'POST',
        	    	  url: '{{ Request::url() }}/list-profissional',
        	          dataType : "json",
        	          data: {
            	          'clinica_id': $('#clinica_id').val(),
            	          'nm_profissional': $('#nm_profissional_consulta').val(),
            	          '_token': laravel_token
            	      },
        	          success  : function( data ) {
        	            response( data );
        	          }
        	      });
        	  },
        	  minLength : 3,
        	  select: function(event, ui) {
        		  var profissional_id = ui.item.id;
        		  $('#consulta_profissional_id').val(profissional_id);
        	  }
        });
    });

    function loadDataConsulta(element, atendimento_id) {

    	var cd_consulta = $(element).parent().parent().find('td:nth-child(2)').html();

    	jQuery.ajax({
			type: 'POST',
			url: '/load-data-atendimento',
			data: {
				'atendimento_id': atendimento_id,
				'_token': laravel_token
			},
            success: function (result) {
                
	            if(result.status) {

		            var atendimento = JSON.parse(result.atendimento);
		            var nao_tem_atendimento = true;

		            $('#profissional_id_edit option').each(function(index){
			            if($(this).val() == atendimento.profissional_id) {
			            	$('#profissional_id_edit').prop("selectedIndex", index);
			            	nao_tem_atendimento = false;
			            }
			        });

			        if(nao_tem_atendimento) {
			        	$('#profissional_id_edit').prop("selectedIndex", 0);
			        }

			        cd_consulta = atendimento.consulta.cd_consulta;
			        $('#cd_consulta_edit').val(cd_consulta);
	                 
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
		
    	var ds_consulta = $(element).parent().parent().find('td:nth-child(3)').html();
    	var nm_profissional = $(element).parent().parent().find('td:nth-child(4)').html();

    	$('#profissional-consulta-modal').find('input.form-control').val('');
    	$('#profissional-consulta-modal').find('select.form-control').prop('selectedIndex',0);

		$('#form-edit #consulta_id_edit').val(atendimento_id);
		$('#form-edit #ds_consulta_edit').val(ds_consulta);
		$('#form-edit #nm_profissional_consulta_edit').val(nm_profissional);
        $('#form-edit #atendimento_id_edit_consulta').val(atendimento_id);        
		 
		$("#profissional-consulta-modal").modal();
    }

    function limparConsulta() {
    	$('#form-add :input').val('');
    }
	
    function delLinhaConsulta(element, atendimento_nome, atendimento_id) {

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
    			url: '{{ route("delete-precificacao-consulta") }}',
    			data: {
    				'_method': 'delete',
                    'atendimento_id': atendimento_id,
                    '_token': laravel_token
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
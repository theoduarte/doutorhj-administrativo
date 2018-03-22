@extends('layouts.master')

@section('title', 'Doutor HJ: Agenda')

@section('container')

<style>
    .ui-autocomplete {
        max-height : 200px;
        overflow-y : auto;
        overflow-x : hidden;
    }
    * html .ui-autocomplete {
        height     : 200px;
    }
</style>

<script>
    $(function(){
        $("#localAtendimento").autocomplete({
        	  source: function( request, response ) {
                  $.ajax({
                      url : "/consultas/localatendimento/"+$('#localAtendimento').val(),
                      dataType: "json",
                      success: function(data) {
                          response(data);
                      }
                  });
        	  },
        	  minLength: 5,
        	  select: function(event, ui) {
    		      $('input[name="clinica_id"]').val(parseInt(ui.item.id));
        	  }
        });
    });
</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="brWeadcrumb-item"><a href="#">Cadastros</a></li>
					<li class="breadcrumb-item active">Agenda</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-12">
			<div class="card-box">
				<h4 class="m-t-0 header-title">Agenda</h4>
				<p class="text-muted m-b-30 font-13"></p>
				
				<div class="row">
					<div class="col-12">
                    	<form class="form-edit-add" role="form" action="{{ route('agenda.index') }}" method="get" enctype="multipart/form-data">
                    		{{ csrf_field() }}
        				
                			<div class="row">
                				<div class="col-4">
            				        <label for="localAtendimento">Local de Atendimento:</label>
    								<input type="text" class="form-control" name="localAtendimento" id="localAtendimento" value="">
    								<input type="hidden" id="clinica_id" name="clinica_id" value="">
                                </div>
                                
                                
                                
                                
                                
                                
								<div class="form-group">
									<div style="height: 16px;"></div>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox" id="ckConsultasConfirmadas" name="ckConsultasConfirmadas" 
                    						value="consultas_confirmadas" @if(old('ckConsultasConfirmadas')=='consultas_confirmadas') checked @endif> Consultas Confirmadas
                                    </label>
                    				<br>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckConsultasConfirmar" name="ckConsultasConfirmar" 
                    						value="consultas_confirmar" @if(old('ckConsultasConfirmar')=='consultas_confirmar') checked @endif> Consultas a Confirmar
                                    </label>
                                </div>
                				
                                <div class="form-group">
                                	<div style="height: 16px;"></div>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckConsultasConsumadas" name="ckConsultasConsumadas" 
                    						value="consultas_consumadas" @if(old('ckConsultasConsumadas')=='consultas_consumadas') checked @endif> Consultas Consumadas
                                    </label>
                    				<br>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckConsultasCanceladas" name="ckConsultasCanceladas" 
                    						value="consultas_canceladas" @if(old('ckConsultasCanceladas')=='consultas_canceladas') checked @endif> Consultas Canceladas
                                    </label>
                                </div>
                				
                                <div class="form-group">
                                	<div style="height: 16px;"></div>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckContatoTelefonicoInicial" name="ckContatoTelefonicoInicial" 
                    						value="contato_telefonico_inicial" @if(old('ckContatoTelefonicoInicial')=='contato_telefonico_inicial') checked @endif> Primeiro Contato
                    					
                                    </label>
                    				<br>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckContatoTelefonicoFinal" name="ckContatoTelefonicoFinal"
            								value="contato_telefonico_final" @if(old('ckContatoTelefonicoFinal')=='contato_telefonico_final') checked @endif> Segundo Contato
                                    </label>
                                </div> 	
                                
                                
                                
                                
                                
                                
                                
            					 			
            				</div>
            				<div class="row">
								<div class="col-4">
            				        <label for="localAtendimento">Paciente:</label>
    								<input type="text" class="form-control" name="localAtendimento" id="localAtendimento" value="">
    								<input type="hidden" id="clinica_id" name="clinica_id" value="">
                                </div>            					
    							
                				<div style="width: 210px !important;">
            				        <label for="data">Data:</label>
        							<input type="text" class="form-control input-daterange-timepicker" id="data" name="data" value="">                
                                </div>

                				<div class="col-1 col-lg-3">
            				        <div style="height: 30px;"></div>
                					<button type="submit" class="btn btn-primary" id="submit">Pesquisar</button>
                                </div>
            				</div>
            			</form>
					</div>
    				
    				<div style="height: 180px !important;"></div>
				</div>
            	<div class="row">
            		<div class="col-12">
    					<table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
        					<tr>
        						<th>Ticket</th>
        						<th>@sortablelink('nm_razao_social', 'Local Atendimento')</th>
        						<th>@sortablelink('nm_primario', 'Paciente')</th>
        						<th>Data / Hora</th>
        						<th>Ações</th>
        					</tr>
                            @foreach($agenda as $obAgenda)
                            <tr>
                            	<td>C034938</td>
                            	<td>{{$obAgenda->nm_razao_social}}</td>
                            	<td>{{$obAgenda->paciente->nm_primario}} {{$obAgenda->paciente->nm_secundario}}</td>
                            	<td></td>
                            	<td>
                            		<a href="{{ route('agenda.show', $obAgenda->id) }}"    class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
                            		<a href="{{ route('agenda.edit', $obAgenda->id) }}"    class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
                            		<a href="{{ route('agenda.destroy', $obAgenda->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o prestador {{$obAgenda->nm_razao_social}}?"><i class="ti-trash"></i></a>
                            	</td>
                            </tr>
                            @endforeach
    					</table>
                        <tfoot>
                        	<div class="cvx-pagination">
                        		<span class="text-primary">
                        			{{ sprintf("%02d", $agenda->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $agenda->count()) }} Registro(s) exibido(s)
                        		</span>
                        		{!! $agenda->links() !!}
                        	</div>
                        </tfoot>
            		</div>
            	</div>
           	</div>
       </div>
	</div>
</div>
@endsection
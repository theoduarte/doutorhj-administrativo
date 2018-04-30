@extends('layouts.master')

@section('title', 'Doutor HJ: Agenda')

@section('container')

<style>
    .ui-autocomplete {
        max-height  : 200px;
        overflow-y  : auto;
        overflow-x  : hidden;
    }
    
    * html .ui-autocomplete {
        height      : 200px;
    }
    
    .ui-dialog .ui-state-error {
        padding     : .3em;
    }
    
    .ui-widget-header {
        border      : 1px solid #dddddd;
        background  : #00b0f4 !important;
        color       : #ffffff;
        font-weight : bold;
    }
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Cadastros</a></li>
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
                				<div class="col-5">
            				        <label for="localAtendimento">Clínica:<span class="text-danger">*</span></label>
    								<input type="text" class="form-control" name="localAtendimento" id="localAtendimento" value="{{old('localAtendimento')}}">
    								<input type="hidden" id="clinica_id" name="clinica_id" value="{{old('clinica_id')}}">
                                </div>
								<div class="form-group">
									<div style="height: 20px;"></div>
                                    <label class="custom-checkbox" style="cursor: pointer;width:210px;">
                    					<input type="checkbox"  id="ckPreAgendada" name="ckPreAgendada" 
                    						value="10" @if(old('ckPreAgendada')=='10') checked @endif> Consultas Pré-Agendadas 
                                    </label>
                    				<br>
									<label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox" id="ckConsultasAgendadas" name="ckConsultasAgendadas" 
                    						value="70" @if(old('ckConsultasAgendadas')=='70') checked @endif> Consultas Agendadas 
                                    </label>
                                </div>
                				
                                <div class="form-group">
                                	<div style="height: 20px;"></div>
                                	<label class="custom-checkbox" style="cursor: pointer;width:220px;">
                    					<input type="checkbox"  id="ckConsultasConfirmadas" name="ckConsultasConfirmadas" 
                    						value="20" @if(old('ckConsultasConfirmadas')=='20') checked @endif> Consultas Confirmadas 
                                    </label>
                    				<br>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckConsultasNaoConfirmadas" name="ckConsultasNaoConfirmadas" 
                    						value="30" @if(old('ckConsultasNaoConfirmadas')=='30') checked @endif> Consultas Não Confirmadas 
                                    </label>
                                </div>
                                
                                <div class="form-group">
                                	<div style="height: 20px;"></div>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckConsultasCanceladas" name="ckConsultasCanceladas" 
                    						value="60" @if(old('ckConsultasCanceladas')=='60') checked @endif> Consultas Canceladas 
                                    </label>
									<br>
                                    <label class="custom-checkbox" style="cursor: pointer;">
                    					<input type="checkbox"  id="ckAusencias" name="ckAusencias" 
                    						value="50" @if(old('ckAusencias')=='50') checked @endif> Ausências 
                                    </label>
                                </div>
            				</div>
            				<div class="row">
								<div class="col-5">
            				        <label for="localAtendimento">Paciente:</label>
    								<input type="text" class="form-control" name="nm_paciente" id="nm_paciente" value="{{old('nm_paciente')}}">
                                </div>            					
    							
                				<div style="width: 210px !important;">
            				        <label for="data">Data:<span class="text-danger">*</span></label>
        							<input type="text" class="form-control input-daterange-timepicker" id="data" name="data" value="{{old('data')}}">                
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
        						<th>Prestador</th>
        						<th>Profissional</th>
        						<th>Paciente</th>
        						<th>Data / Hora</th>
        						<th>Situação</th>
        						<th>Ações</th>
        					</tr>
                                @foreach($agenda as $obAgenda)
                                   @if( $obAgenda->agendamento != null && $obAgenda->agendamento->clinica != null && 
                                   	    $obAgenda->agendamento->profissional != null && $obAgenda->agendamento->paciente->user != null ) 
                                    <tr>
                                    	<td>{{$obAgenda->agendamento->te_ticket}}</td>
                                    	<td>{{$obAgenda->agendamento->clinica->id}} - {{$obAgenda->agendamento->clinica->nm_razao_social}}</td>
                                    	<td>{{$obAgenda->agendamento->profissional->id}} - {{$obAgenda->agendamento->profissional->nm_primario}} {{$obAgenda->agendamento->profissional->nm_secundario}}</td>
                                    	<td>{{$obAgenda->agendamento->paciente->id}} - {{$obAgenda->agendamento->paciente->nm_primario}} {{$obAgenda->agendamento->paciente->nm_secundario}}</td>
                                    	<td>{{$obAgenda->agendamento->dt_atendimento}}</td>
                                    	<td>{{$obAgenda->agendamento->cs_status}}</td>
                                    	<td style="width:100px;">
                                    	
                                    	<!-- botao agendar/remarcar -->
                                    	@if( $obAgenda->agendamento->cs_status == 'Pré-Agendado' 
                                    			or $obAgenda->agendamento->cs_status == 'Agendado' 
                                    				and $obAgenda->agendamento->cs_status!='Cancelado'
                                    					and $obAgenda->agendamento->cs_status!='Finalizado'
                                    						and $obAgenda->agendamento->cs_status!='Confirmado'
                                    							and $obAgenda->agendamento->bo_remarcacao=='N')
                                    							
                   							<a especialidade  = "@foreach( $obAgenda->agendamento->profissional->especialidades as $especialidade )
                   													{{$especialidade->ds_especialidade}}
                   												@endforeach
                   												"
                                    		   nm-paciente    = "{{$obAgenda->agendamento->paciente->id}} - {{$obAgenda->agendamento->paciente->nm_primario}} {{$obAgenda->agendamento->paciente->nm_secundario}}" 
                                    		   data-hora	  = "{{$obAgenda->agendamento->dt_atendimento}}"
                                    		   prestador	  = "{{$obAgenda->agendamento->clinica->id}} - {{$obAgenda->agendamento->clinica->nm_razao_social}}" 
                                    		   nm-profissional= "{$obAgenda->agendamento->profissional->id}} - {{$obAgenda->agendamento->profissional->nm_primario}} {{$obAgenda->agendamento->profissional->nm_secundario}}"
                                    		   valor-consulta = "{{$obAgenda->valor}}"
                                    		   id-profissional = "{{$obAgenda->agendamento->profissional->id}}"
                                    		   id-clinica     = "{{$obAgenda->agendamento->clinica->id}}"
                                    		   id-paciente    = "{{$obAgenda->agendamento->paciente->id}}"
                                    		   ticket         = "{{$obAgenda->agendamento->te_ticket}}"
                                    		   class		  = "btn btn-icon waves-effect btn-primary btn-sm m-b-5"
                                    		   
                                    		   @if( $obAgenda->agendamento->cs_status == 'Pré-Agendado' )		   
                                    		   		title = "Agendar Consulta" id="agendamento"><i class="mdi mdi-phone"></i></a>
                                    		   @elseif( $obAgenda->agendamento->cs_status == 'Agendado' )
                                    		   		title = "Remarcar Consulta" id="agendamento"><i class="mdi mdi-phone"></i></a>
                                    		   @endif
                                    	@endif
                                    	
                                    	
                                    	<!-- botao confirmar -->
                                    	@if( $obAgenda->agendamento->cs_status!='Cancelado' and $obAgenda->agendamento->cs_status=='Agendado')                                	   
                   							<a especialidade  = "@foreach( $obAgenda->agendamento->profissional->especialidades as $especialidade )
                   													{{$especialidade->ds_especialidade}}
                   												@endforeach
                   												"
                                    		   nm-paciente     = "{{$obAgenda->agendamento->paciente->id}} - {{$obAgenda->agendamento->paciente->nm_primario}} {{$obAgenda->agendamento->paciente->nm_secundario}}" 
                                    		   data-hora	   = "{{$obAgenda->agendamento->dt_atendimento}}"
                                    		   prestador	   = "{{$obAgenda->agendamento->clinica->id}} - {{$obAgenda->agendamento->clinica->nm_razao_social}}" 
                                    		   nm-profissional = "{$obAgenda->agendamento->profissional->id}} - {{$obAgenda->agendamento->profissional->nm_primario}} {{$obAgenda->agendamento->profissional->nm_secundario}}"
                                    		   valor-consulta  = "{{$obAgenda->valor}}"
                                    		   id-profissional = "{{$obAgenda->agendamento->profissional->id}}"
                                    		   id-clinica      = "{{$obAgenda->agendamento->clinica->id}}"
                                    		   id-paciente     = "{{$obAgenda->agendamento->paciente->id}}"
                                    		   ticket          = "{{$obAgenda->agendamento->te_ticket}}"
                                    		   class		   = "btn btn-icon waves-effect btn-primary btn-sm m-b-5"
                                    		   title 		   = "Confirmar Consulta" id="confirmacao"><i class="mdi mdi-thumb-up"></i></a>
										@endif
										
										
                                    	<!-- botao cancelar -->
                                    	@if( $obAgenda->agendamento->cs_status!='Cancelado' and $obAgenda->agendamento->cs_status!='Finalizado')                                	   
                   							<a especialidade  = "@foreach( $obAgenda->agendamento->profissional->especialidades as $especialidade )
                   													{{$especialidade->ds_especialidade}}
                   												@endforeach
                   												"
                                    		   nm-paciente     = "{{$obAgenda->agendamento->paciente->id}} - {{$obAgenda->agendamento->paciente->nm_primario}} {{$obAgenda->agendamento->paciente->nm_secundario}}" 
                                    		   data-hora	   = "{{$obAgenda->agendamento->dt_atendimento}}"
                                    		   prestador	   = "{{$obAgenda->agendamento->clinica->id}} - {{$obAgenda->agendamento->clinica->nm_razao_social}}" 
                                    		   nm-profissional = "{$obAgenda->agendamento->profissional->id}} - {{$obAgenda->agendamento->profissional->nm_primario}} {{$obAgenda->agendamento->profissional->nm_secundario}}"
                                    		   valor-consulta  = "{{$obAgenda->valor}}"
                                    		   id-profissional = "{{$obAgenda->agendamento->profissional->id}}"
                                    		   id-clinica      = "{{$obAgenda->agendamento->clinica->id}}"
                                    		   id-paciente     = "{{$obAgenda->agendamento->paciente->id}}"
                                    		   ticket          = "{{$obAgenda->agendamento->te_ticket}}"
                                    		   class		   = "btn btn-icon waves-effect btn-primary btn-sm m-b-5 cancelamento"
                                    		   title 		   = "Cancelar Consulta" id="cancelamento"><i class="mdi mdi-thumb-down"></i></a>
										@endif                                	

                                    	</td>
                                    </tr>
                                   @endif 
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

@include('agenda/modal_agenda_consulta')
@include('agenda/modal_cancelamento')
@include('agenda/modal_confirmacao')

@endsection
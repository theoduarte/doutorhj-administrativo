@extends('layouts.master')

@section('title', 'Doutor HJ: Agenda')

@section('container')

<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    * html .ui-autocomplete {
        height: 200px;
    }
</style>

<script>
    $(function(){
        $( "#localAtendimento" ).autocomplete({
        	  source: function( request, response ) {
        	        $.ajax( {
        	          url: "/consultas/localatendimento/"+$('#localAtendimento').val(),
        	          dataType: "json",
        	          success: function( data ) {
        	            response( data );
        	          }
        	        } );
        	      },
        	  minLength: 5,
        	  select: function(event, ui) {
    			  arConsulta = ui.item.id.split(' | ')
            	  
//            	      $('input[name="consulta_id"]').val(arConsulta[0]);
//            	      $('input[name="cd_consulta"]').val(arConsulta[1]);
//            	   	  $('input[name="descricao"]').val(arConsulta[2]);
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
				
				<div class="row ">
					<div class="col-12"> 
                    	{{ csrf_field() }}
        
            			<div class="row">
            				<div class="col-8">
        				        <label for="daterange">Local de Atendimento</label><br>
								<input type="text" class="form-control" name="localAtendimento" id="localAtendimento" value="">
                            </div>
            			</div>
            			<div class="row">
            				<div class="col-6">
        				        <label for="daterange">Data</label><br>
								<input type="text" class="form-control input-daterange-timepicker" name="daterange" value="">
                            </div>
            			</div>
                    	<br>
					</div>
				</div>
				<div class="row">

				</div>
           </div>
       </div>
	</div>
</div>
@endsection
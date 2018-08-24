@extends('layouts.master')@section('title', 'Doutor HJ: Resumo Checkup')
@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Cadastros</a></li>
					<li class="breadcrumb-item"><a href="/checkups">Checkups</a></li>
          <li class="breadcrumb-item active">Preview</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
			  <h4 class="m-t-0 header-title">Check-up</h4>

              <section class="resultado resultado-checkup">
                  <div class="container">
                      <div class="area-container">
                          <div class="titulo">
        	  	  		<h3>Resumo de Check-up</h3>
                          </div>
                          <div class="lista">
                              <div class="accordion" id="accordionResultado">
        	  	  			@foreach( $dados as $checkup )
                                  <div class="card">
                                      <div class="card-header" id="headingTres">
                                          <div class="resumo">
                                              <div class="row">
                                                  <div class="col-md-6 col-lg-8 col-xl-9">
                                                      <div class="resumo-pacote">
                                                          <h4>Checkup {{$checkup['titulo']}} {{$checkup['tipo']}} com {{$checkup['total_procedimentos']}} procedimentos</h4>
                                                          <span class="incluso">Incluso nesse pacote:</span>
                                                          <ul class="quantidade">
                                                          	@foreach( $checkup['total_camadas'] as $camada => $total )
                                                              <li><span>{{$total}}</span> {{$camada}}</li>
                                                              @endforeach
                                                          </ul>
                                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$checkup['titulo']}}{{$checkup['tipo']}}" aria-expanded="true" aria-controls="collapseOne">
                                                              ver lista de procedimentos
                                                          </button>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6 col-lg-4 col-xl-3">
                                                      <div class="valores">
                                                          <div class="mercado">
                                                              <p>Valor de mercado</p>
                                                              <span>R$ {{$checkup['total_vl_mercado']}}</span>
                                                          </div>
                                                          <div class="drhj">
                                                              <p>Procedimentos individuais no Doutor Hoje</p>
                                                              <span>R$ {{$checkup['total_vl_individual']}}</span>
                                                          </div>
                                                          <div class="checkup">
                                                              <p>Valor do Checkup</p>
                                                              <span>R$ {{$checkup['total_com_checkup']}}</span>
                                                              <button class="btn btn-vermelho" type="button" data-toggle="collapse" data-target="#collapse{{$checkup['titulo']}}{{$checkup['tipo']}}" aria-expanded="true" aria-controls="collapseOne">
                                                                  Agendar este Checkup
                                                              </button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                  
                                      <div id="collapse{{$checkup['titulo']}}{{$checkup['tipo']}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionResultado">
                                          <div class="card-body">
        	  	  						@foreach($checkup['camadas'] as $titulo => $procedimento)
              	  							<div id="consultas" class="pacote-procedimentos">
                                                      <div class="titulo">
                                                          <div class="row">
                                                              <div class="col-xl-8">
                                                                  {{$titulo}}
                                                              </div>
                                                              <div class="col-xl-4">
                                                                  Escolha data e horário
                                                              </div>
                                                          </div>
                                                      </div>
                                                      @foreach($procedimento as $codigo => $descricao)
                                                      
                                                          <div class="procedimento">
                                                              <div class="row">
                                                                  <div class="col-xl-8">
                                                                      <div class="nome">
                                                                          <button type="button" class="btn btn-tooltip" data-toggle="tooltip" data-html="true" title="{{@$descricao['descricao']}}">
                                                                              <i class="fa fa-info-circle" aria-hidden="true">{{@$descricao['descricao']}}</i>
                                                                          </button>
                                                                      </div>
                                                                      <div class="clinicas">
                                                                          <div class="form-check">
                                                                              <label class="form-check-label" for="clinicaProcedimento027">
                                                                                  {{@$descricao['prestador']}} - {{@$descricao['endereco']}}
                                                                              </label>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-xl-4">
                                                                      <div class="escolher-data">
                                                                          <input id="selecionaDataUm" class="selecionaData" type="text" placeholder="Data">
                                                                          <label for="selecionaDataUm"><i class="fa fa-calendar"></i></label>
                                                                      </div>
                                                                      <div class="escolher-hora">
                                                                          <input id="selecionaHoraUm" class="selecionaHora" type="text" placeholder="Horário">
                                                                          <label for="selecionaHoraUm"><i class="fa fa-clock-o"></i></label>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
        	  	  								@endforeach
                                                  </div>																			
        	  	  						@endforeach
                                          </div>
                                      </div>
                                  </div>
        	  	  			@endforeach
        	  	  			
        	  	  			<span class="input-group-btn">
                              		<button id="btnVoltar" type="button" class="btnVoltar btn btn-success waves-effect waves-light">
                              			Voltar<i class="fa fa-new"></i>
                              		</button>
                              		<button id="btnFinalizar" type="button" class="btnFinalizar btn btn-danger waves-effect waves-light">
                              			Publicar<i class="fa fa-new"></i>
                              		</button>
                          		</span>	
                              </div>
                          </div>
                      </div>
                  </div>
                  <br>
             </section>
    	  </div>
   		</div>
    </div>
    @push('scripts')
        <script type="text/javascript">
            var laravel_token = '{{ csrf_token() }}';
            var resizefunc = [];

            /*********************************
             *
             * COLLAPSE FORM BUSCA MOBILE
             *
             *********************************/
            jQuery(document).ready(function($) {
                var alterClass = function() {
                    var ww = document.body.clientWidth;
                    if (ww < 975) {
                        $('.collapseFormulario').removeClass('show');
                    } else if (ww >= 975) {
                        $('.collapseFormulario').addClass('show');
                    };
                };
                $(window).resize(function(){
                    alterClass();
                });
                //Fire it when the page first loads:
                alterClass();

                jQuery('#btnVoltar').click(function(){
    				history.back(-1);
                });
				
                jQuery('#btnFinalizar').click(function(){
        			$.ajax({
                        url    : '/checkup/publicar',
                        method : "GET",
                        data   : {_token : $('input[name="_token"]').val()},
                        beforeSend : function(){
    						
                        },
                        success: function(response){
                            swal({
                            	title : 'Check-up publicado com sucesso!',
                                text  : '',
                                type  : 'success',
                                showCancelButton: false,
                                confirmButtonClass: 'btn btn-confirm mt-2',
                                cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                                confirmButtonText: 'OK',
                            }).then(function () {
                                window.location = '/checkup';
                            });
                        }
                    }).done(function(msg){
                        
                    }).fail(function(jqXHR, textStatus, msg){
                        swal({
                                title: 'Um erro inesperado ocorreu ao persistir informações!',
                                text: '',
                                type: 'error',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                    });
                });
            });
			
            /*********************************
             *
             * TROCA COR CARD AO CLICAR
             *
             *********************************/
            $('.card').on('show.bs.collapse hide.bs.collapse', function (e) {
                if (e.type == 'show') {
                    $(this).addClass("card-active");
                } else {
                    $(this).removeClass("card-active");
                }
            });
        </script>
    @endpush
@endsection
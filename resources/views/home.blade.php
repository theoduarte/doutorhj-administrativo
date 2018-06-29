@extends('layouts.master')

@section('title', 'DoctorHoje: Painel Administrativo')

@push('scripts')

@endpush

@section('container')
<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Bem-vindo: {{ Auth::user()->name }}!</h4>
			<ol class="breadcrumb float-right">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Painel Administrativo</li>
			</ol>
			
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6 col-xl-3">
		<div class="widget-simple-chart text-right card-box">
			<div class="circliful-chart" data-dimension="90" data-text="{{$percent_payment_finished}}%" data-width="5" data-fontsize="14" data-percent="{{$percent_payment_finished}}" data-fgcolor="#5fbeaa" data-bgcolor="#ebeff2"></div>
			<h3 class="text-success counter m-t-10">{{$num_pagamentos_finalizados}}</h3>
			<p class="text-muted text-nowrap m-b-10">Pagamentos Finalizados</p>
		</div>
	</div>
	
	<div class="col-sm-6 col-xl-3">
		<div class="widget-simple-chart text-right card-box">
			<div class="circliful-chart" data-dimension="90" data-text="{{$percent_payment_authorized}}%" data-width="5" data-fontsize="14" data-percent="{{$percent_payment_authorized}}" data-fgcolor="#3bafda" data-bgcolor="#ebeff2"></div>
			<h3 class="text-primary counter m-t-10">{{$num_pagamentos_autorizados}}</h3>
			<p class="text-muted text-nowrap m-b-10">Pagamentos Autorizados</p>
		</div>
	</div>
	
	<div class="col-sm-6 col-xl-3">
		<div class="widget-simple-chart text-right card-box">
			<div class="circliful-chart" data-dimension="90" data-text="{{$percent_profissionals_ativos}}%" data-width="5" data-fontsize="14" data-percent="{{$percent_profissionals_ativos}}" data-fgcolor="#98a6ad" data-bgcolor="#ebeff2"></div>
			<h3 class="text-inverse counter m-t-10">{{$num_profissionals_ativos}}</h3>
			<p class="text-muted text-nowrap m-b-10">Profissionais Ativos</p>
		</div>
	</div>
	
	<div class="col-sm-6 col-xl-3">
		<div class="widget-simple-chart text-right card-box">
			<div class="circliful-chart" data-dimension="90" data-text="{{$percent_recebimentos}}%" data-width="5" data-fontsize="14" data-percent="{{$percent_recebimentos}}" data-fgcolor="#f76397" data-bgcolor="#ebeff2">
			</div>
			<h3 class="text-pink m-t-10">R$ {{$valor_total_mes}}</h3>
			<p class="text-muted text-nowrap m-b-10">Fluxo de caixa em <span class="text-uppercase"><strong>{{ strftime('%B', strtotime('today')) }}</strong></span></p>
		</div>
	</div>
</div>
                        <!-- end row -->
                        
                        <!-- 
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0 m-b-30">Total Revenue</h4>

                                    <div class="widget-chart text-center">
                                        <div id="sparkline1"></div>
                                        <ul class="list-inline m-t-15 mb-0">
                                            <li>
                                                <h5 class="text-muted m-t-20">Target</h5>
                                                <h4 class="m-b-0">$56,214</h4>
                                            </li>
                                            <li>
                                                <h5 class="text-muted m-t-20">Last week</h5>
                                                <h4 class="m-b-0">$98,251</h4>
                                            </li>
                                            <li>
                                                <h5 class="text-muted m-t-20">Last Month</h5>
                                                <h4 class="m-b-0">$10,025</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-4">
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0 m-b-30">Yearly Sales Report</h4>

                                    <div class="widget-chart text-center">
                                        <div id="sparkline2"></div>
                                        <ul class="list-inline m-t-15 mb-0">
                                            <li>
                                                <h5 class="text-muted m-t-20">Target</h5>
                                                <h4 class="m-b-0">$1000</h4>
                                            </li>
                                            <li>
                                                <h5 class="text-muted m-t-20">Last week</h5>
                                                <h4 class="m-b-0">$523</h4>
                                            </li>
                                            <li>
                                                <h5 class="text-muted m-t-20">Last Month</h5>
                                                <h4 class="m-b-0">$965</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-4">
                                <div class="card-box">
                                    <h4 class="text-dark header-title m-t-0 m-b-30">Weekly Sales Report</h4>

                                    <div class="widget-chart text-center">
                                        <div id="sparkline3"></div>
                                        <ul class="list-inline m-t-15 mb-0">
                                            <li>
                                                <h5 class="text-muted m-t-20">Target</h5>
                                                <h4 class="m-b-0">$1,84,125</h4>
                                            </li>
                                            <li>
                                                <h5 class="text-muted m-t-20">Last week</h5>
                                                <h4 class="m-b-0">$50,230</h4>
                                            </li>
                                            <li>
                                                <h5 class="text-muted m-t-20">Last Month</h5>
                                                <h4 class="m-b-0">$87,451</h4>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                             -->
                        </div>
                        <!-- end row -->
                        
                        <?php /*
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="row">
                                                <div class="col-6 text-center">
                                                    <canvas id="partly-cloudy-day" width="100" height="100"></canvas>
                                                </div>
                                                <div class="col-6">
                                                    <h2 class="m-t-0 text-muted"><b>32°</b></h2>
                                                    <p class="text-muted">Partly cloudy</p>
                                                    <p class="text-muted mb-0">15km/h - 37%</p>
                                                </div>
                                            </div><!-- End row -->
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <h4 class="text-muted m-t-0">SAT</h4>
                                                    <canvas id="cloudy" width="35" height="35"></canvas>
                                                    <h4 class="text-muted">30<i class="wi wi-degrees"></i></h4>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <h4 class="text-muted m-t-0">SUN</h4>
                                                    <canvas id="wind" width="35" height="35"></canvas>
                                                    <h4 class="text-muted">28<i class="wi wi-degrees"></i></h4>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <h4 class="text-muted m-t-0">MON</h4>
                                                    <canvas id="clear-day" width="35" height="35"></canvas>
                                                    <h4 class="text-muted">33<i class="wi wi-degrees"></i></h4>
                                                </div>
                                            </div><!-- end row -->
                                        </div>
                                    </div><!-- end row -->
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <canvas id="snow" width="100" height="100"></canvas>
                                                    </div>
                                                    <div class="col-6">
                                                        <h2 class="m-t-0 text-muted"><b> 23°</b></h2>
                                                        <p class="text-muted">Partly cloudy</p>
                                                        <p class="text-muted mb-0">15km/h - 37%</p>
                                                    </div>
                                                </div><!-- end row -->
                                            </div><!-- weather-widget -->
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <h4 class="text-muted m-t-0">SAT</h4>
                                                    <canvas id="sleet" width="35" height="35"></canvas>
                                                    <h4 class="text-muted">30<i class="wi wi-degrees"></i></h4>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <h4 class="text-muted m-t-0">SUN</h4>
                                                    <canvas id="fog" width="35" height="35"></canvas>
                                                    <h4 class="text-muted">28<i class="wi wi-degrees"></i></h4>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <h4 class="text-muted m-t-0">MON</h4>
                                                    <canvas id="partly-cloudy-night" width="35" height="35"></canvas>
                                                    <h4 class="text-muted">33<i class="wi wi-degrees"></i></h4>
                                                </div>
                                            </div><!-- End row -->
                                        </div> <!-- col-->
                                    </div><!-- End row -->
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!--end row/ WEATHER -->
                        
                        */ ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0">Lista de Pagamentos</h4>
                                    <p class="text-muted m-b-25 font-13">
                                        Remuneração dos parceiros DoctorHoje
                                    </p>

                                    <div class="table-responsive">
                                        <!-- <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome do Parceiro</th>
                                                <th>Data Atendimento</th>
                                                <th>Data Pagamento</th>
                                                <th>Status</th>
                                                <th>Clínica</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Minton Admin v1</td>
                                                <td>01/01/2017</td>
                                                <td>26/04/2017</td>
                                                <td><span class="badge badge-success">Compensado</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Minton Frontend v1</td>
                                                <td>01/01/2017</td>
                                                <td>26/04/2017</td>
                                                <td><span class="badge badge-success">Compensado</span></td>
                                                <td>Minton admin</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Minton Admin v1.1</td>
                                                <td>01/05/2017</td>
                                                <td>10/05/2017</td>
                                                <td><span class="badge badge-pink">Cancelado</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Minton Frontend v1.1</td>
                                                <td>01/01/2017</td>
                                                <td>31/05/2017</td>
                                                <td><span class="badge badge-purple">Em progresso</span>
                                                </td>
                                                <td>Minton admin</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Minton Admin v1.3</td>
                                                <td>01/01/2017</td>
                                                <td>31/05/2017</td>
                                                <td><span class="badge badge-warning">Pendente</span></td>
                                                <td>Coderthemes</td>
                                            </tr>
    
                                            </tbody>
                                        </table>
                                         -->
										<table class="table table-hover table mb-0" data-page-size="7">
											<tr>
												<th>@sortablelink('id', '#')</th>
												<th>@sortablelink('merchant_order_id', 'Nome do Parceiro')</th>
												<th>@sortablelink('created_at', 'Data Atendimento')</th>
												<th>@sortablelink('updated_at', 'Data Pagamento')</th>
												<th>@sortablelink('capture', 'Status')</th>
												<th>@sortablelink('country', 'Clínica')</th>
											</tr>
											@foreach($pagamentos as $pagamento)
										
											<tr>
												<td>{{$pagamento->id}}</td>
												<td>{{$pagamento->pedido->paciente->nm_primario.' '.$pagamento->pedido->paciente->nm_secundario}}</td>
												<td>{{$pagamento->agendamento->dt_atendimento}}</td>
												<td>{{$pagamento->pedido->dt_pagamento}}</td>
												<td>@if($pagamento->status_payment == 0) <span class="badge badge-warning">Não Autorizado</span> @elseif($pagamento->status_payment == 1) <span class="badge badge-purple">Autorizado</span> @elseif($pagamento->status_payment == 2) <span class="badge badge-success">Finalizado</span> @else <span class="badge badge-danger">Negado</span> @endif</td>
												<td>{{$pagamento->clinica->nm_fantasia}}</td>
											</tr>
											@endforeach
										</table>
										<tfoot>
											<div class="cvx-pagination">
												<span class="text-primary">{{ sprintf("%02d", $pagamentos->total()) }} Pagamento(s) encontrado(s) e {{ sprintf("%02d", $pagamentos->count()) }} Pagamento(s) exibido(s)</span>
												{!! $pagamentos->appends(request()->input())->links() !!}
											</div>
										</tfoot>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -8 -->
                            
                            <!-- 
                            <div class="col-lg-4">
                                <div class="card-box widget-user">
                                    <div>
                                        <img src="/libs/comvex-template/img/users/avatar-1.jpg" class="img-responsive rounded-circle" alt="user">
                                        <div class="wid-u-info">
                                            <h5 class="mt-0 m-b-5 font-16">Chadengle</h5>
                                            <p class="text-muted m-b-5 font-13">coderthemes@gmail.com</p>
                                            <small class="text-warning"><b>Admin</b></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-box widget-user">
                                    <div>
                                        <img src="/libs/comvex-template/img/users/avatar-2.jpg" class="img-responsive rounded-circle" alt="user">
                                        <div class="wid-u-info">
                                            <h5 class="mt-0 m-b-5 font-16">Tomaslau</h5>
                                            <p class="text-muted m-b-5 font-13">coderthemes@gmail.com</p>
                                            <small class="text-success"><b>User</b></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-box widget-user">
                                    <div>
                                        <img src="/libs/comvex-template/img/users/avatar-7.jpg" class="img-responsive rounded-circle" alt="user">
                                        <div class="wid-u-info">
                                            <h5 class="mt-0 m-b-5 font-16">Ok</h5>
                                            <p class="text-muted m-b-5 font-13">coderthemes@gmail.com</p>
                                            <small class="text-pink"><b>Admin</b></small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                             -->
                        </div>
                        <!-- end row -->


                    </div>
                    <!-- end container -->
@endsection

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <link rel="shortcut icon" href="/libs/comvex-template/img/favicon.ico">
    <meta name="description" content="Comvex">
    <meta name="keywords" content="doutorhj saúde consulta médico sus plano de saúde">
    <meta name="author" content="Theogenes Ferreira Duarte">
  	
    <title>@yield('title', 'Doutor HJ')</title>
	
    @push('style')
    	<!-- Sweet Alert css -->
        <link href="/libs/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    	
    	<!-- Treeview css -->
        <link href="/libs/jstree/style.css" rel="stylesheet" type="text/css" />
    	
    	<!-- Switchery CSS-->
    	<link rel="stylesheet" href="/libs/switchery/switchery.min.css">
    	
    	<!-- jQuery-circliful CSS -->
    	<link rel="stylesheet" href="/libs/jquery-circliful/css/jquery.circliful.css">
    	
      	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="/libs/comvex-template/css/bootstrap.min.css">
    	
    	<!-- Icons CSS -->
    	<link href="/libs/comvex-template/css/icons.css"  rel="stylesheet" >
    	
    	<!-- Multi Select css -->
        <link href="/libs/multiselect/css/multi-select.css" rel="stylesheet"  type="text/css" />
    	
    	<!-- Template theme CSS -->
    	<link rel="stylesheet" href="/libs/comvex-template/css/style_dark.css">
    	
    	<!-- DoutorHJ Reset CSS -->
    	<link rel="stylesheet" href="/css/doutorhj.style.css">
    	
    	<script src="/libs/comvex-template/js/jquery.min.js"></script>
    	
    	<!-- modernizr script -->
    	<script src="/libs/comvex-template/js/modernizr.min.js"></script>
    	
    	<!-- Sweet Alert Js  -->
        <script src="/libs/sweet-alert/sweetalert2.min.js"></script>
        <script src="/libs/comvex-template/pages/jquery.sweet-alert.init.js"></script>
		
		<!-- JQueryUI -->
    	<link rel="stylesheet" href="/libs/jquery-ui-themes/jquery-ui.css">
    	
    	<!-- Datapicker -->
		<link href="/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<link href="/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    @endpush
    
    @stack('style')
</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
    	<div class="page-loader page-loader-variant-1">
            <div><img class='cvx-img-responsive' style='margin-top: -20px;margin-left: -18px;' width='330' height='67' src='/libs/home-template/img/logos/logo-doutor-hoje-vertical.svg' alt='' />
                <div class="offset-top-41 text-center">
                    <!-- <div class="spinner"></div> -->
                    <i class="fa fa-spin fa-circle-o-notch text-danger" style="font-size: 300%;"></i>
                </div>
            </div>
        </div>
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
            	<div class="text-center">
            		<a href="/home" class="logo"><img src="/img/logo-doutor-hj-light.png" class="logo-doutorhj" alt="user"> <span>DoutorHJ</span></a>
            		<!-- <a href="index.html" class="logo"><i class="mdi mdi-radar"></i> <span>Minton</span></a> -->
            	</div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <nav class="navbar-custom">
            
            	<ul class="list-inline float-right mb-0">
            		
            		<li class="list-inline-item notification-list hide-phone">
            			<a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
            				<i class="mdi mdi-crop-free noti-icon"></i>
            			</a>
            		</li>
            		
            		<li class="list-inline-item notification-list">
            			<a class="nav-link right-bar-toggle waves-light waves-effect" href="#">
            				<i class="mdi mdi-dots-horizontal noti-icon"></i>
            			</a>
            		</li>
            		
            		<li class="list-inline-item dropdown notification-list">
            			<a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            				<i class="mdi mdi-bell noti-icon"></i><span class="badge badge-pink noti-icon-badge">4</span>
            			</a>
            			<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg" aria-labelledby="Preview">
            			     
            			     <!-- item-->
            			     <div class="dropdown-item noti-title">
            			     	<h5 class="font-16"><span class="badge badge-danger float-right">5</span>Notification</h5>
            			     </div>
            			     
            			     <!-- item-->
            			     <a href="javascript:void(0);" class="dropdown-item notify-item">
            			     	<div class="notify-icon bg-success"><i class="mdi mdi-comment-account"></i></div>
            			     	<p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
            			     </a>
            			     
            			     <!-- item-->
            			     <a href="javascript:void(0);" class="dropdown-item notify-item">
            			     <div class="notify-icon bg-info"><i class="mdi mdi-account"></i></div>
            			     	<p class="notify-details">New user registered.<small class="text-muted">1 min ago</small></p>
            			     </a>
            			     
            			     <!-- item-->
            			     <a href="javascript:void(0);" class="dropdown-item notify-item">
            			     	<div class="notify-icon bg-danger"><i class="mdi mdi-airplane"></i></div>
            			     
            			     	<p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">1 min ago</small></p>
            			     </a>
            			     
            			     <!-- All-->
            			     <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">View All</a>
            			</div>
            		</li>
            		
            		<li class="list-inline-item dropdown notification-list">
            			<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            				<img src="/files/{{ Auth::user()->avatar }}" alt="user" class="rounded-circle">
            			</a>
            			
            			<div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
            			     
            			     <!-- item-->
            			     <div class="dropdown-item noti-title">
            			     	<h5 class="text-overflow"><small>Bem vindo: <strong>{{ Auth::user()->name }}</strong></small> </h5>
            			     </div>
            			     
            			     <!-- item-->
            			     <a href="javascript:void(0);" class="dropdown-item notify-item">
            			     	<i class="mdi mdi-account"></i> <span>Meus Dados</span>
            			     </a>
            			     
            			     <!-- item-->
            			     <a href="javascript:void(0);" class="dropdown-item notify-item">
            			     	<i class="mdi mdi-settings"></i> <span>Configurações</span>
            			     </a>
            			     
            			     <!-- item-->
            			     <a href="javascript:void(0);" class="dropdown-item notify-item">
            			     	<i class="mdi mdi-lock-open"></i> <span>Bloquear Sessão</span>
            			     </a>
            			     
            			     <!-- item-->
            			     <a href="/logout" class="dropdown-item notify-item">
            			     	<i class="mdi mdi-logout"></i> <span>Sair</span>
            			     </a>
            			</div>
            		</li>
            	</ul>
            	
            	<ul class="list-inline menu-left mb-0">
            		<li class="float-left">
            			<button class="button-menu-mobile open-left waves-light waves-effect">
            				<i class="mdi mdi-menu"></i>
            			</button>
            		</li>
            		<li class="hide-phone app-search">
            			<form role="search" class="">
            				<input type="text" placeholder="Pesquisar..." class="form-control">
            				<a href=""><i class="fa fa-search"></i></a>
            			</form>
            		</li>
            	</ul>
            </nav>
       	</div>
        <!-- Top Bar End -->
        
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
        	<div class="sidebar-inner slimscrollleft">
        	    <!--- Divider -->
        	    <div id="sidebar-menu">
        	    	<ul>
        	    		<li class="menu-title">Main</li>
        	    		
        	    		<li>
        	    			<a href="/home" class="waves-effect waves-primary"><i class="ti-home"></i><span> Home </span></a>
        	    		</li>
        	    		
        	    		<?php //dd($menus_app[0]->itemmenus[0]->url); ?>
            
						@for($i = 0; $i < sizeof($menus_app); $i++)
							<li class="has_sub">
								<a href="javascript:void(0);" class="waves-effect waves-primary"><i class="{{ $menus_app[$i]->ic_menu_class }}"></i><span> {{ $menus_app[$i]->titulo }} </span> <span class="menu-arrow"></span></a>
								
								<ul class="list-unstyled">
									@for($j = 0; $j < sizeof($menus_app[$i]->itemmenus); $j++)
                                    <li><a href="/{{ $menus_app[$i]->itemmenus[$j]->url }}">{{ $menus_app[$i]->itemmenus[$j]->titulo }}</a></li>
                                    @endfor
                             	</ul>
                             </li>
						@endfor
        	    		
                  	</ul>
                  	
                  	<div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->
        
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
            	@if (count($errors) > 0)
			    <!-- <div class="alert alert-danger">
			    	<ul>
			    		@foreach ($errors->all() as $error)
			    			<li>{{ $error }}</li>
			    		@endforeach
			    	</ul>
			    </div> -->
			    @endif
			    
			    @include('flash-message')
		    
		    	@yield('container')
            </div>
            
            <!-- end content -->
            <footer class="footer">
                    2018 © <span class="text-primary"><strong>Comvex</strong></span> <span class="hide-phone text-pink">- DoutorHJ</span>
            </footer>
            
      	</div>
      	
      	<!-- ============================================================== -->
      	<!-- End Right content here -->
      	<!-- ============================================================== -->
      	
      	<!-- Right Sidebar -->
      	<div class="side-bar right-bar">
      		<div class="">
      			<ul class="nav nav-tabs tabs-bordered nav-justified">
      				<li class="nav-item">
      					<a href="#home-2" class="nav-link active" data-toggle="tab" aria-expanded="false">Activity</a>
      				</li>
      				<li class="nav-item">
      					<a href="#messages-2" class="nav-link" data-toggle="tab" aria-expanded="true">Settings</a>
      				</li>
      			</ul>
      			<div class="tab-content">
      				<div class="tab-pane fade show active" id="home-2">
      					<div class="timeline-2">
      						<div class="time-item">
      							<div class="item-info">
      								<small class="text-muted">5 minutes ago</small>
      								<p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
      							</div>
      						</div>
      						
      						<div class="time-item">
      							<div class="item-info">
      								<small class="text-muted">30 minutes ago</small>
      								<p><a href="" class="text-info">Lorem</a> commented your post.</p>
      								<p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
      							</div>
      						</div>
      						
      						<div class="time-item">
      							<div class="item-info">
      								<small class="text-muted">59 minutes ago</small>
      								<p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
      								<p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
      							</div>
      						</div>
      						
      						<div class="time-item">
      							<div class="item-info">
      								<small class="text-muted">1 hour ago</small>
      								<p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
      							</div>
      						</div>
      						
      						<div class="time-item">
      							<div class="item-info">
      								<small class="text-muted">3 hours ago</small>
      								<p><a href="" class="text-info">Lorem</a> commented your post.</p>
      								<p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
      							</div>
      						</div>
      						
      						<div class="time-item">
      							<div class="item-info">
      								<small class="text-muted">5 hours ago</small>
      								<p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
      								<p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
      							</div>
      						</div>
      					</div>
      				</div>
      				
      				<div class="tab-pane" id="messages-2">
      				
      					<div class="row m-t-20">
      						<div class="col-8">
      							<h5 class="m-0 font-15">Notifications</h5>
      							<p class="text-muted m-b-0"><small>Do you need them?</small></p>
      						</div>
      						
      						<div class="col-4 text-right">
      							<input type="checkbox" checked data-plugin="switchery" data-color="#3bafda" data-size="small"/>
      						</div>
      					</div>
      					
      					<div class="row m-t-20">
      						<div class="col-8">
      							<h5 class="m-0 font-15">API Access</h5>
      							<p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
      						</div>
      						
      						<div class="col-4 text-right">
      							<input type="checkbox" checked data-plugin="switchery" data-color="#3bafda" data-size="small"/>
      						</div>
      					</div>
      					
      					<div class="row m-t-20">
      						<div class="col-8">
      							<h5 class="m-0 font-15">Auto Updates</h5>
      							<p class="m-b-0 text-muted"><small>Keep up to date</small></p>
      						</div>
      						
      						<div class="col-4 text-right">
      							<input type="checkbox" checked data-plugin="switchery" data-color="#3bafda" data-size="small"/>
      						</div>
      					</div>
      					
      					<div class="row m-t-20">
      						<div class="col-8">
      							<h5 class="m-0 font-15">Online Status</h5>
      							<p class="m-b-0 text-muted"><small>Show your status to all</small></p>
      						</div>
      						
      						<div class="col-4 text-right">
      							<input type="checkbox" checked data-plugin="switchery" data-color="#3bafda" data-size="small"/>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      	<!-- /Right-bar -->
    </div>
    
    

    @push('scripts')
    	<script>
    		var laravel_token = '{{ csrf_token() }}';
    		var resizefunc = [];
    	</script>
    	
    	<script src="/libs/comvex-template/js/jquery.min.js"></script>
    	<script src="/libs/comvex-template/js/popper.min.js"></script>
    	<script src="/libs/comvex-template/js/bootstrap.min.js"></script>
    	
    	<script src="/libs/comvex-template/js/detect.js"></script>
        <script src="/libs/comvex-template/js/fastclick.js"></script>
        <script src="/libs/comvex-template/js/jquery.slimscroll.js"></script>
        <script src="/libs/comvex-template/js/jquery.blockUI.js"></script>
        <script src="/libs/comvex-template/js/waves.js"></script>
        <script src="/libs/comvex-template/js/wow.min.js"></script>
        <script src="/libs/comvex-template/js/jquery.nicescroll.js"></script>
        <script src="/libs/comvex-template/js/jquery.scrollTo.min.js"></script>
        <script src="/libs/switchery/switchery.min.js"></script>
    	
    	<!-- Counter Up  -->
        <script src="/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="/libs/counterup/jquery.counterup.min.js"></script>
        
        <!-- circliful Chart -->
        <script src="/libs/jquery-circliful/js/jquery.circliful.min.js"></script>
        <script src="/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        
        <!-- skycons -->
        <script src="/libs/skyicons/skycons.min.js" type="text/javascript"></script>
		
        <!-- Page js  -->
        <script src="/libs/comvex-template/pages/jquery.dashboard.js"></script>
        
        <!-- Sweet Alert Js  -->
        <script src="/libs/sweet-alert/sweetalert2.min.js"></script>
        <script src="/libs/comvex-template/pages/jquery.sweet-alert.init.js"></script>
        
        <!-- Multi Select Js Quicksearch Js  -->
        <script type="text/javascript" src="/libs/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="/libs/jquery-quicksearch/jquery.quicksearch.js"></script>
        
        <!-- Tree view js -->
        <script src="/libs/jstree/jstree.min.js"></script>
        
        <!-- Notification js -->
        <script src="/libs/notifyjs/dist/notify.min.js"></script>
        <script src="/libs/notifications/notify-metro.js"></script>
        
        <!-- Plugins  -->
        <script type="text/javascript" src="/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="/libs/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script type="text/javascript" src="/libs/select2/js/select2.min.js"></script>
        <script type="text/javascript" src="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
		
        <script type="text/javascript" src="/libs/moment/moment.js"></script>
        <script type="text/javascript" src="/libs/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        
        
        
        
        <script type="text/javascript" src="/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
		



		<script type="text/javascript" src="/js/jquery.maskMoney.min.js"></script>
		
        <!-- Custom main Js -->
        <script src="/libs/comvex-template/js/jquery.core.js"></script>
        <script src="/libs/comvex-template/js/jquery.app.js"></script>
        <script src="/libs/comvex-template/js/jquery.form-advanced.init.js"></script>
        <script src="/libs/comvex-template/js/jquery.tree.js"></script>
        
		<script src="/libs/jquery-ui/jquery-ui.js"></script>
		<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
		
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
                $('.circliful-chart').circliful();
                $(".page-loader-variant-1").fadeOut(200, function(){
                    $(this).hide();
                });
            });

            // BEGIN SVG WEATHER ICON
            if (typeof Skycons !== 'undefined'){
                var icons = new Skycons(
                        {"color": "#3bafda"},
                        {"resizeClear": true}
                        ),
                        list  = [
                            "clear-day", "clear-night", "partly-cloudy-day",
                            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                            "fog"
                        ],
                        i;

                for(i = list.length; i--; )
                    icons.set(list[i], list[i]);
                icons.play();
            };
        </script>
    	
      	<script src="/js/restfulizer.js"></script>
      	<script src="/js/utilitarios.js"></script>
    @endpush
    
    @stack('scripts')
  </body>
</html>
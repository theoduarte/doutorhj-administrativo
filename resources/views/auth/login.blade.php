@extends('layouts.app')

@section('title', 'Home - DoutorHJ')

@push('scripts')
@endpush

@section('content')
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="/agenda" class="logo"><img src="/img/logo-doutor-hj.png" class="logo-doutorhj" alt="">
                    <span><img
                                src="/img/logo-doutor-hj-nome.png" class="logo-doutorhj-nome" alt=""></span></a>
            </div>
        </div>
        
        <!-- Button mobile view to collapse sidebar menu -->
        <nav class="navbar-custom">
            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item notification-list hide-phone">
                    <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                        <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                    </a>
                </li>
                <li class="list-inline-item dropdown notification-list">
              
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg"
                         aria-labelledby="Preview">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="font-16"><span class="badge badge-danger float-right">5</span>Notification</h5>
                        </div>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account"></i></div>
                            <p class="notify-details">Robert S. Taylor commented on Admin
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info"><i class="mdi mdi-account"></i></div>
                            <p class="notify-details">New user registered.
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-danger"><i class="mdi mdi-airplane"></i></div>
                            <p class="notify-details">Carlos Crouch liked <b>Admin</b>
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">View All</a>
                    </div>
                </li>
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                       href="#" role="button" aria-haspopup="false" aria-expanded="false">
                      
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="text-overflow">
                                
                            </h5>
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
        </nav>
    </div>
    <!-- Top Bar End -->
	
	
	<div class="container-fluid">

        <div class="row">
           	 <form class="form-horizontal m-t-20" action="{{ route('login') }}" method="post">
            
            	{{ csrf_field() }}
            
            	<div class="form-group row">
            		<div class="col-12">
						<h3>Identifique-se</h3>
					</div>
				</div>
						

            	<div class="form-group row">
            		<div class="col-12">
            			<div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
            				<div class="input-group-prepend">
            					<span class="input-group-text"><i class="mdi mdi-account"></i></span>
            				</div>
            				<input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite seu E-mail" required autofocus>
            				@if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
            			</div>
            		</div>
            	</div>
            	
            	<div class="form-group row">
            		<div class="col-12">
            			<div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
            				<div class="input-group-prepend">
            					<span class="input-group-text"><i class="mdi mdi-key-variant"></i></span>
            				</div>
            				<input type="password" id="password" class="form-control" name="password" placeholder="Digite sua Senha" required>
            				@if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
            			</div>
            		</div>
            	</div>
            	
            	<div class="form-group text-right m-t-20">
            		<div class="col-xs-12">
            			<button type="submit" class="btn btn-primary btn-custom w-md waves-effect waves-light">Entrar</button>
            		</div>
            	</div>
           
            </form>
        </div>
	</div>               
@endsection
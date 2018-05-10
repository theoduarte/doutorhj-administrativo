@extends('layouts.app')

@section('title', 'DoutorHJ: Login')

@push('scripts')

@endpush

@section('content')
<div class="text-center">
	<a href="/" class="logo-lg"><img src="/img/logo-doutorhj.png" alt="Logo DoutorHJ" style="width: 250px;"> <!-- <span class="doutorhj-color1">Doutor</span><span class="doutorhj-color2">Hoje</span> --> </a>
</div>

<form class="form-horizontal m-t-20" action="{{ route('login') }}" method="post">

	{{ csrf_field() }}

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
	
	<div class="form-group row">
		<div class="col-12">
			<div class="checkbox checkbox-primary">
				<input type="checkbox" id="checkbox-signup" name="remember" {{ old('remember') ? 'checked' : '' }}>
				<label for="checkbox-signup">Manter Conectado</label>
			</div>
		</div>
	</div>
	
	<div class="form-group text-right m-t-20">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-primary btn-custom w-md waves-effect waves-light">Entrar</button>
		</div>
	</div>
	
	<div class="form-group row m-t-30">
		<div class="col-sm-7">
			<a href="{{ route('password.request') }}" class="text-muted cvx-link-login"><i class="fa fa-lock m-r-5"></i> Esqueceu sua Senha?</a>
		</div>
		
		<div class="col-sm-5 text-right">
			<a href="{{ route('register') }}" class="text-muted cvx-link-login"><i class="mdi mdi-account-plus"></i> Criar conta</a>
		</div>
	</div>
</form>
@endsection

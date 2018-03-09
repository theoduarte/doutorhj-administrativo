@extends('layouts.app')

@section('title', 'DoutorHJ: Login')

@push('scripts')

@endpush

@section('content')
<div class="text-center">
	<a href="/" class="logo-lg"><img src="/img/logo-doutorhj.png" alt="Logo DoutorHJ" style="width: 250px;"></a>
</div>
<div class="text-center">
	 <h3 class="doutorhj-color1"><strong>Crie sua Conta</strong></h3> 
</div>

<form class="form-horizontal m-t-20" action="{{ route('register') }}" method="post">

	{{ csrf_field() }}
	
	<div class="form-group row">
        <div class="col-12">
            <div class="input-group {{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                </div>
                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Digite seu Nome Completo" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

	<div class="form-group row">
        <div class="col-12">
            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                </div>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite seu E-mail" required>
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
                    <span class="input-group-text"><i class="mdi mdi-key"></i></span>
                </div>
                <input type="password" id="password" class="form-control" name="password" placeholder="Digite sua Senha" required >
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
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-key-plus"></i></span>
                </div>
                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirme sua Senha" required>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <div class="checkbox checkbox-primary">
                <input id="checkbox-signup" type="checkbox" checked="checked">
                <label for="checkbox-signup">
                    Eu aceito os <a href="#">Termos e Condições Gerais do DoutorHJ</a>
                </label>
            </div>
        </div>
    </div>

    <div class="form-group text-right m-t-20">
        <div class="col-xs-12">
            <button class="btn btn-primary btn-custom waves-effect waves-light w-md" type="submit">Criar Conta</button>
        </div>
    </div>

    <div class="form-group row m-t-30">
        <div class="col-12 text-center">
            <a href="{{ route('login') }}" class="text-muted">Já possui uma Conta?</a>
        </div>
    </div>
</form>
@endsection
@extends('layouts.app')

@section('title', 'DoutorHJ: Login')

@push('scripts')

@endpush

@section('content')
<div class="text-center">
	<a href="/" class="logo-lg"><img src="/img/logo-doutorhj.png" alt="Logo DoutorHJ" style="width: 250px;"></a>
</div>
<div class="text-center">
	 <h3 class="doutorhj-color1"><strong>Esqueceu sua Senha?</strong></h3> 
</div>

<form class="form-horizontal m-t-20" role="form" action="{ route('password.email') }}" method="post">

	{{ csrf_field() }}
	
	<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Informe seu <b>E-mail</b> e um link de recuperação de senha lhe será enviado!
    </div>
    <div class="form-group m-b-0 {{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="input-group">
            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Digite seu E-mail" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <span class="input-group-append"> <button type="submit" class="btn btn-email btn-primary waves-effect waves-light">Enviar</button> </span>
        </div>
    </div>
</form>
@endsection
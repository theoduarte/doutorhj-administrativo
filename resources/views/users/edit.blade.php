@extends('layouts.master')

@section('title', 'Doctor HJ: Editar Usuário')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Lista de Usuários</a></li>
					<li class="breadcrumb-item active">Editar Usuário</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card-box">
				<h4 class="header-title m-t-0">Editar Usuário</h4>
				
				<form action="{{ route('users.update', $usuario->id) }}" method="post" enctype="multipart/form-data">
				
					<input type="hidden" name="_method" value="PUT">
					{!! csrf_field() !!}
					
					<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name">Nome<span class="text-danger">*</span></label>
						<input type="text" id="name" class="form-control" name="name" value="{{ $usuario->name }}" placeholder="Nome Completo do Usuário" maxlength="250" required  >
						@if ($errors->has('name'))
						<span class="help-block text-danger">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
	                    @endif
					</div>
					
					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email">E-mail<span class="text-danger">*</span></label>
						<input type="email" id="email" class="form-control" name="email" value="{{ $usuario->email }}" placeholder="E-mail do Usuário" maxlength="250" required  >
						@if ($errors->has('email'))
						<span class="help-block text-danger">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
	                    @endif
					</div>
					
					<div class="form-group row">
						<div class="col-sm-12 col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
			                <div class="form-group">
			                    <label for="password" class="control-label">Senha<span class="text-danger">*</span></label>
			                    <input id="password" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password" value="{{ $usuario->password }}" required  maxlength="50">
			                    @if ($errors->has('password'))
			                        <span class="help-block text-danger">
			                    <strong>{{ $errors->first('password') }}</strong>
			                    </span>
			                    @endif
			                </div>
			            </div>
			            <div class="col-sm-12 col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			                    <label for="password_confirmation" class="control-label">Repita a Senha<span class="text-danger">*</span></label>
			                    <input id="password_confirmation" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password_confirmation" value="{{ $usuario->password }}" required  maxlength="50">
			                    @if ($errors->has('password_confirmation'))
			                        <span class="help-block text-danger">
			                    <strong>{{ $errors->first('password_confirmation') }}</strong>
			                    </span>
			                    @endif
			                </div>
			            </div>
			        </div>
			        
			        <div class="form-group row">
			        	<div class="col-sm-12 col-md-8">
			        		<div class="form-group">
								<label for="avatar">Imagem(Avatar):<span class="text-danger">*</span></label>
								<input type="file" id="avatar" class="form-control" name="avatar" value="{{ $usuario->avatar }}" placeholder="Imagem/Avatar" maxlength="250" required  >
							</div>
						</div>
						<div class="col-sm-12 col-md-4">
							<div class="card m-b-20 text-center">
								<img class="card-img-top img-fluid" src="@if($usuario->avatar != 'users/default.png' & $usuario->avatar != '')/files/users/{{$usuario->id}}/thumb/{{ str_replace(public_path('files/users/'.$usuario->id).'/', '', $usuario->avatar) }} @else /files/users/default.png @endif" alt="Imagem/Avatar" style="width: 128px">
								<div class="card-body">
									<p class="card-text">{{ str_replace(public_path('files/users/'.$usuario->id).'/', '', $usuario->avatar) }}</p>
								</div>
							</div>
						</div>
					</div>
			        
			        
					
					<div class="form-group">
						<label for="tp_user">Tipo de Usuário:<span class="text-danger">*</span></label>
						<select id="tp_user" class="form-control" name="tp_user" placeholder="Selecione o Tipo de Usuário" required>
							<option value="ADM" @if( trim($usuario->tp_user) == 'ADM' ) selected='selected' @endif >Administrador</option>
							<option value="O" @if( trim($usuario->tp_user) == 'O' ) selected='selected' @endif >Operador</option>
							<option value="CLI" @if( trim($usuario->tp_user) == 'CLI' ) selected='selected' @endif >Cliente</option>
							<option value="PAC" @if( trim($usuario->tp_user) == 'PAC' ) selected='selected' @endif >Paciente</option>
						</select>
					</div>
					
					<div class="form-group">
						<label for="perfiluser_id">Perfil de Usuário:<span class="text-danger">*</span></label>
						<select id="perfiluser_id" class="form-control" name="perfiluser_id" placeholder="Selecione o Perfil de Usuário" required>
						@foreach($perfilusers as $id => $titulo)
							<option value="{{ $id }}" @if( $id == $usuario->perfiluser_id ) selected='selected' @endif>{{ $titulo }}</option>
						@endforeach
						</select>
					</div>
					
					<div class="form-group text-right m-b-0">
						<button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
						<a href="{{ route('users.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@extends('layouts.master')

@section('title', 'Gestão de Profissionais')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doctor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('profissionals.index') }}">Lista de profissionals</a></li>
					<li class="breadcrumb-item active">Profissionais</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	
	<form action="{{ route('profissionals.update', $profissionals->id) }}" method="post">
		<input type="hidden" name="_method" value="PUT">
		{!! csrf_field() !!}
    	
    	<div class="row">
	        <div class="col-12">
                <div class="card-box col-12">
                    <h4 class="header-title m-t-0 m-b-30">Profissionais</h4>
    
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#prestador" data-toggle="tab" aria-expanded="true" class="nav-link active">
                			    Dados do Profissional
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="prestador">
                        	@include('profissionals/tab_dados_profissional_edit')
                        </div>
                    </div>
                </div>
       		</div>
    	</div>
   </form>
</div>
@endsection
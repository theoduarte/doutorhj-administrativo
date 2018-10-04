@extends('layouts.master')

@section('title', 'Doutor HJ: Entidades')

@section('container')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Doutor HJ</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"> <a href="/">Home</a> </li>
					<li class="breadcrumb-item"> <a href="{{ route('entidades.index') }}}">Entidades</a> </li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card-box">
			<h4 class="m-t-0 header-title">Entidades</h4>
			<p class="text-muted m-b-30 font-13"}></p>

			<div class="row">
				<div class="col-12">
					<form class="form-edit-add" role="form" action="{{ route('entidades.index') }}" method="get" ecntype="multipart/form-data">

						<div class="float-right">
							<a href="{{ route('entidades.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"> <i class="fa fa-plus m-r-5"></i>Adicionar Entidade</a>
						</div>
						<div class="row">
							<div style="width: 530px !important;">
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection

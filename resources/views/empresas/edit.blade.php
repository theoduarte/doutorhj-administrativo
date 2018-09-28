@extends('layouts.master')

@section('title', 'Empresas')

@section('container')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="page-title-box">
					<h4 class="page-title">Doutor HJ</h4>
					<ol class="breadcrumb float-right">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="{{ route('empresas.index') }}">Lista de Empresas</a></li>
						<li class="breadcrumb-item active">Cadastrar Empresa</li>
					</ol>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<form action="{{ route('empresas.update', $model->id) }}" method="post">
			<input type="hidden" name="_method" value="PUT">
			{!! csrf_field() !!}

			<div class="row">
				<div class="col-12">
					<div class="card-box col-12">
						<h4 class="header-title m-t-0 m-b-30">Empresa</h4>
						<ul id="cvx-tab" class="nav nav-tabs">
							<li class="nav-item">
								<a href="#dadosEmpresa" id="dadosEmpresa-tab" data-toggle="tab" aria-expanded="true" class="nav-link active">
									Dados Gerais
								</a>
							</li>
							<li class="nav-item">
								<a href="#representantes" id="representantes-tab" data-toggle="tab" aria-expanded="false" class="nav-link">
									Representantes
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade active show" id="dadosEmpresa">
								@include('empresas/_dadosEmpresa', compact('model'))
							</div>
							<div class="tab-pane fade" id="representantes">
								@include('empresas/_representantes', compact('model', 'representantes'))
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection

@push('scripts')
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$( "#nr_cep" ).on('blur', function() {
			$('#cvx-input-loading').removeClass('cvx-no-loading');
			jQuery.ajax({
				type: 'GET',
				url: '/consulta-cep/cep/'+this.value,
				data: {
					'nr_cep': this.value,
					'_token': laravel_token
				},
				success: function (result) {
					$( this ).addClass( "done" );
					$('#cvx-input-loading').addClass('cvx-no-loading');

					if( result != null) {
						var json = JSON.parse(result.endereco);

						$('#te_endereco').val(json.logradouro);
						$('#te_bairro').val(json.bairro);
						$('#nm_cidade').val(json.cidade);
						$('#sg_logradouro').val(json.tp_logradouro);
						$('#sg_estado').val(json.estado);
						$('#cd_cidade_ibge').val(json.ibge);
						$('#nr_latitude_gps').val(json.latitude);
						$('#nr_longitute_gps').val(json.longitude);

					} else {

						$('#te_endereco').val('');
						$('#te_bairro').val('');
						$('#nm_cidade').val('');
						$('#sg_logradouro').prop('selectedIndex',0);
						$('#sg_estado').val('');
						$('#cd_cidade_ibge').val('');
						$('#sg_logradouro').prop('selectedIndex',0);
						$('#nr_latitude_gps').val('');
						$('#nr_longitute_gps').val('');
					}
				},
				error: function (result) {
					$.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
					$('#cvx-input-loading').addClass('cvx-no-loading');
				}
			});
		});

		$('#sg_estado').on('change', function() {
			var uf = $(this).val();
			if ( !uf ) return false;

			$("#nm_cidade").val('');
			$("#cd_cidade_ibge").val('');

			var instance = $( "#nm_cidade" ).autocomplete( "instance" );
			if( instance ) {
				$( "#nm_cidade" ).autocomplete('destroy');
			}

			$( "#nm_cidade" ).autocomplete({
				source: function(request, response) {
					$.getJSON(
							"/consulta-cidade",
							{ term: request.term, uf: uf },
							response
					);
				},
				select: function (event, ui) {
					$("#cd_cidade_ibge").val( ui.item.cd_ibge );
				},
				delay: 500,
				minLength: 2
			});
		});
	});
</script>
@endpush
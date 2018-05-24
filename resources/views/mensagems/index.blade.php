@extends('layouts.master')
@section('title', 'Agenda - Notificações')
@section('container')

<script>
    $(window).on('load', function(){
        
        $('#notificacoes').footable();
		
        $('.acaoVisualizar').click('click', function(e){
            $.ajax({
                url : "/notificacoes/visualizado/"+$(this).attr('id'),
                dataType: "json",
                success: function(data) {
                    response(data);
                }
            });
        });
    });
</script>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="page-title-box">
				<h4 class="page-title">Notificações</h4>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item active">Notificações</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div> 
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <p class="text-muted m-b-30 font-13"></p>
                <table id="notificacoes" class="table table-bordered toggle-circle">
                    <colgroup>
                        <col width="80">
                        <col width="440">
                        <col width="10">
                        <col width="10">
                        <col width="10">
                        <col width="10">
                    </colgroup>
                    <thead>
                        <tr>
                        	<th data-toggle="true"> Data/Hora </th>
                            <th> Assunto </th>
                            <th> Remetente </th>
                            <th> E-mail </th>
                            <th data-hide="all"> Destinatário </th>
                            <th data-hide="all"> Descrição </th>
                            <th data-hide="all"> Status </th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach( $mensagems as $msg )
                        <tr class="acaoVisualizar" id="{{$msg->id}}">
                        	<td>{{$msg->created_at}}</td>
                            <td>{{$msg->assunto}} @if($msg->visualizado) <span class="badge label-table badge-primary"> Lido </span> @else <span class="badge label-table badge-success"> Não Lido </span> @endif</td>
                            <td>{{$msg->rma_nome}}</td>
                            <td>{{$msg->rma_email}}</td>
                            <td>
                            	
                            	@switch($msg->tipo_destinatario)
                            		@case('DH') Administrativo DoctorHoje @break;
                            		@case('PC') Paciente @break;
                            		@case('CN') Responsável Clinica (Prestador) @break;
                            		@case('PF') Profissional @break;
                            		@case('UC') Usuário comum sem relacionamento @break;
                            	@endswitch
                            	</td>
                            <td>{!! $msg->conteudo !!}</td>
                            <td>
                            	<span class="badge label-table badge-primary">
                            		Lido
                            	</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <tfoot>
                	<div class="cvx-pagination">
                		<span class="text-primary">
                			{{ sprintf("%02d", $mensagems->total()) }} Registro(s) encontrado(s) e {{ sprintf("%02d", $mensagems->count()) }} Registro(s) exibido(s)
                		</span>
                		{!! $mensagems->links() !!}
                	</div>
                </tfoot>
            </div>
        </div>
    </div>
</div>
@endsection
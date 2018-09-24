@extends('layouts.master')

@section('title', 'Doutor HJ: Vouchers')

@section('container')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Doutor HJ</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('vouchers.index') }}">Lista de Vouchers</a></li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Vouchers</h4>
                    <p class="text muted m-b-30 font-13">Listagem Completa</p>

                    <div class="row">
                        <div class="col-12">
                            <form class="form-edit-add" role="form" action="{{ route('vouchers.index') }}" method="get">
                                <div class="float-right">
                                    <a href="{{ route('vouchers.create') }}" id="demo-btn-addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i> Adicionar Voucher</a>
                                </div>
                                <div class="row">
                                    <div style="width: 529px !important;">
                                        <label for="tp_filtro_cd_voucher">Filtrar por:</label><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="width: 510px !important;">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
                        <tr>
                            <th>@sortablelink('id', 'ID')</th>
                            <th>@sortablelink('titulo', 'Título')</th>
                            <th>@sortablelink('cd_voucher', 'Cód.')</th>
                            <th>Descrição</th>
                            <th>@sortablelink('prazo_utilizacao', 'Prazo de Utilização')</th>
                            <th>@sortablelink('tp_voucher_id', 'Tipo do voucher')</th>
                            <th>@sortablelink('plano_id', 'Plano')</th>
                            <th>@sortablelink('paciente_id', 'Paciente ID')</th>
                            <th>@sortablelink('campanha_id', 'Campanha ID')</th>
                            <th>Ações</th>
                        </tr>

                        @foreach($vouchers as $model)
                            <td>{{ sprintf("%04d", $model->id) }}</td>
                            <td>{{ $model->titulo }}</td>
                            <td>{{ $model->cd_voucher }}</td>
                            <td>{{ $model->ds_voucher }}</td>
                            <td>{{ $model->prazo_utilizacao }}</td>
                            <td>{{ $model->tipoVoucher->descricao }}</td>
                            <td>{{ $model->plano->ds_plano }}</td>
                            <td>{{ $model->paciente->nm_primario }}</td>
                            <td>{{ $model->campanha->titulo }}</td>
                            <td>
                                <a href="{{ route('vouchers.show', $model->id) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
                                <a href="{{ route('vouchers.edit', $model->id) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
                                <a href="{{ route('vouchers.destroy', $model->id) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja excluir o serviço: {{ $model->titulo }}"><i class="ti-trash"></i></a>
                            </td>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>

    </div>

@endsection

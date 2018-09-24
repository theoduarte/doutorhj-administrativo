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
                        <li class="breadcrumb-item"><a href="{{ route('vouchers.index') }}">Lista de Vouchers</a></li>
                        <li class="breadcrumb-item active">Cadastrar Voucher</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <form action="{{ route('vouchers.store') }}" method="post">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card-box col-12">
                        <h4 class="header-title m-t-0 m-b-30">Vouchers</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger fade show">
                                <span class="close" data-dismiss="alert">×</span>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="col-md-9">
                                    <label for="titulo">Título<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="titulo" name="titulo" placeholder="Título do Voucher" maxlength="100" required >
                                </div>
                                <div class="col-md-3">
                                    <label for="cd_voucher">Código<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="cd_voucher" name="cd_voucher" placeholder="Código" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="ds_vocuher">Descrição do Voucher</label>
                                <textarea class="form-control" id="ds_voucher" name="ds_voucher" placeholder="Descrição do Voucher"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prazo_utilizacao">Prazo de utilização<span class="text-danger">*</span></label>
                                    <input id="prazo_utilizacao" type="text" class="form-control mascaraData" name="prazo_utilizacao" placeholder="dd/mm/aaaa" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tp_voucher_id">Tipo de Voucher<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="tp_voucher_id" name="tp_voucher_id" placeholder="Tipo de voucher" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="plano_id">ID do Plano<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="plano_id" name="plano_id" placeholder="ID do Plano" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="paciente_id">ID do Paciente<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="paciente_id" name="paciente_id" placeholder="ID do Paciente" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="campanha_id">ID da campanha<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="campanha_id" name="campanha_id" placeholder="ID da campanha" required>
                                </div>
                            </div>

                        </div>
                            <div class="form-group text-right m-b-0">
                                <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-content-save"> Salvar</i> </button>
                                <a href="{{ route('vouchers.index') }}" class="btn btn-secondary waves-effect m-1-5"><i class="mdi mdi-cancel"> Cancelar</i></a>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

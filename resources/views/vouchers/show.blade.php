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
                        <li class="breadcrumb-item">Detalhes do Voucher</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-20">Detalhes do Voucher</h4>

                    <table class="table table-bordered table-striped view-doutorhj">

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

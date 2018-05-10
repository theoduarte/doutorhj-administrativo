@extends('layouts.master')

@section('title', 'Home - DoutorHJ')



@push('scripts')

@endpush



@section('container')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Bem-vindo: {{ Auth::user()->name }}!</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Painel Administrativo</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </div>
@endsection
@extends('layouts.master')

@section('title', 'Checkups')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">Doctor HJ</h4>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('checkups.index') }}">Lista de Checkups</a></li>
                    <li class="breadcrumb-item active">Configurar o Checkup</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card-box col-12">
                <h4 class="header-title m-t-0 m-b-30">Dados do Checkup</h4>

                <table class="table table-bordered table-striped view-doutorhj">
                    <tbody>
                        <tr>
                            <td>Título</td>
                            <td>Tipo</td>
                        </tr>
                        <tr>
                            <td>{{ $checkup->titulo  }}</td>
                            <td>{{ $checkup->tipo  }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="float-left">
                    <h4 class="m-t-0 header-title">Itens de Consulta</h4>
                </div>
                <div class="float-right">
                    <a href="#" id="addrow" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i>Adicionar Consulta</a>
                </div>

                <br>
                
                <table class="table table-striped table-bordered" data-page-size="4">
                    <tr>
                        <th>Consulta</th>
                        <th>NET</th>
                        <th>Comercial</th>
                        <th>Profissinais</th>
                        <!-- <th>Ações</th> -->
                    </tr>
                    @foreach ($itemCheckups as $itemCheckup)
                        <tr>
                            <td>{{ $itemCheckup->cd_consulta }} - {{ $itemCheckup->ds_consulta }}</td>
                            <td>{{ number_format($itemCheckup->vl_net_checkup, 2, ',', '.') }}</td>
                            <td>{{ number_format($itemCheckup->vl_com_checkup, 2, ',', '.') }}</td>
                            <td>{{ $itemCheckup->profissionals }}</td>
                            <!-- <td>
                                <a href="{{ route('checkups.show', $checkup) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Exibir"><i class="mdi mdi-eye"></i></a>
                                <a href="{{ route('checkups.configure', $checkup) }}" class="btn btn-icon waves-effect btn-primary btn-sm m-b-5" title="Editar"><i class="ti-settings"></i></a>
                                <a href="{{ route('checkups.edit', $checkup) }}" class="btn btn-icon waves-effect btn-secondary btn-sm m-b-5" title="Editar"><i class="mdi mdi-lead-pencil"></i></a>
                                <a href="{{ route('checkups.destroy', $checkup) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja inativar o checkup? {{ $checkup->titulo}} {{ $checkup->tipo}}"><i class="ti-trash"></i></a>
                            </td> -->
                        </tr>
                    @endforeach
                </table>
           </div>
       </div>
    </div>

    @include('checkups.new-item-consulta', ['checkup' => $checkup, 'itemCheckups' => $itemCheckups, 'especialidades' => $especialidades])

</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#addrow').click(function(){
                $('.new').show();
            });
        });
    </script>
@endpush
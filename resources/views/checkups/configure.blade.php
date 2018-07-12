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
                            <td>Status</td>
                        </tr>
                        <tr>
                            <td>{{ $checkup->titulo }}</td>
                            <td>{{ $checkup->tipo }}</td>
                            <td>{{$checkup->cs_status == 'A' ? "Ativo" : "Inativo"}}</td>
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
                    <a href="#" id="addrow-consulta" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i>Adicionar Consulta</a>
                </div>

                <br>
                
                <table class="table table-striped table-bordered" data-page-size="4">
                    <tr>
                        <th width="20%">Consulta</th>
                        <th>Com. Atend.</th>
                        <th>Com.  CHeckup</th>
                        <th>NET Atend.</th>
                        <th>NET CHeckup</th>
                        <th width="20%">Clinicas</th>
                        <th width="25%">Profissinais</th>
                        <th>Ações</th>
                    </tr>
                    @if ( !empty($itemCheckupsConsulta) )
                    <tfoot>
                        <tr>
                            <td>Totais</td>
                            <td>R$ {{ number_format($itemCheckupsConsulta[0]->total_vl_com_atendimento, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckupsConsulta[0]->total_vl_com_checkup, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckupsConsulta[0]->total_vl_net_atendimento, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckupsConsulta[0]->total_vl_net_checkup, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                    @endif
                    @foreach ($itemCheckupsConsulta as $itemCheckup)
                        <tr>
                            <td>{{ $itemCheckup->cd_consulta }} - {{ $itemCheckup->ds_consulta }}</td>
                            <td>R$ {{ number_format($itemCheckup->vl_com_atendimento, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckup->vl_com_checkup, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckup->vl_net_atendimento, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckup->vl_net_checkup, 2, ',', '.') }}</td>

                            @php 
                                $clinicas = json_decode( str_replace('\\','', $itemCheckup->clinicas) );
                                $profissionals = json_decode( str_replace('\\','', $itemCheckup->profissionals) );

                                $profissionalsArray = [];
                                foreach ( $profissionals as $profissional ) {
                                    $profissionalsArray[] =  $profissional->name;
                                }

                                $clinicasArray = [];
                                foreach ( $clinicas as $clinica ) {
                                    $clinicasArray[] =  $clinica->name;
                                }

                                $clinicasIdArray = [];
                                foreach ( $clinicas as $clinica ) {
                                    $clinicasIdArray[] =  $clinica->id;
                                }

                                $profissionalsIdArray = [];
                                foreach ( $profissionals as $profissional ) {
                                    $profissionalsIdArray[] =  $profissional->id;
                                }
                            @endphp
                            
                            <td> 
                                {{ implode($clinicasArray,', ') }}
                            </td>
                            <td> 
                                {{ implode($profissionalsArray,', ') }}
                            </td>
                            <td>
                                <a href="{{ route('item-checkups-consulta.destroy', [$itemCheckup->checkup_id, $itemCheckup->consulta_id, implode($clinicasIdArray,','), implode($profissionalsIdArray,',') ]) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja inativar este item de checkup?"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
           </div>
       </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="float-left">
                    <h4 class="m-t-0 header-title">Itens de Exames/procedimentos</h4>
                </div>
                <div class="float-right">
                    <a href="#" id="addrow-exame" class="btn btn-primary m-b-20"><i class="fa fa-plus m-r-5"></i>Adicionar Exame/Procedimento</a>
                </div>

                <br>
                
                <table class="table table-striped table-bordered" data-page-size="4">
                    <tr>
                        <th width="35%">Exame/Procedimento</th>
                        <th>Com. Atend.</th>
                        <th>Com.  CHeckup</th>
                        <th>NET Atend.</th>
                        <th>NET CHeckup</th>
                        <th width="30%">Clinicas</th>
                        <th>Ações</th>
                    </tr>
                    @if ( !empty($itemCheckupsExame) )
                    <tfoot>
                        <tr>
                            <td>Totais</td>
                            <td>R$ {{ number_format($itemCheckupsExame[0]->total_vl_com_atendimento, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckupsExame[0]->total_vl_com_checkup, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckupsExame[0]->total_vl_net_atendimento, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckupsExame[0]->total_vl_net_checkup, 2, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                    @endif
                    @foreach ($itemCheckupsExame as $itemCheckup)
                        <tr>
                            <td>{{ $itemCheckup->cd_procedimento }} - {{ $itemCheckup->ds_procedimento }}</td>
                            <td>R$ {{ number_format($itemCheckup->vl_com_atendimento, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckup->vl_com_checkup, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckup->vl_net_atendimento, 2, ',', '.') }}</td>
                            <td>R$ {{ number_format($itemCheckup->vl_net_checkup, 2, ',', '.') }}</td>

                            @php 
                                $clinicas = json_decode( str_replace('\\','', $itemCheckup->clinicas) );

                                $clinicasArray = [];
                                foreach ( $clinicas as $clinica ) {
                                    $clinicasArray[] =  $clinica->name;
                                }

                                $clinicasIdArray = [];
                                foreach ( $clinicas as $clinica ) {
                                    $clinicasIdArray[] =  $clinica->id;
                                }
                            @endphp
                            
                            <td> 
                                {{ implode($clinicasArray,', ') }}
                            </td>
                            <td>
                                <a href="{{ route('item-checkups-exame.destroy', [$itemCheckup->checkup_id, $itemCheckup->procedimento_id, implode($clinicasIdArray,','), implode($profissionalsIdArray,',') ]) }}" class="btn btn-danger waves-effect btn-sm m-b-5 btn-delete-cvx" title="Excluir" data-method="DELETE" data-form-name="form_{{ uniqid() }}" data-message="Tem certeza que deseja inativar este item de checkup?"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
           </div>
       </div>
    </div>

    @include('checkups.new-item-consulta', ['checkup' => $checkup, 'itemCheckups' => $itemCheckupsConsulta, 'especialidades' => $especialidades])
    @include('checkups.new-item-exame', ['checkup' => $checkup, 'itemCheckups' => $itemCheckupsExame, 'grupoProcedimentos' => $grupoProcedimentos])

</div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#addrow-consulta').click(function(){
                $('.new-item-exame').hide();
                $('.new-item-consulta').show();
                $([document.documentElement, document.body]).animate({
                        scrollTop: $(".new-item-consulta").offset().top
                    }, 600);
            });

            $('#addrow-exame').click(function(){
                $('.new-item-consulta').hide();
                $('.new-item-exame').show();
                $([document.documentElement, document.body]).animate({
                        scrollTop: $(".new-item-exame").offset().top
                    }, 600);
            });
        });
    </script>
@endpush
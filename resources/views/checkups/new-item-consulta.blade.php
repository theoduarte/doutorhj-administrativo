<div class="container-fluid new" style="display: none">
	<div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card-box">
                <h4 class="header-title m-t-0">Adicionar novo item ao checkup</h4>
                
                <form action="{{ route('checkups.store') }}" method="post">
                
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="especialidade_id">Especialidade<span class="text-danger">*</span></label>
                        <select id="especialidade_id" class="form-control" name="especialidade_id" required>
                            <option value="">Selecione</option>
                            @foreach( $especialidades as $especialidade)
                                 <option value="{{ $especialidade->id }}">{{ $especialidade->ds_especialidade }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="consulta_id">Consulta<span class="text-danger">*</span></label>
                        <select id="consulta_id" class="form-control" name="consulta_id" required>
                            <option value="">Selecione</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="clinica_id">Clinica<span class="text-danger">*</span></label>
                        <select id="clinica_id" class="form-control" name="clinica_id" required>
                            <option value="">Selecione</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="profissional_id">Profissional</label>
                        <select id="profissional_id" class="form-control" name="profissional_id">
                            <option value="">Selecione</option>
                        </select>
                    </div>
                    
                    
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="vl_com_atendimento">Vl. comercial</label>
                            <input type="text" id="vl_com_atendimento" class="form-control" name="vl_com_atendimento" readonly>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="vl_net_atendimento">Vl. NET</label>
                            <input type="text" id="vl_net_atendimento" class="form-control" name="vl_net_atendimento" readonly>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for="vl_com_checkup">Vl. comercial checkup</label>
                            <input type="text" id="vl_com_checkup" class="form-control" name="vl_com_checkup" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="vl_net_checkup">Vl. NET checkup</label>
                            <input type="text" id="vl_net_checkup" class="form-control" name="vl_net_checkup" required>
                        </div>
                        
                        

                        
                        <div class="form-group text-right m-b-0">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
                            <a href="#" class="btn btn-secondary waves-effect m-l-5 cancel-new"><i class="mdi mdi-cancel"></i> Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function($) {
            $('.cancel-new').click(function(){
                $('.new form').find('text').val('');
                $('.new form').find(':radio').prop('checked', false); 
                $('.new').hide();
            });
        });

        $(document).ready(function($) {
            $('#especialidade_id').change(function(){
                $.ajax({
                    type     : 'get',
                    url      : "/get-active-clinicas-by-especialidade",
                    dataType : 'json',
                    data     : {especialidade_id: $(this).val()},
                    success  : function(data) {
                        $('#clinica_id').html('');
                        $('#clinica_id').append('<option value="">Selecione</option>');
                        console.log(data);

                        for( var i = 0; i < data.length; i++ ){
                            $('#clinica_id').append('<option value="' + data[i].id + '">' + data[i].nm_fantasia + '</option>');
                        }
                    }
                });

                $.ajax({
                    type     : 'get',
                    url      : "/get-active-consultas-by-especialidade",
                    dataType : 'json',
                    data     : {especialidade_id: $(this).val()},
                    success  : function(data) {
                        $('#consulta_id').html('');
                        $('#consulta_id').append('<option value="">Selecione</option>');
                        console.log(data);

                        for( var i = 0; i < data.length; i++ ){
                            $('#consulta_id').append('<option value="' + data[i].id + '">' + data[i].cd_consulta + ' - ' + data[i].ds_consulta + '</option>');
                        }
                    }
                });
            });

            $('#clinica_id').change(function(){
                $.ajax({
                    type     : 'get',
                    url      : "/get-active-profissionals-by-clinica",
                    dataType : 'json',
                    data     : {clinica_id: $(this).val(),especialidade_id: $('#especialidade_id').val()},
                    success  : function(data) {
                        $('#profissional_id').html('');
                        $('#profissional_id').append('<option value="">Selecione</option>');
                        console.log(data);

                        for( var i = 0; i < data.length; i++ ){
                            $('#profissional_id').append('<option value="' + data[i].id + '">' + data[i].nm_primario + ' ' + data[i].nm_secundario + '</option>');
                        }
                    }
                });
            });

            $('#profissional_id').change(function(){
                $.ajax({
                    type     : 'get',
                    url      : "/get-atendimento-values-by-consulta",
                    dataType : 'json',
                    data     : {clinica_id: $('#clinica_id').val(),consulta_id: $('#consulta_id').val(),profissional_id: $(this).val()},
                    success  : function(data) {
                        $('#vl_com_atendimento').val(data[0].vl_com_atendimento);
                        $('#vl_net_atendimento').val(data[0].vl_net_atendimento);
                    }
                });
            });
        });
    </script>
@endpush
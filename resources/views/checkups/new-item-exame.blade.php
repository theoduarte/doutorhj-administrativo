<div class="container-fluid new-item-exame" style="display: none">
	<div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card-box">
                <h4 class="header-title m-t-0">Adicionar novo item de exame ao checkup</h4>
                
                <form action="{{ route('item-checkups-exame.store', $checkup) }}" method="post">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="grupo_procedimento_id">Grupo de Procedimentos<span class="text-danger">*</span></label>
                        <select id="grupo_procedimento_id" class="form-control" name="grupo_procedimento_id" required>
                            <option value="">Selecione</option>
                            @foreach( $grupoProcedimentos as $grupoProcedimento)
                                 <option value="{{ $grupoProcedimento->id }}">{{ $grupoProcedimento->ds_grupo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="procedimento_id">Exame/Procedimento<span class="text-danger">*</span></label>
                        <select id="procedimento_id" class="form-control" name="procedimento_id" required>
                            <option value="">Selecione</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="clinica_id">Clinica<span class="text-danger">*</span></label>
                        <select id="clinica_id" class="form-control" name="clinica_id" required>
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
                            <label for="vl_com_checkup">Vl. com. checkup<span class="text-danger">*</span></label>
                            <input type="text" id="vl_com_checkup" class="form-control" name="vl_com_checkup" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="vl_net_checkup">Vl. NET checkup<span class="text-danger">*</span></label>
                            <input type="text" id="vl_net_checkup" class="form-control" name="vl_net_checkup" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="ds_item">Observação</label>
                            <textarea id="ds_item" class="form-control" name="ds_item"></textarea>
                    </div>
                        
                    <div class="form-group text-right m-b-0">
                        <button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Salvar</button>
                        <a href="#" class="btn btn-secondary waves-effect m-l-5 cancel-new-exame"><i class="mdi mdi-cancel"></i> Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function($) {
            $('.cancel-new-exame').click(function(){
                $('.new-item-exame form').find(':text').val('');
                $('.new-item-exame form').find('select').val('');
                $('.new-item-exame').hide();
            });

            $('.new-item-exame #grupo_procedimento_id').change(function(){
                $.ajax({
                    type     : 'get',
                    url      : "/get-active-procedimentos-by-grupo-procedimento",
                    dataType : 'json',
                    data     : {grupo_procedimento_id: $(this).val()},
                    success  : function(data) {
                        $('.new-item-exame #vl_com_atendimento').val('');
                        $('.new-item-exame #vl_net_atendimento').val('');

                        $('.new-item-exame #procedimento_id').html('');
                        $('.new-item-exame #procedimento_id').append('<option value="">Selecione</option>');

                        for( var i = 0; i < data.length; i++ ){
                            $('.new-item-exame #procedimento_id').append('<option value="' + data[i].id + '">' + data[i].cd_procedimento + ' - ' + data[i].ds_procedimento + '</option>');
                        }
                    }
                });
            });

            $('.new-item-exame #procedimento_id').change(function(){
                $.ajax({
                    type     : 'get',
                    url      : "/get-active-clinicas-by-procedimento",
                    dataType : 'json',
                    data     : {procedimento_id: $(this).val()},
                    success  : function(data) {
                        $('.new-item-exame #vl_com_atendimento').val('');
                        $('.new-item-exame #vl_net_atendimento').val('');

                        $('.new-item-exame #clinica_id').html('');
                        $('.new-item-exame #clinica_id').append('<option value="">Selecione</option>');
                        console.log(data);

                        for( var i = 0; i < data.length; i++ ){
                            $('.new-item-exame #clinica_id').append('<option value="' + data[i].id + '">' + data[i].nm_fantasia + '</option>');
                        }
                    }
                });
            });

            $('.new-item-exame #clinica_id').change(function(){
                $.ajax({
                    type     : 'get',
                    url      : "/get-atendimento-values-by-procedimento",
                    dataType : 'json',
                    data     : {clinica_id: $('#clinica_id').val(),procedimento_id: $('#procedimento_id').val()},
                    success  : function(data) {
                        $('.new-item-exame #vl_com_atendimento').val(data.vl_com_atendimento);
                        $('.new-item-exame #vl_net_atendimento').val(data.vl_net_atendimento);
                    }
                });
            });

        });
    </script>
@endpush
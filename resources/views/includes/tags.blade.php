<div id="tags-populares-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tagsModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" style="margin-top: -10%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="edit-profisisonal-title-modal">DrHoje: Lista de Nomes Populares</h4>
            </div>
            <div class="modal-body" style="padding: 0px;">
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header cvx-card-header" role="tab" id="headingOne">
                            <h5 class="mb-0 mt-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i></i> ADICIONAR NOME POPULAR</a>
                            </h5>
                        </div>
                        <div id="collapseOne"  class="collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="cs_tag" class="form-control" maxlength="150" placeholder="Informe um Nome Popular e clique em Salvar">
                                            <input type="hidden" id="ct_tag_id" >
                                            <input type="hidden" id="tag_atendimento_id" >
                                            <input type="hidden" id="tag_tipo_atendimento" value="proced" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="modal-footer">
                                        <button type="button" id="btn-save-tag" class="btn btn-sm btn-primary waves-effect waves-light" onclick="addTagPopular(this)"><i class="mdi mdi-content-save"></i> Salvar</button>
                                        <button type="button" class="btn btn-sm btn-secondary waves-effect waves-light" onclick="$('#cs_tag').val('');$('#ct_tag_id').val('');"><i class="mdi mdi-tag-plus"></i> Nova Tag</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header cvx-card-list" role="tab" id="headingTwo">
                            <h5 class="mb-0 mt-0">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><i class="ion-clipboard"></i> NOME POPULARES PARA: <br><strong><span id="tag"></span></strong></a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body" style="padding: 0px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <table class="table table-striped table-bordered table-doutorhj" data-page-size="7">
                                                <tr>
                                                    <th style="width: 20px; text-align: center;"><i class="ion-pound"></i></th>
                                                    <th>Nome Popular</th>
                                                    <th style="width: 40px;">(+)</th>
                                                    <th style="width: 40px;">(-)</th>
                                                </tr>
                                                <tbody id="list-all-tags-populares"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">

var type = '';
function loadTags(element, id, tag, type) {
    
    $('#tag').html(tag);
    $('#tag_atendimento_id').val(id);

    this.type = type;

    jQuery.ajax({
        type: 'GET',
        dataType: "json",
        url: '/load-tag-popular',
        data: {
            'tag_atendimento_id': id,
            'tipo_tag': this.type
        },
        success: function (result) {
            
            if(result.status) {

                var list_tag_popular = JSON.parse(result.list_tag_popular);

                var num_tags = list_tag_popular.length;

                $('#list-all-tags-populares').empty();
                
                for(var i = 0; i < num_tags; i++) {

                    var index = i+1;
                    var tag_id = list_tag_popular[i].id;
                    var cs_tag = list_tag_popular[i].cs_tag;
                    
                    var content_item = '<tr> \
                        <td class="num_filial">'+tag_id+'</td> \
                        <td>'+cs_tag+'</td> \
                        <td><button type="button" class="btn btn-success waves-effect waves-light btn-sm m-b-5" title="Editar Tag Popular" onclick="editTagPopular(this)" style="margin-top: 2px;"><i class="ion-edit"></i></button></td> \
                        <td><button type="button" class="btn btn-danger waves-effect waves-light btn-sm m-b-5" title="Remover Tag Popular" onclick="removeTagPopular(this, '+"'"+cs_tag+"'"+', '+tag_id+')" style="margin-top: 2px;"><i class="ion-trash-a"></i></button></td> \
                    </tr>';

                     $('#list-all-tags-populares').append(content_item);
                        
                }

                $('#cs_tag').val('');
                $("#tags-populares-modal").modal();
                 
            }
        },
        error: function (result) {
            
            swal(({
                title: "Oops",
                text: "Falha na operação!",
                type: 'error',
                confirmButtonClass: 'btn btn-confirm mt-2'
            }));
        }
    });
}

function addTagPopular(input) {


    if( $('#cs_tag').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'O Nome popular é campo obrigatório. Por favor, tente novamente.'); return false; }
    if( $('#tag_atendimento_id').val().length == 0 ) { $.Notification.notify('error','top right', 'Solicitação Falhou!', 'Atendimento não localizado. Por favor, tente novamente.'); return false; }

    $(input).html('<i class="fa fa-spin fa-spinner"></i> Enviando...');
    
    var cs_tag = $('#cs_tag').val();
    var tag_id = $('#ct_tag_id').val();
    var tag_atendimento_id = $('#tag_atendimento_id').val();
    var tag_tipo_atendimento = this.type;
    
    // console.log(this.type);
    // console.log(tag_tipo_atendimento);
    
    jQuery.ajax({
        type: 'POST',
        url: '/add-tag-popular',
        data: {
            'tag_id': tag_id,
            'cs_tag': cs_tag,
            'tag_atendimento_id': tag_atendimento_id,
            'tipo_atendimento': tag_tipo_atendimento,
            '_token': laravel_token
        },
        success: function (result) {

            $(input).html('<i class="mdi mdi-content-save"></i> Salvar');
            
            if(result.status) {

                var tag_popular = JSON.parse(result.tag_popular);

                var num_elements = $('#list-all-tags-populares tr').length;
                num_elements++;

                var content = '<tr> \
                    <td class="num_filial">'+tag_popular.id+'</td> \
                    <td>'+tag_popular.cs_tag+'</td> \
                    <td><button type="button" class="btn btn-success waves-effect waves-light btn-sm m-b-5" title="Editar Tag Popular" onclick="editTagPopular(this)" style="margin-top: 2px;"><i class="ion-edit"></i></button></td> \
                    <td><button type="button" class="btn btn-danger waves-effect waves-light btn-sm m-b-5" title="Remover Tag Popular" onclick="removeTagPopular(this, '+"'"+tag_popular.cs_tag+"'"+', '+tag_popular.id+')" style="margin-top: 2px;"><i class="ion-trash-a"></i></button></td> \
                </tr>';

                $('#list-all-tags-populares').append(content);
                $('#cs_tag').val('');

                swal({
                    title: 'DoutorHoje',
                    text: result.mensagem,
                    type: 'success',
                    confirmButtonClass: 'btn btn-confirm mt-2',
                    confirmButtonText: 'OK'
                }).then(function () {
                 $('.modal').removeClass('in').attr("aria-hidden","true").off('click.dismiss.modal').removeClass('show');
                    $('.modal').css("display", "none");
                    $('.modal-backdrop').remove();
                    $('body').removeClass('modal-open');
                    window.location.reload(false); 
                });
                 
            } else {
                swal(({
                    title: "Oops",
                    text: result.mensagem,
                    type: 'error',
                    confirmButtonClass: 'btn btn-confirm mt-2'
                }));
            }
        },
        error: function (result) {
            $(input).html('<i class="mdi mdi-content-save"></i> Salvar');
            
            swal(({
                title: "Oops",
                text: "Falha na operação!",
                type: 'error',
                confirmButtonClass: 'btn btn-confirm mt-2'
            }));
        }
    });
}

function editTagPopular(element) {
    var ct_tag_id = $(element).parent().parent().find('td:nth-child(1)').html();
    var cs_tag = $(element).parent().parent().find('td:nth-child(2)').html();

    $('#ct_tag_id').val(ct_tag_id);
    $('#cs_tag').val(cs_tag);

    if($('.cvx-card-header').find('a').hasClass('collapsed')) {
        $('.cvx-card-header').find('a').trigger("click");
    }
}

function removeTagPopular(input, cs_tag, tag_id) {
    if(tag_id.length == 0) {
        swal({
                title: 'DoutorHoje: Alerta!',
                text: "Nenhum Nome popular foi selecionado!",
                type: 'warning',
                confirmButtonClass: 'btn btn-confirm mt-2'
            }
        );
        return false;
    }
    
    var mensagem = 'Tem certeza que deseja remover o Nome popular: '+cs_tag;
    swal({
        title: mensagem,
        text: "O Registro será removido da lista",
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-confirm mt-2',
        cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Cancelar'
    }).then(function () {

        $(input).find('i').removeClass('ion-trash-a').addClass('fa fa-spin fa-spinner');

        jQuery.ajax({
            type: 'POST',
            url: '/delete-tag-popular',
            data: {
                'tag_id': tag_id,
                '_token': laravel_token
            },
            success: function (result) {

                if( result.status) {
                    
                    swal({
                        title: 'DoutorHoje',
                        text: result.mensagem,
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        confirmButtonText: 'OK'
                    }).then(function () {
                        $(input).parent().parent().css('background-color', '#ffbfbf');
                        $(input).parent().parent().fadeOut(400, function(){
                            $(input).parent().parent().remove();
                        });
        
                        window.location.reload(false);
                    });
                    
                } else {
                    $.Notification.notify('error','top right', 'DoutorHoje', result.mensagem);
                }

                $(input).find('i').removeClass('fa fa-spin fa-spinner').addClass('ion-trash-a');
            },
            error: function (result) {
                $(input).find('i').removeClass('fa fa-spin fa-spinner').addClass('ion-trash-a');
                $.Notification.notify('error','top right', 'DrHoje', 'Falha na operação!');
            }
        });
    });
}
</script>

@endpush
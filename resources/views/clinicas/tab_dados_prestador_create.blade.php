<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    * html .ui-autocomplete {
        height: 200px;
    }
</style>
<?php
/*
@if($errors->any())
    <div class="col-12 alert alert-danger">
        @foreach ($errors->all() as $error)<div class="col-5">{{ $error }}</div>@endforeach
    </div>
@endif
*/
?>
{!! csrf_field() !!}
<div class="row">
    <div class="col-sm-12 col-md-6">
        <h4>Dados Cadastrais da Clínica</h4>
        <div class="row">
            <div class="col-sm-12 col-md-10">
                <div class="form-group{{ $errors->has('nm_razao_social') ? ' has-error' : '' }}">
                    <label for="nm_razao_social" class="control-label">Razão Social<span class="text-danger">*</span></label>
                    <div class="">
                        <input type="text" id="nm_razao_social" class="form-control" name="nm_razao_social" value="{{ old('nm_razao_social') }}" required  maxlength="150" autofocus>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('nm_fantasia') ? ' has-error' : '' }}">
                    <label for="nm_fantasia" class="control-label">Nome Fantasia<span class="text-danger">*</span></label>
                    <div class="">
                        <input id="nm_fantasia" type="text" class="form-control" name="nm_fantasia" value="{{ old('nm_fantasia') }}" required  maxlength="150">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('te_documento') ? ' has-error' : '' }}">
                    <label for="te_documento" class="control-label">CNPJ / Inscrição Estadual<span class="text-danger">*</span></label>
                    <div class="">
                        <input type="text" id="te_documento" class="form-control mascaraCNPJ" value="{{ old('te_documento') }}" onkeyup="$('#te_documento_no_mask').val($(this).val().replace(/[^\d]+/g,''))" maxlength="30" >
                        <input type="hidden" id="te_documento_no_mask" name="te_documento" value="{{ preg_replace('/[^0-9]/', '', old('te_documento')) }}" maxlength="30" >
                        <input type="hidden" name="tp_documento" value="CNPJ">
                        <input type="hidden" id="cnpj_id" name="cnpj_id" >
                        @if ($errors->has('te_documento'))
                            <span class="help-block text-danger">
                        <strong>{{ $errors->first('te_documento') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('tp_contato') ? ' has-error' : '' }}">
                    <label for="tp_contato1" class="control-label">Telefone<span class="text-danger">*</span></label>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <select id="tp_contato" name="tp_contato" class="form-control">
                                <option value="FC" @if ( old('tp_contato') == 'FC') selected="selected"  @endif>Telefone Comercial</option>
                                <option value="CC" @if ( old('tp_contato') == 'CC') selected="selected"  @endif>Celular Comercial</option>
                                <option value="FX" @if ( old('tp_contato') == 'FX') selected="selected"  @endif>FAX</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <input type="text" id="ds_contato" placeholder="" class="form-control mascaraTelefone" name="ds_contato" value="{{ old('ds_contato') }}" required >
                            <input type="hidden" id="contato_id" name="contato_id" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <h4>Dados Pessoais do Responsável</h4>
        <div class="row">
            <div class="col-sm-12 col-md-10">
                <div class="form-group{{ $errors->has('name_responsavel') ? ' has-error' : '' }}">
                    <div class="">
                        <label for="name_responsavel" class="control-label">Nome<span class="text-danger">*</span></label>
                        <div class="">
                            <input type="text"  id="name_responsavel" class="form-control" name="name_responsavel" value="{{ old('name_responsavel') }}" required  maxlength="50">
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('cpf_responsavel') ? ' has-error' : '' }}">
                    <div class="">
                        <label for="cpf_responsavel" class="control-label">CPF<span class="text-danger">*</span></label>
                        <div class="">
                            <input type="text" id="cpf_responsavel" class="form-control mascaraCPF" name="cpf_responsavel" value="{{ old('cpf_responsavel') }}" required  maxlength="14">
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('telefone_responsavel') ? ' has-error' : '' }}">
                    <div class="">
                        <label for="telefone_responsavel" class="control-label">Telefone<span class="text-danger">*</span></label>
                        <div class="">
                            <input type="text" id="telefone_responsavel" class="form-control mascaraTelefone" name="telefone_responsavel" value="{{ old('telefone_responsavel') }}" required  maxlength="20">
                        </div>
                        @if ($errors->has('telefone_responsavel'))
                            <span class="help-block text-danger">
                        <strong>{{ $errors->first('telefone_responsavel') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
        <br>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <h4>Endereço Comercial</h4>
        <div class="row">
            <div class="col-sm-12 col-md-2">
                <div class="form-group{{ $errors->has('nr_cep') | $errors->has('cd_cidade_ibge') ? ' has-error' : '' }}">
                    <label for="nr_cep" class="control-label">CEP<span class="text-danger">*</span></label>
                    <input id="nr_cep" type="text" class="form-control mascaraCEP consultaCep" name="nr_cep" value="{{ old('nr_cep') }}" required  maxlength="10">
                    <input type="hidden" id="endereco_id" name="endereco_id" >
                    {{--<input type="hidden" id="nr_latitude_gps" name="nr_latitude_gps" value="{{ old('nr_latitude_gps') }}" >
                    <input type="hidden" id="nr_longitute_gps" name="nr_longitute_gps" value="{{ old('nr_longitute_gps') }}" >--}}
                    @if ($errors->has('cd_cidade_ibge'))
                        <span class="help-block text-danger">
                    <strong>Cód. IBGE não Encontrado!</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group{{ $errors->has('te_endereco') ? ' has-error' : '' }}">
                    <label for="te_endereco" class="control-label">Endereço<span class="text-danger">*</span></label>
                    <input id="te_endereco" type="text" class="form-control" name="te_endereco" value="{{ old('te_endereco') }}" required  maxlength="200">
                    <i id="cvx-input-loading" class="cvx-input-loading cvx-no-loading fa fa-spin fa-circle-o-notch"></i>
                </div>
            </div>
            <div class="col-sm-3 col-md-1">
                <div class="form-group{{ $errors->has('nr_logradouro') ? ' has-error' : '' }}">
                    <label for="nr_logradouro" class="control-label">Número<span class="text-danger">*</span></label>
                    <input id="nr_logradouro" type="text" class="form-control" name="nr_logradouro" value="{{ old('nr_logradouro') }}" required  maxlength="50">
                </div>
            </div>
            <div class="col-sm-9 col-md-3">
                <div class="form-group{{ $errors->has('sg_logradouro') ? ' has-error' : '' }}">
                    <label for="sg_logradouro" class="control-label">Logradouro<span class="text-danger">*</span></label>
                    <select id="sg_logradouro" name="sg_logradouro" class="form-control">
                        <option value="" selected="selected"></option>
                        <option value="Aeroporto" @if ( old('sg_logradouro') == 'Aeroporto') selected="selected" @endif>Aeroporto</option>
                        <option value="Alameda" @if ( old('sg_logradouro') == 'Alameda') selected="selected" @endif>Alameda</option>
                        <option value="Área" @if ( old('sg_logradouro') == 'Área') selected="selected" @endif>Área</option>
                        <option value="Avenida" @if ( old('sg_logradouro') == 'Avenida') selected="selected" @endif>Avenida</option>
                        <option value="Campo" @if ( old('sg_logradouro') == 'Campo') selected="selected" @endif>Campo</option>
                        <option value="Chácara" @if ( old('sg_logradouro') == 'Chácara') selected="selected" @endif>Chácara</option>
                        <option value="Colônia" @if ( old('sg_logradouro') == 'Colônia') selected="selected" @endif>Colônia</option>
                        <option value="Condomínio" @if ( old('sg_logradouro') == 'Condomínio') selected="selected" @endif>Condomínio</option>
                        <option value="Conjunto" @if ( old('sg_logradouro') == 'Conjunto') selected="selected" @endif>Conjunto</option>
                        <option value="Distrito" @if ( old('sg_logradouro') == 'Distrito') selected="selected" @endif>Distrito</option>
                        <option value="Esplanada" @if ( old('sg_logradouro') == 'Esplanada') selected="selected" @endif>Esplanada</option>
                        <option value="Estação" @if ( old('sg_logradouro') == 'Estação') selected="selected" @endif>Estação</option>
                        <option value="Estrada" @if ( old('sg_logradouro') == 'Estrada') selected="selected" @endif>Estrada</option>
                        <option value="Favela" @if ( old('sg_logradouro') == 'Favela') selected="selected" @endif>Favela</option>
                        <option value="Feira" @if ( old('sg_logradouro') == 'Feira') selected="selected" @endif>Feira</option>
                        <option value="Jardim" @if ( old('sg_logradouro') == 'Jardim') selected="selected" @endif>Jardim</option>
                        <option value="Ladeira" @if ( old('sg_logradouro') == 'Ladeira') selected="selected" @endif>Ladeira</option>
                        <option value="Lago" @if ( old('sg_logradouro') == 'Lago') selected="selected" @endif>Lago</option>
                        <option value="Lagoa" @if ( old('sg_logradouro') == 'Lagoa') selected="selected" @endif>Lagoa</option>
                        <option value="Largo" @if ( old('sg_logradouro') == 'Aeroporto') selected="selected" @endif>Largo</option>
                        <option value="Loteamento" @if ( old('sg_logradouro') == 'Loteamento') selected="selected" @endif>Loteamento</option>
                        <option value="Morro" @if ( old('sg_logradouro') == 'Morro') selected="selected" @endif>Morro</option>
                        <option value="Núcleo" @if ( old('sg_logradouro') == 'Núcleo') selected="selected" @endif>Núcleo</option>
                        <option value="Parque" @if ( old('sg_logradouro') == 'Parque') selected="selected" @endif>Parque</option>
                        <option value="Passarela" @if ( old('sg_logradouro') == 'Passarela') selected="selected" @endif>Passarela</option>
                        <option value="Pátio" @if ( old('sg_logradouro') == 'Pátio') selected="selected" @endif>Pátio</option>
                        <option value="Praça" @if ( old('sg_logradouro') == 'Praça') selected="selected" @endif>Praça</option>
                        <option value="Quadra" @if ( old('sg_logradouro') == 'Quadra') selected="selected" @endif>Quadra</option>
                        <option value="Recanto" @if ( old('sg_logradouro') == 'Recanto') selected="selected" @endif>Recanto</option>
                        <option value="Residencial" @if ( old('sg_logradouro') == 'Residencial') selected="selected" @endif>Residencial</option>
                        <option value="Rodovia" @if ( old('sg_logradouro') == 'Rodovia') selected="selected" @endif>Rodovia</option>
                        <option value="Rua" @if ( old('sg_logradouro') == 'Rua') selected="selected" @endif>Rua</option>
                        <option value="Setor" @if ( old('sg_logradouro') == 'Setor') selected="selected" @endif>Setor</option>
                        <option value="Sítio" @if ( old('sg_logradouro') == 'Sítio') selected="selected" @endif>Sítio</option>
                        <option value="Travessa" @if ( old('sg_logradouro') == 'Travessa') selected="selected" @endif>Travessa</option>
                        <option value="Trecho" @if ( old('sg_logradouro') == 'Trecho') selected="selected" @endif>Trecho</option>
                        <option value="Trevo" @if ( old('sg_logradouro') == 'Trevo') selected="selected" @endif>Trevo</option>
                        <option value="Vale" @if ( old('sg_logradouro') == 'Vale') selected="selected" @endif>Vale</option>
                        <option value="Vereda" @if ( old('sg_logradouro') == 'Vereda') selected="selected" @endif>Vereda</option>
                        <option value="Via" @if ( old('sg_logradouro') == 'Via') selected="selected" @endif>Via</option>
                        <option value="Viaduto" @if ( old('sg_logradouro') == 'Viaduto') selected="selected" @endif>Viaduto</option>
                        <option value="Viela" @if ( old('sg_logradouro') == 'Viela') selected="selected" @endif>Viela</option>
                        <option value="Vila" @if ( old('sg_logradouro') == 'Vila') selected="selected" @endif>Vila</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group{{ $errors->has('te_bairro') ? ' has-error' : '' }}">
                    <label for="te_bairro" class="control-label">Bairro<span class="text-danger">*</span></label>
                    <input id="te_bairro" type="text" class="form-control" name="te_bairro" value="{{ old('te_bairro') }}" required  maxlength="50">
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group{{ $errors->has('te_complemento') ? ' has-error' : '' }}">
                    <label for="te_complemento" class="control-label">Complemento</label>
                    <textarea rows="1" cols="10" id="te_complemento" class="form-control" name="te_complemento" value="{{ old('te_complemento') }}"  maxlength="1000"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <div class="form-group{{ $errors->has('nm_cidade') ? ' has-error' : '' }}">
                    <label for="nm_cidade" class="control-label">Cidade<span class="text-danger">*</span></label>
                    <input id="nm_cidade" type="text" class="form-control" name="nm_cidade" value="{{ old('nm_cidade') }}" required  maxlength="50" readonly>
                    <input id="cd_cidade_ibge" type="hidden" name="cd_cidade_ibge" value="{{ old('cd_cidade_ibge') }}" >
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <div class="form-group{{ $errors->has('sg_estado') ? ' has-error' : '' }}">
                    <label for="sg_estado" class="control-label">Estado<span class="text-danger">*</span></label>
                    <select id="sg_estado" name="sg_estado" class="form-control" readonly>
                        <option></option>
                        @foreach ($estados as $uf)
                            <option value="{{ $uf->sg_estado }}" @if ( old('sg_estado') == $uf->sg_estado) selected="selected" @endif >{{ $uf->ds_estado }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="form-group{{ $errors->has('nr_latitude_gps') ? ' has-error' : '' }}">
                    <label for="nr_latitude_gps" class="control-label">Latitude<span class="text-danger">*</span></label>
                    <input id="nr_latitude_gps" type="text" class="form-control" name="nr_latitude_gps" value="{{ old('nr_latitude_gps') }}" required  maxlength="50">
                    <!-- onkeypress="onlyNumbers(event)" -->
                </div>
            </div>
            <div class="col-sm-6 col-md-2">
                <div class="form-group{{ $errors->has('nr_longitute_gps') ? ' has-error' : '' }}">
                    <label for="nr_longitute_gps" class="control-label">Longitude<span class="text-danger">*</span></label>
                    <input id="nr_longitute_gps" type="text" class="form-control" name="nr_longitute_gps" value="{{ old('nr_longitute_gps') }}" required  maxlength="50">
                </div>
            </div>
        </div>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
        <br>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <h4>Dados de Acesso da Empresa</h4>
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-mail<span class="text-danger">*</span></label>
                    <input id="email" type="email" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="email" value="{{ old('email') }}" required  maxlength="50">
                    @if ($errors->has('email'))
                        <span class="help-block text-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Senha<span class="text-danger">*</span></label>
                    <input id="password" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password" value="{{ old('password') }}" required  maxlength="50">
                    @if ($errors->has('password'))
                        <span class="help-block text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-2">
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password_confirmation" class="control-label">Repita a Senha<span class="text-danger">*</span></label>
                    <input id="password_confirmation" type="password" class="form-control semDefinicaoLetrasMaiusculasMinusculas" name="password_confirmation" value="{{ old('password_confirmation') }}" required  maxlength="50">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block text-danger">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group text-right m-b-0">
                    <button type="submit" class="btn btn-primary waves-effect waves-light" ><i class="mdi mdi-content-save"></i> Cadastrar</button>
                    <a href="{{ route('clinicas.index') }}" class="btn btn-secondary waves-effect m-l-5"><i class="mdi mdi-cancel"></i> Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $( function() {
        $( function() {
            var availableTags = [
                @foreach ($cargos as $cargo)
                    '{{ $cargo->id ." | ". $cargo->ds_cargo }}',
                @endforeach
            ];

            $( "#ds_cargo" ).autocomplete({
                source: availableTags,
                select: function (event, ui) {
                    var id_cargo = ui.item.value.split(' | ');
                    $("#cargo_id").val(id_cargo[0]);
                },
                delay: 500,
                minLength: 4
            });
        });


    });
</script>
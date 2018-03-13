<style>
    .ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
    }
    * html .ui-autocomplete {
        height: 200px;
    }
</style>

<div class="form-group{{ $errors->has('nm_razao_social') ? ' has-error' : '' }}">
	<div class="row">
		<form name="formPrecificacaoConsultas">
            <label for="nm_razao_social" class="col-12 control-label">Consulta ou Procedimento / Preço<span class="text-danger">*</span></label>
            <div class="col-3 ui-widget">
                <input id="ds_consulta" type="text" class="form-control consultaProcedimentos" name="ds_consulta" value="{{ old('ds_consulta') }}" autofocus maxlength="100">
           		<input type="hidden" name="procedimento_id" id="procedimento_id" value="">
           		<input type="hidden" name="consulta_id" id="consulta_id" value="">
           		<input type="hidden" name="tipoatendimento_id" id="tipoatendimento_id" value="">
            </div>
            <div class="col-2">
                <input id="vl_atendimento" type="text" class="form-control mascaraMonetaria" name="vl_atendimento" value="{{ old('vl_atendimento') }}"  maxlength="10">
            </div>
            <div class="col-3 col-offset-3">
                <button type="button" class="btn btn-primary">
                    Adicionar
                </button>
            </div>
        </form>
	</div>
</div>

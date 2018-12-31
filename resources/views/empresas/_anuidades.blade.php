<table class="table table-striped table-bordered table-doutorhj">
	<thead>
	<tr>
		<th>Plano</th>
		<th>Anuidade(Ano)</th>
		<th>Anuidade(Mês)</th>
		<th>Vigência</th>
		<th>Status</th>
	</tr>
	</thead>
	@foreach($planos as $id=>$plano)
		<?php
			$anuidade = $model->anuidades()->where('plano_id', $id)->first();
		?>
		<tr  class="{{is_null($anuidade) ? "table-$anuidade_conf" : 'table-success'}}">
			<td>{{$plano}}</td>
			<td>
				<input type="text" id="anuidades-{{$id}}-vl_anuidade_ano" class="form-control maskAnuidade" name="anuidades[{{$id}}][vl_anuidade_ano]" placeholder="" required value="{{$anuidade->vl_anuidade_ano ?? old("anuidades[$id][vl_anuidade_ano]") ?? '0,00'}}">
			</td>
			<td>
				<input type="text" id="anuidades-{{$id}}-vl_anuidade_mes" class="form-control maskAnuidade" name="anuidades[{{$id}}][vl_anuidade_mes]" placeholder="" required value="{{$anuidade->vl_anuidade_mes ?? old("anuidades[$id][vl_anuidade_mes]") ?? '0,00'}}">
			</td>
			<td>
				<input type="text" class="form-control input-daterange" id="anuidades-{{$id}}-data_vigencia" name="anuidades[{{$id}}][data_vigencia]" value="{{$anuidade->data_vigencia ?? old("anuidades[$id][data_vigencia]") ?? ''}}" autocomplete="off">
			</td>
			<td>
				<select class="form-control" id="anuidades-{{$id}}-cs_status" name="anuidades[{{$id}}][cs_status]" required>
					<option value="A" {{!is_null($anuidade) && $anuidade->cs_status == 'A' ? 'selected' : ''}}>Ativo</option>
					<option value="I" {{is_null($anuidade) || $anuidade->cs_status == 'I' ? 'selected' : ''}}>Inativo</option>
				</select>
			</td>
		</tr>
	@endforeach
</table>

<div class="row">
	<div class="col-12">
		<div class="pull-right">
			<input type="submit" class="btn btn-primary" value="Salvar Configurações">
		</div>
	</div>
</div>



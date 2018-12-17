<table class="table table-bordered table-striped detail-view">
	<tbody>
	<tr>
		<td>ID</td>
		<td>{{$model->id}}</td>
	</tr>
	<tr>
		<td>Dia Início:</td>
		<td>{{$model->dia_inicio}}</td>
	</tr>
	<tr>
		<td>Dia Fim:</td>
		<td>{{$model->dia_fim}}</td>
	</tr>
	<tr>
		<td>Dia da Vigência:</td>
		<td>{{$model->dia_vencimento}}</td>
	</tr>
	<tr>
		<td>Mês Subsequente:</td>
		<td>{{$model->mes_inc_vencimento}}</td>
	</tr>
	<tr>
		<td>Observaçao:</td>
		<td>{!! $model->observacao !!}</td>
	</tr>
	</tbody>
</table>
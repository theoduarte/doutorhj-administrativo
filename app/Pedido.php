<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Pedido extends Model
{
	use Sortable;
	
	public $fillable = ['titulo', 'descricao', 'dt_pagamento', 'tp_pagamento', 'boleto_id'];
	public $sortable = ['id', 'titulo', 'descricao', 'dt_pagamento', 'tp_pagamento', 'boleto_id'];
	
	public function paciente()
	{
		return $this->belongsTo('App\Paciente');
	}
	
	public function cartao_paciente()
	{
		return $this->belongsTo('App\CartaoPaciente');
	}
	
	public function itens_pedido()
	{
		return $this->hasMany('App\ItemPedido');
	}
	
	public function pagamentos()
	{
		return $this->hasMany('App\Payment');
	}
}

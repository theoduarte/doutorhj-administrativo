<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Documento extends Model
{
	use Sortable;
	
    public $fillable = ['tp_documento', 'te_documento', 'nr_serie', 'dt_expedicao', 'dt_validade', 'sg_orgao_expedidor', 'estado_id'];
    public $sortable = ['tp_documento', 'te_documento'];
	public $dates 	 = ['dt_expedicao', 'dt_validade'];
	public $timestamps = true;
	
	public function estado(){
		return $this->belongsTo('App\Estado'); 
	}
}
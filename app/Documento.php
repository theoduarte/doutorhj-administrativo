<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
	//use Sortable;
	
<<<<<<< HEAD
    public $fillable = ['tp_documento', 'te_documento', 'nr_serie', 'dt_expedicao', 
                         'dt_validade', 'sg_orgao_expedidor', 'estado_id'];
    public $sortable = ['tp_documento', 'te_documento'];
	public $dates 	 = ['dt_expedicao', 'dt_validade'];
	public $timestamps = true;
=======
    public $fillable = ['tp_documento', 'te_documento', 'nr_serie', 'dt_expedicao', 'dt_validade', 'sg_orgao_expedidor', 'estado_id'];
//     public $sortable = ['tp_documento', 'te_documento'];
// 	public $dates 	 = ['dt_expedicao', 'dt_validade'];
// 	public $timestamps = true;
>>>>>>> 20c02fbd9c5df214423bb782dd03093cc5d21a78
	
	public function estado(){
		return $this->belongsTo('App\Estado'); 
	}
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;


class Atendimento extends Model
{
	use Sortable;
	
	public $fillable  = ['id', 'vl_atendimento', 'ds_preco'];
	public $sortable  = ['id', 'vl_atendimento', 'ds_preco'];

	public function consulta(){
	    return $this->belongsTo(Consulta::class);
	}
    
	public function procedimento(){
	    return $this->belongsTo(Procedimento::class);
	}
    
	public function profissional(){
	    return $this->belongsTo(Profissional::class);
	}
	
	public function getVlAtendimentoAttribute($valor){
	    return number_format( $valor,  2, ',', '.'); 
	}
}

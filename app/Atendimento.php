<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Atendimento extends Model
{
	use Sortable;
	
	public $fillable  = ['id', 'vl_atendimento', 'ds_preco'];
	public $sortable  = ['id', 'vl_atendimento', 'ds_preco'];

	public function clinica(){
	    return $this->belongsTo('App\Clinica');
	}
	
	public function consulta(){
	    return $this->belongsTo('App\Consulta');
	}
    
	public function procedimento(){
	    return $this->belongsTo('App\Procedimento');
	}
    
	public function profissional(){
	    return $this->belongsTo('App\Profissional');
	}
	
	public function agendamentos()
	{
	    return $this->hasMany('App\Agendamento');
	}
	
	public function getVlAtendimentoAttribute($valor){
	    return number_format( $valor,  2, ',', '.'); 
	}
}

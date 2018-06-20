<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
	use Sortable;
	
	public $fillable  = ['id', 'vl_com_atendimento', 'vl_net_atendimento', 'ds_preco'];
	public $sortable  = ['id', 'vl_com_atendimento', 'vl_net_atendimento', 'ds_preco'];
	
	public function agendamentos()
	{
	    return $this->hasMany('App\Agendamento');
	}
	
	public function tag_populars()
	{
	    return $this->hasMany('App\TagPopular');
	}

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
	
	public function getVlNetAtendimentoAttribute($valor){
	    return number_format( $valor,  2, ',', '.');
	}
	
	public function getVlComAtendimentoAttribute($valor){
	    return number_format( $valor,  2, ',', '.');
	}
	
	public function getVlComercialAtendimento()
	{
		return number_format( $this->attributes['vl_com_atendimento'],  2, ',', '.');
	}
	
	public function getVlNetAtendimento()
	{
		return number_format( $this->attributes['vl_net_atendimento'],  2, ',', '.');
	}
}

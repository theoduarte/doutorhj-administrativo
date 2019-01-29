<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;

class Corretor extends Model
{
	use Sortable;
	
	public $fillable = ['nm_primario', 'nm_secundario', 'dt_nascimento', 'email', 'cs_status', 'documento_id', 'contato_id'];
	public $sortable = ['id', 'nm_primario', 'nm_secundario', 'dt_nascimento', 'email', 'cs_status', 'documento_id', 'contato_id'];
	
	public function documento(){
		return $this->belongsTo('App\Documento');
	}
	
	public function contato(){
		return $this->belongsTo('App\Contato');
	}
	
	public function agendamentos()
	{
		return $this->hasMany('App\Agendamento');
	}
	
	/*
	 * Getters and Setters
	 */
	public function setDtNascimentoAttribute($data)
	{
		$this->attributes['dt_nascimento'] = Carbon::createFromFormat('d/m/Y', $data);
	}
	
	public function getDtNascimentoAttribute()
	{
		if(isset($this->attributes['dt_nascimento']) && !is_null($this->attributes['dt_nascimento'])) {
			$date = new Carbon($this->attributes['dt_nascimento']);
			return $date->format('d/m/Y');
		} else {
			return null;
		}
	}
}

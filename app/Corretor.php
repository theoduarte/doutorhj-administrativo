<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

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
}

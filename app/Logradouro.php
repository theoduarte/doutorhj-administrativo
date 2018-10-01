<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Logradouro extends Model
{
	use Sortable;
	
	public $fillable   = ['cidade_id', 'tp_logradouro', 'te_logradouro', 'sg_estado', 'te_bairro', 'nr_cep', 'cd_ibge', 'nr_ddd',  'altitude', 'latitude', 'longitude'];
	public $sortable   = ['id', 'cidade_id', 'tp_logradouro', 'te_logradouro', 'sg_estado', 'te_bairro', 'nr_cep', 'cd_ibge', 'nr_ddd',  'altitude', 'latitude', 'longitude'];
	
	public function cidade(){
		return $this->belongsTo("App\Cidade");
	}
}

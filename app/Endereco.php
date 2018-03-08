<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
	public $fillable   = ['cidade_id', 'sg_logradouro', 'te_endereco', 'nr_logradouro', 
	                      'te_bairro', 'nr_cep', 'te_complemento', 'nr_latitude_gps', 'nr_longitude_gps'];
	public $timestamps    = false;
	
	public function cidades(){
	    return $this->belongsTo("App\Cidade");
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
	public $fillable     = ['nm_cidade', 'cd_ibge', 'sg_cidade'];
	public $timestamps   = false;
	
	public function estados(){
	    return $this->belongsTo(Estados::class);
	}
}

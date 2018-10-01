<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
	public $fillable     = ['nm_cidade', 'cd_ibge', 'sg_cidade'];
	public $timestamps   = false;
	
	public function estado(){
	    return $this->belongsTo("App\Estado");
	}
	
	public function logradouros()
	{
		return $this->hasMany('App\Logradouro');
	}
}

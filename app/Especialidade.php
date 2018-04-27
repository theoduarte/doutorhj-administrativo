<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{	  
	public $fillable   = ['cd_especialidade', 'ds_especialidade'];
	
	public function profissionals(){
		return $this->belongsToMany('App\Profissional');
	}
}

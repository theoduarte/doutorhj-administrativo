<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{	  
	public $fillable   = ['cd_especialidade', 'ds_especialidade'];
	
// 	public function profissionals(){
// 		return $this->belongsToMany('App\Profissional');
// 	}

// 	public function profissionals()
// 	{
// 	    return $this->belongsToMany('App\Profissional', 'especialidade_profissional', 'especialidade_id', 'profissional_id');
// 	}
}

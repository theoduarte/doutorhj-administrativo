<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
	public $fillable   = ['ds_estado', 'cd_ibge', 'sg_estado'];
}

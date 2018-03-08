<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Cargo extends Model
{
	use Sortable;
	
	protected $fillable = ['cd_cargo', 'ds_cargo'];
	
	public $sortable = ['id', 'cd_cargo', 'ds_cargo'];
	
	/* public function pacientes()
	{
		return $this->hasMany('App\Paciente');
	}
	
	public function profissionals()
	{
		return $this->hasMany('App\Profissional');
	} */
}

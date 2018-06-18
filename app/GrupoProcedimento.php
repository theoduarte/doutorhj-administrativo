<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class GrupoProcedimento extends Model
{
	use Sortable;
	
	protected $fillable = ['cd_consulta', 'ds_consulta', 'especialidade_id', 'tipoatendimento_id'];
	
	public $sortable = ['id', 'cd_consulta', 'ds_consulta', 'especialidade_id', 'tipoatendimento_id'];
	
	public function procedimentos()
	{
		return $this->hasMany('App\Procedimento');
	}
}

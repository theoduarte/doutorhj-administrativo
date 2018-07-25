<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

	public function getActive(){
        return DB::select(" SELECT DISTINCT gp.*
							  FROM grupo_procedimentos gp
							  JOIN procedimentos p ON (p.grupoprocedimento_id = gp.id)
							  JOIN atendimentos at ON (p.id = at.procedimento_id)
							  JOIN clinicas c ON (c.id = at.clinica_id)
							 WHERE at.cs_status = 'A'
							   AND c.cs_status = 'A'
							   AND EXISTS (SELECT 1 FROM atendimento_filial atf WHERE at.id = atf.atendimento_id)");
    }
}

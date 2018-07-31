<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
	use Sortable;
	
    public $fillable = ['cd_consulta', 'ds_consulta', 'especialidade_id', 'tipoatendimento_id'];
    public $sortable = ['id', 'cd_consulta', 'ds_consulta', 'especialidade_id', 'tipoatendimento_id'];
	
    public function especialidade()
    {
        return $this->belongsTo('App\Especialidade')->withDefault();
    }
    
    public function tipoatendimento()
    {
        return $this->belongsTo('App\Tipoatendimento');
    }
    
    public function atendimentos()
    {
        return $this->hasMany('App\Atendimento');
    }
    
    public function tag_populars()
    {
    	return $this->hasMany('App\TagPopular');
    }

    public function getActiveByEspecialidade($especialidadeId, $term){
        return DB::select(" SELECT DISTINCT c.*
                              FROM consultas c
                              JOIN atendimentos at ON (at.consulta_id = c.id)
                             WHERE at.cs_status = ?
                               AND c.especialidade_id = ?
                               AND (cd_consulta like ?
                                    OR ds_consulta like ?)", ['A', $especialidadeId, DB::raw("'%". $term. "%'"), DB::raw("'%". $term. "%'")]);
    }
}
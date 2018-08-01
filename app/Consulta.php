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
        return DB::table('consultas')
            ->select('consultas.*')
            ->distinct()
            ->join('atendimentos', 'consultas.id', '=', 'atendimentos.consulta_id')
            ->where('atendimentos.cs_status', 'A')
            ->where('consultas.especialidade_id', $especialidadeId)
            ->where(function ($query) use($term) {
                $query->where('cd_consulta', 'like', $term . '%' )
                    ->orWhere( DB::raw('upper(ds_consulta)'), 'like', DB::raw("upper('%" . $term . "%')") );
            })
            ->get();
    }
}
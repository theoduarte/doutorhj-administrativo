<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class Procedimento extends Model
{
	use Sortable;
	
	public $fillable = ['cd_procedimento', 'ds_procedimento', 'tipoatendimento_id', 'grupoprocedimento_id'];
    public $sortable = ['id', 'cd_procedimento', 'ds_procedimento', 'tipoatendimento_id', 'grupoprocedimento_id'];
    
    public function tipoatendimento()
    {
        return $this->belongsTo('App\Tipoatendimento');
    }
    
    public function grupoprocedimento()
    {
    	return $this->belongsTo('App\GrupoProcedimento');
    }
    
    public function atendimentos()
    {
        return $this->hasMany('App\Atendimento');
    }
    
    public function tag_populars()
    {
    	return $this->hasMany('App\TagPopular');
    }
    
    public function especialidades()
    {
        return $this->belongsToMany('App\Especialidade');
    }
    
    public function cupom_descontos()
    {
        return $this->belongsToMany('App\CupomDesconto');
    }

    public function getActiveByGrupoProcedimento($grupoProcedimentoId, $term){
        DB::enableQueryLog();
        $query = DB::table('procedimentos')
            ->select('procedimentos.*')
            ->distinct()
            ->join('atendimentos', 'procedimentos.id', '=', 'atendimentos.procedimento_id')
            ->join('clinicas', 'clinicas.id', '=', 'atendimentos.clinica_id')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('filials')
                      ->whereRaw("filials.clinica_id = clinicas.id AND cs_status = 'A'");
            })
            ->where('atendimentos.cs_status', 'A')
            ->where('procedimentos.grupoprocedimento_id', $grupoProcedimentoId)
            ->where(function ($query) use($term) {
                $query->where('cd_procedimento', 'like', $term . '%' )
                    ->orWhere( DB::raw('upper(ds_procedimento)'), 'like', DB::raw("upper('%" . $term . "%')") );
            })
            ->orderBy('cd_procedimento')
            ->orderBy('ds_procedimento')
            ->get();

        // dd( DB::getQueryLog() );
        return $query;

        // return DB::select(" SELECT DISTINCT p.*
        //                       FROM procedimentos p
        //                       JOIN atendimentos at ON (p.id = at.procedimento_id)
        //                       JOIN clinicas c ON (at.clinica_id = c.id)
        //                      WHERE p.grupoprocedimento_id = ?
        //                        AND at.cs_status = 'A'
        //                        AND EXISTS (SELECT 1 FROM filials f WHERE f.clinica_id = c.id AND cs_status = 'A')
        //                      ORDER BY cd_procedimento, ds_procedimento;", [$grupoProcedimento]);
    }    
}
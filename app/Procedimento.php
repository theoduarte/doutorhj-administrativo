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

    private static $_tipoAtendimentoExameProcedimento = [3,4];
    private static $_tipoAtendimentoOdonto = [2];
        
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

    public function getActiveExameProcedimento(){
        // DB::enableQueryLog();
        $query = DB::table('procedimentos')
            ->select( DB::raw("COALESCE(tag_populars.cs_tag, atendimentos.ds_preco, procedimentos.ds_procedimento) descricao, 'exame' tipo, procedimentos.id") )
            ->distinct()
            ->join('atendimentos', function ($join) {
                $join->on('procedimentos.id', '=', 'atendimentos.procedimento_id')
                ->where('atendimentos.cs_status', '=', 'A');
            })
            ->join('clinicas', 'clinicas.id', '=', 'atendimentos.clinica_id')
            ->leftJoin('tag_populars', function($query) { $query->on('tag_populars.procedimento_id', '=', 'procedimentos.id');})
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('filials')
                      ->whereRaw("filials.clinica_id = clinicas.id AND cs_status = 'A'");
            })
            ->where('atendimentos.cs_status', 'A')
            ->whereIn('procedimentos.tipoatendimento_id', self::$_tipoAtendimentoExameProcedimento)
            ->get();

        // dd( DB::getQueryLog() );
        return $query;
    }

    public function getActiveOdonto(){
        // DB::enableQueryLog();
        $query = DB::table('procedimentos')
            ->select( DB::raw("COALESCE(tag_populars.cs_tag, atendimentos.ds_preco, procedimentos.ds_procedimento) descricao, 'odonto' tipo, procedimentos.id") )
            ->distinct()
            ->join('atendimentos', function ($join) {
                $join->on('procedimentos.id', '=', 'atendimentos.procedimento_id')
                ->where('atendimentos.cs_status', '=', 'A');
            })
            ->join('clinicas', 'clinicas.id', '=', 'atendimentos.clinica_id')
            ->leftJoin('tag_populars', function($query) { $query->on('tag_populars.procedimento_id', '=', 'procedimentos.id');})
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('filials')
                      ->whereRaw("filials.clinica_id = clinicas.id AND cs_status = 'A'");
            })
            ->where('atendimentos.cs_status', 'A')
            ->whereIn('procedimentos.tipoatendimento_id', self::$_tipoAtendimentoOdonto)
            ->get();

        // dd( DB::getQueryLog() );
        return $query;
    }

    public function getActiveAddress( $procedimentoId ){
        $query = DB::select("   select string_agg( CAST(id AS varchar), ',' ) id, string_agg( CAST(filial_id AS varchar), ',' ) filial_id, 
                                       te_bairro, nm_cidade
                                  from (
                                select distinct e.id, e.te_bairro, cd.nm_cidade, f.id filial_id
                                  from filials f
                                  join enderecos e on (f.endereco_id = e.id)
                                  join cidades cd on (e.cidade_id = cd.id)
                                  join clinicas c on (f.clinica_id = c.id)
                                  join atendimentos at on (c.id = at.clinica_id)
                                 where at.cs_status = :status
                                   and c.cs_status = :status
                                   and at.procedimento_id = :procedimentoId) general
                                 group by te_bairro, nm_cidade
                                 order by te_bairro",  [ 'procedimentoId' => $procedimentoId, 'status' => 'A' ] );

        return $query;
    }

    public function getActiveAtendimentos( $procedimentoId, $enderecoIds, $sortItem ) {
        // DB::enableQueryLog();
        $query = DB::table('atendimentos as at')
        ->distinct()
        ->select( DB::raw("at.id, at.vl_com_atendimento, at.ds_preco, 
                           c.id clinica_id, p.id procedimento_id, COALESCE(tp.cs_tag, at.ds_preco, p.ds_procedimento) tag,
                           case when f.eh_matriz = 'S' then 'Matriz' else 'Filial' end tipo, e.id endereco_id, e.sg_logradouro, 
                           e.te_endereco, e.nr_logradouro, e.te_bairro, e.nr_cep,
                           e.nr_latitude_gps, e.nr_longitute_gps, c.id cidade_id, cd.nm_cidade, cd.sg_estado, p.ds_procedimento,
                           c.nm_fantasia, c.tp_prestador, f.eh_matriz, f.nm_nome_fantasia, f.id filial_id") )
        ->join('procedimentos as p', 'at.procedimento_id', '=', 'p.id')
        ->leftJoin('tag_populars as tp', 'p.id', '=', 'tp.procedimento_id')
        ->join('clinicas as c', 'at.clinica_id', '=', 'c.id')
        ->join('filials as f', 'c.id', '=', 'f.clinica_id')
        ->join('enderecos as e', 'f.endereco_id', '=', 'e.id')
        ->join('cidades as cd', 'e.cidade_id', '=', 'cd.id')
        ->where('at.cs_status', 'A')
        ->where('c.cs_status', 'A')
        ->where('f.cs_status', 'A')
        ->where('at.procedimento_id', $procedimentoId);

        if( !empty($enderecoIds) ) {
            $query->whereIn('f.endereco_id', explode(',', $enderecoIds) );
        }

        $query->orderBy('at.vl_com_atendimento', $sortItem)
        ->orderBy('f.eh_matriz', 'desc')
        ->orderBy('c.nm_fantasia', 'asc');
  
        // dd( DB::getQueryLog() );
        return $query->get();
        

        
        /*$queryStr = " select distinct at.id, at.vl_com_atendimento, at.ds_preco, 
                                     c.id clinica_id, p.id procedimento_id, COALESCE(tp.cs_tag, at.ds_preco, p.ds_procedimento) tag,
                                     case when f.eh_matriz = 'S' then 'Matriz' else 'Filial' end tipo, e.id endereco_id, e.sg_logradouro, 
                                     e.te_endereco, e.nr_logradouro, e.te_bairro, e.nr_cep,
                                     e.nr_latitude_gps, e.nr_longitute_gps, c.id cidade_id, cd.nm_cidade, cd.sg_estado, p.ds_procedimento,
                                     c.nm_fantasia, c.tp_prestador, f.eh_matriz, f.nm_nome_fantasia, f.id filial_id
                        from atendimentos at 
                        join procedimentos p on (at.procedimento_id = p.id)
                        left join tag_populars tp on (p.id = tp.procedimento_id)
                        join clinicas c on (at.clinica_id = c.id) 
                        left join filials f on (c.id = f.clinica_id) 
                        left join enderecos e on (f.endereco_id = e.id) 
                        join cidades cd on (e.cidade_id = cd.id)
                       where at.cs_status = :status
                         and c.cs_status = :status
                         and f.cs_status = :status
                         and at.procedimento_id = :procedimentoId";
        
        if( !empty($enderecoIds) ) {
            $queryStr .= " and f.endereco_id in ($enderecoIds)";
        }

        $queryStr .= " order by at.vl_com_atendimento $sortItem";
        $queryStr .= ", f.eh_matriz desc, c.nm_fantasia";

        // dd($queryStr);
        
        $query = DB::select( $queryStr, [ 'procedimentoId' => $procedimentoId, 'status' => 'A' ]);
        return $query;*/
    }
}
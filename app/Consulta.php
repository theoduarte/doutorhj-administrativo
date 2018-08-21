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

    public function getActive(){
        DB::enableQueryLog();
        $query = DB::table('consultas')
            ->select( DB::raw("COALESCE(tag_populars.cs_tag, atendimentos.ds_preco, consultas.ds_consulta) descricao, 'consulta' tipo, consultas.id") )
            ->distinct()
            ->join('atendimentos', function ($join) {
                $join->on('consultas.id', '=', 'atendimentos.consulta_id')
                ->where('atendimentos.cs_status', '=', 'A');
            })
            ->join('clinicas', 'clinicas.id', '=', 'atendimentos.clinica_id')
            ->leftJoin('tag_populars', function($query) { $query->on('tag_populars.consulta_id', '=', 'consultas.id');})
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('filials')
                      ->whereRaw("filials.clinica_id = clinicas.id AND cs_status = 'A'");
            })
            ->where('atendimentos.cs_status', 'A')
            ->get();

        // dd( DB::getQueryLog() );
        return $query;
    } 


    public function getActiveAddress( $consultaId ){
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
                                   and at.consulta_id = :consultaId) general
                                 group by te_bairro, nm_cidade
                                 order by te_bairro",  [ 'consultaId' => $consultaId, 'status' => 'A' ] );

        return $query;
    }

    public function getActiveAtendimentos( $consultaId, $enderecoIds, $sortItem ) {
        // DB::enableQueryLog();

        $query = DB::table('atendimentos as at')
        ->distinct()
        ->select( DB::raw("at.id, at.vl_com_atendimento, at.ds_preco, 
                             c.id clinica_id, p.id consulta_id, COALESCE(tp.cs_tag, at.ds_preco, p.ds_consulta) tag,
                             case when f.eh_matriz = 'S' then 'Matriz' else 'Filial' end tipo, e.id endereco_id, e.sg_logradouro, 
                             e.te_endereco, e.nr_logradouro, e.te_bairro, e.nr_cep,
                             e.nr_latitude_gps, e.nr_longitute_gps, c.id cidade_id, cd.nm_cidade, cd.sg_estado, p.ds_consulta,
                             c.nm_fantasia, c.tp_prestador, f.eh_matriz, f.nm_nome_fantasia, f.id filial_id,
                             pf.id profissional_id, pf.nm_primario, pf.nm_secundario") )
        ->join('consultas as p', 'at.consulta_id', '=', 'p.id')
        ->leftJoin('tag_populars as tp', 'p.id', '=', 'tp.consulta_id')
        ->join('clinicas as c', 'at.clinica_id', '=', 'c.id')
        ->leftJoin('filials as f', 'c.id', '=', 'f.clinica_id')
        ->leftJoin('enderecos as e', 'f.endereco_id', '=', 'e.id')
        ->leftJoin('cidades as cd', 'e.cidade_id', '=', 'cd.id')
        ->join('profissionals as pf', 'at.profissional_id', '=', 'pf.id')
        ->where('at.cs_status', 'A')
        ->where('c.cs_status', 'A')
        ->where('f.cs_status', 'A')
        ->where('pf.cs_status', 'A')
        ->where('at.consulta_id', $consultaId);

        if( !empty($enderecoIds) ) {
            $query->whereIn('f.endereco_id', explode(',', $enderecoIds) );
        }

        $query->orderBy('at.vl_com_atendimento', $sortItem)
        ->orderBy('f.eh_matriz', 'desc')
        ->orderBy('c.nm_fantasia', 'asc')
        ->orderBy('pf.nm_primario', 'asc');

        return $query->get();
        


        /* ----- */
        /*$queryStr = " select distinct at.id, at.vl_com_atendimento, at.ds_preco, 
                             c.id clinica_id, p.id consulta_id, COALESCE(tp.cs_tag, at.ds_preco, p.ds_consulta) tag,
                             case when f.eh_matriz = 'S' then 'Matriz' else 'Filial' end tipo, e.id endereco_id, e.sg_logradouro, 
                             e.te_endereco, e.nr_logradouro, e.te_bairro, e.nr_cep,
                             e.nr_latitude_gps, e.nr_longitute_gps, c.id cidade_id, cd.nm_cidade, cd.sg_estado, p.ds_consulta,
                             c.nm_fantasia, c.tp_prestador, f.eh_matriz, f.nm_nome_fantasia, f.id filial_id,
                             pf.id profissional_id, pf.nm_primario, pf.nm_secundario
                        from atendimentos at 
                        join consultas p on (at.consulta_id = p.id)
                        left join tag_populars tp on (p.id = tp.consulta_id)
                        join clinicas c on (at.clinica_id = c.id) 
                        left join filials f on (c.id = f.clinica_id) 
                        left join enderecos e on (f.endereco_id = e.id) 
                        join cidades cd on (e.cidade_id = cd.id)
                        join profissionals pf on (at.profissional_id = pf.id and pf.cs_status = :status)
                       where at.cs_status = :status
                         and c.cs_status = :status
                         and f.cs_status = :status
                         and at.consulta_id = :consultaId";

        if ( !empty($enderecoIds) ) {
            $queryStr .= " and f.endereco_id in ($enderecoIds)";
        }

        $queryStr .= " order by at.vl_com_atendimento $sortItem";
        $queryStr .= ", f.eh_matriz desc, c.nm_fantasia, pf.nm_primario";

        $query = DB::select($queryStr, [ 'consultaId' => $consultaId, 'status' => 'A' ]);

        // dd( $query->toSql() );
        return $query;*/
    }
}
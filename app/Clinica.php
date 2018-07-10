<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
	use Sortable;
	
    public $fillable = ['nm_razao_social', 'nm_fantasia', 'tp_prestador', 'cs_status', 'obs_procedimento'];
    public $sortable = ['id', 'nm_razao_social', 'nm_fantasia', 'tp_prestador', 'cs_status', 'obs_procedimento'];
	
    public function responsavel(){
        return $this->belongsTo('App\Responsavel');
    }
    
    public function contatos(){
        return $this->belongsToMany('App\Contato');
    }
    
    public function enderecos(){
        return $this->belongsToMany('App\Endereco');
    }
    
    public function documentos(){
        return $this->belongsToMany('App\Documento');
    }
    
    public function consultas(){
        return $this->belongsToMany('App\Consulta');
    }
    
    public function procedimentos(){
        return $this->belongsToMany('App\Procedimento');
    }
    
    public function profissionals()
    {
        return $this->hasMany('App\Profissional');
    }
    
    public function filials()
    {
        return $this->hasMany('App\Filial');
    }

    public function getActiveByEspecialidade($especialidade){
        return DB::select(" SELECT DISTINCT c.*
                              FROM clinicas c
                              JOIN atendimentos at ON (c.id = at.clinica_id)
                                JOIN consultas cs ON (at.consulta_id = cs.id)
                             WHERE cs.especialidade_id = ?
                               AND c.cs_status = 'A'
                               AND at.cs_status = 'A'", [$especialidade]);
    }
}
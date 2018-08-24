<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;

class Filial extends Model
{
    use Sortable;
    
    protected $fillable = ['nm_nome_fantasia', 'cs_status', 'clinica_id', 'endereco_id'];
    
    public $sortable = ['id', 'nm_nome_fantasia', 'cs_status', 'clinica_id', 'endereco_id'];
    
    public function clinica()
    {
        return $this->belongsTo('App\Clinica');
    }
    
    public function endereco()
    {
        return $this->belongsTo('App\Endereco');
    }
    
    public function agendamentos()
    {
        return $this->hasMany('App\Agendamento');
    }
    
    public function atendimentos()
    {
        return $this->belongsToMany('App\Atendimento');
    }
    
    public function profissionals()
    {
    	return $this->belongsToMany('App\Profissional');
    }

    public function getActiveByClinicaProfissionalConsulta($clinica, $profissional, $consulta) {
        return DB::select(" SELECT DISTINCT FL.*
                              FROM FILIALS FL
                              JOIN FILIAL_PROFISSIONAL FLPF ON (FL.ID = FLPF.FILIAL_ID)
                              JOIN PROFISSIONALS PF ON (FLPF.PROFISSIONAL_ID = PF.ID)
                              JOIN ATENDIMENTOS AT ON (PF.ID = AT.PROFISSIONAL_ID AND FL.CLINICA_ID = AT.CLINICA_ID)
                             WHERE PF.CS_STATUS = 'A'
                               AND AT.CS_STATUS = 'A'
                               AND AT.PROFISSIONAL_ID = :profissional
                               AND AT.CONSULTA_ID = :consulta
                               AND AT.CLINICA_ID = :clinica", ['clinica' => $clinica, 'profissional' => $profissional, 'consulta' => $consulta]);
    }

    public function getActiveByClinicaProcedimento($clinica, $procedimento) {
        return DB::select(" SELECT DISTINCT FL.*
                              FROM FILIALS FL
                              JOIN ATENDIMENTO_FILIAL ATFL ON (FL.ID = ATFL.FILIAL_ID)
                              JOIN ATENDIMENTOS AT ON (ATFL.ATENDIMENTO_ID = AT.ID)
                             WHERE AT.PROCEDIMENTO_ID = :procedimento
                               AND AT.CLINICA_ID = :clinica
                               AND AT.CS_STATUS = 'A'", ['clinica' => $clinica, 'procedimento' => $procedimento]);
    }
}

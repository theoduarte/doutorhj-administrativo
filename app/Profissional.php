<?php

namespace App;

use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
	use Sortable;
	
	public $fillable   = ['nm_primario', 'nm_secundario', 'cs_sexo', 'dt_nascimento', 'tp_profissional', 'cs_status'];
	public $sortable   = ['id', 'nm_primario', 'nm_secundario'];
	public $dates 	   = ['dt_nascimento'];
    
	
	
	/*
	 * Relationship
	 */
	
	public function clinica(){
	    return $this->belongsTo('App\Clinica');
	}
	
	public function user(){
	    return $this->belongsTo('App\User');
	}
	
	public function atendimentos()
	{
	    return $this->hasMany('App\Atendimento');
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
	
	public function especialidades(){
	    return $this->belongsToMany('App\Especialidade');
	}
	
	public function filials()
	{
	    return $this->belongsToMany('App\Filial');
	}
	
	/*
	 * Getters and Setters
	 */
	public function setDtNascimentoAttribute($value)
	{
	    $date = new Carbon($value);
	    $date->format('Y-m-d H:i:s');
	    
	    $this->attributes['dt_nascimento'] = $date;
	}
	   
	public function getDtNascimentoAttribute()
	{
	    $date = new Carbon($this->attributes['dt_nascimento']);
	    return $date->format('d/m/Y');
	}

	public function getActiveProfissionalsByClinicaEspecialidade($clinica,$especialidade){
        return DB::select(" SELECT DISTINCT p.*
							  FROM profissionals p
							  JOIN atendimentos at ON (at.profissional_id = p.id)
							  JOIN consultas c ON (at.consulta_id = c.id)
							 WHERE at.cs_status = 'A'
							   AND p.cs_status = 'A'
							   AND at.clinica_id = ?
							   AND c.especialidade_id = ?", [$clinica,$especialidade]);
    }

    public function getActiveProfissionalsByClinicaConsulta($clinica,$consulta){
        return DB::select(" SELECT DISTINCT p.*
							  FROM profissionals p
							  JOIN atendimentos at ON (at.profissional_id = p.id)
							 WHERE at.cs_status = 'A'
							   AND p.cs_status = 'A'
							   AND at.clinica_id = :clinica
							   AND at.consulta_id = :consulta", ['clinica' => $clinica, 'consulta' => $consulta]);
    }

    public function getActiveProfissionalsByClinicaProcedimento($clinica,$procedimento){
        return DB::select(" SELECT DISTINCT p.*
							  FROM profissionals p
							  JOIN atendimentos at ON (at.profissional_id = p.id)
							 WHERE at.cs_status = 'A'
							   AND p.cs_status = 'A'
							   AND at.clinica_id = :clinica
							   AND at.procedimento_id = :procedimento", ['clinica' => $clinica, 'procedimento' => $procedimento]);
    }
}
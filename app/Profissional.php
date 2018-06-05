<?php

namespace App;

use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;
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
	
	public function atendimentos()
	{
	    return $this->hasMany('App\Atendimento');
	}
	
	public function user(){
	    return $this->belongsTo('App\User');
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
}
<?php

namespace App;

use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
	use Sortable;
	
	public $fillable = ['nm_primario', 'nm_secundario', 'cs_sexo', 'dt_nascimento', 'tp_profissional', 'cs_status'];
	public $sortable = ['id', 'nm_primario', 'nm_secundario'];
	public $dates 	 = ['dt_nascimento'];
    
	
	
	/*
	 * Relationship
	 */
	public function clinica()
	{
	    return $this->belongsTo('App\Clinica');
	}
	
	public function contatos()
	{
	    return $this->belongsToMany(Contato::class, 'contato_profissional', 'profissional_id', 'contato_id');
	}
	
	public function enderecos()
	{
	    return $this->belongsToMany(Endereco::class, 'endereco_profissional', 'profissional_id', 'endereco_id');
	}
	
	public function documentos(){
	    return $this->belongsToMany('App\Documento');
	}
	
	public function especialidades()
	{
	    return $this->belongsToMany(Especialidade::class);
	}
	
	public function atendimentos()
	{
	    return $this->hasMany('App\Atendimento');
	}
	
	public function user()
	{
	    return $this->belongsTo('App\User');
	}
	
	public function getDtNascimentoAttribute()
	{
	    $date = new Carbon($this->attributes['dt_nascimento']);
	    return $date->format('d/m/Y');
	}
	
	/*
	 * Getters and Setters
	 */
	public function setDtNascimentoAttribute($data)
	{   
	    $this->attributes['dt_nascimento'] = Carbon::createFromFormat('d/m/Y', $data); 
	}
	
	public function getDtNascimentoAttribute()
	{
	    $date = new Carbon($this->attributes['dt_nascimento']);
	    return $date->format('d/m/Y');
	}
	
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;

class Paciente extends Model
{
	use Sortable;
	
	public $fillable      = ['id', 'nm_primario', 'nm_secundario', 'cs_sexo', 'dt_nascimento', 'cargo_id'];
	public $sortable      = ['id', 'nm_primario', 'nm_secundario'];
	public $dates 	      = ['dt_nascimento'];
    
	
	/*
	 * CS_SEXO
	 */
	const MASCULINO = 'M';
	const FEMININO  = 'F';
	
	protected static $cs_sexo = array(
	    self::MASCULINO => 'Masculino',
	    self::FEMININO  => 'Feminino',
	);
	
	public function cargo(){
	    return $this->belongsTo(Cargo::class);
	}

	
	public function contatos(){
	    return $this->belongsToMany(Contato::class, 'contato_paciente', 'paciente_id', 'contato_id');
	}
    
	
	public function enderecos(){
	    return $this->belongsToMany(Endereco::class, 'endereco_paciente', 'paciente_id', 'endereco_id');
	}
	
	
	public function documentos(){
	    return $this->belongsToMany(Documento::class, 'documento_paciente', 'paciente_id', 'documento_id'); 
	}
	
	
	public function user(){
	    return $this->belongsTo(User::class, 'user_id');
	}
    
	
	public function setDtNascimentoAttribute($data)
	{
	    $date = new Carbon($data);
	    $date->format('Y-m-d H:i:s');
        
	    $this->attributes['dt_nascimento'] = $date;
	}
    
	
	public function getDtNascimentoAttribute()
	{
	    $date = new Carbon($this->attributes['dt_nascimento']);
	    return $date->format('d/m/Y');
	}
	
	
	public function getCsSexoAttribute($cdSexo){
	    return static::$cs_sexo[$cdSexo];
	}
}

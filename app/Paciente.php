<?php

namespace App;

use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
	use Sortable;
	
	
	public $fillable      = ['id', 'nm_primario', 'nm_secundario', 'cs_sexo', 'dt_nascimento', 'cargo_id'];
	public $sortable      = ['id', 'nm_primario', 'nm_secundario'];
	public $dates 	      = ['dt_nascimento'];
    
	
	
	/*
	 * Constants
	 */
	const MASCULINO = 'M';
	const FEMININO  = 'F';
	
	protected static $cs_sexo = array(
	    self::MASCULINO => 'Masculino',
	    self::FEMININO  => 'Feminino'
	);
	
	
	
	/*
	 * Relationship
	 */
	public function cargo(){
	    return $this->belongsTo('App\Cargo');
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
	
	public function user(){
	    return $this->belongsTo('App\User');
	}

	public function responsavel(){
	    return $this->belongsTo(self::class, 'responsavel_id');
	}
    
	public function getPlanoAtivo($paciente_id)
	{
		$vigenciaPac = VigenciaPaciente::where(['paciente_id' => $paciente_id, 'cobertura_ativa' => true])
			->where('data_inicio', '<=', date('Y-m-d'))
			->where('data_fim', '>=', date('Y-m-d'))->first();

		if(is_null($vigenciaPac)) {
			return Plano::OPEN;
		} else {
			return $vigenciaPac->plano_id;
		}
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
	
	public function getNmPrimarioAttribute()
	{
	    return mb_strtoupper($this->attributes['nm_primario']);
	}
	
	public function getNmSecundarioAttribute()
	{
	    return mb_strtoupper($this->attributes['nm_secundario']);
	}
}
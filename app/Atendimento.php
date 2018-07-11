<?php

namespace App;

use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
	use Sortable;
	
	public $fillable  = ['id', 'vl_com_atendimento', 'vl_net_atendimento', 'ds_preco'];
	public $sortable  = ['id', 'vl_com_atendimento', 'vl_net_atendimento', 'ds_preco'];
	
	public function agendamentos()
	{
	    return $this->hasMany('App\Agendamento');
	}
	
	public function clinica(){
	    return $this->belongsTo('App\Clinica');
	}
	
	public function consulta(){
	    return $this->belongsTo('App\Consulta');
	}
    
	public function procedimento(){
	    return $this->belongsTo('App\Procedimento');
	}
    
	public function profissional(){
	    return $this->belongsTo('App\Profissional');
	}
	
	public function filials()
	{
		return $this->belongsToMany('App\Filial');
	}
	
	public function getVlNetAtendimentoAttribute($valor){
	    return number_format( $valor,  2, ',', '.');
	}
	
	public function getVlComAtendimentoAttribute($valor){
	    return number_format( $valor,  2, ',', '.');
	}
	
	public function getVlComercialAtendimento()
	{
		return number_format( $this->attributes['vl_com_atendimento'],  2, ',', '.');
	}
	
	public function getVlNetAtendimento()
	{
		return number_format( $this->attributes['vl_net_atendimento'],  2, ',', '.');
	}

	public function getFirst($data) {

		$atendimentos =  $this::where(function ($query) use ($data) {
            $query->where('cs_status','A')->get();

            if ( !empty($data['clinica_id']) ) {
            	$query->where('clinica_id', $data['clinica_id'])->get();
            }

            if ( !empty($data['consulta_id']) ) {
            	$query->where('consulta_id', $data['consulta_id'])->get();
            }

            if ( !empty($data['profissional_id']) ) {
            	$query->whereIn('profissional_id', $data['profissional_id'])->get();
            }
        })->first();

		return !empty($atendimentos) ? $atendimentos->toArray() : [];
	}

	public function getAll($data) {
		$atendimentos =  $this::where(function ($query) use ($data) {
            $query->where('cs_status','A')->get();
            if ( !empty($data['clinica_id']) ) {
                $query->where('clinica_id', $data['clinica_id'])->get();
            }

            if ( !empty($data['consulta_id']) ) {
                $query->where('consulta_id', $data['consulta_id'])->get();
            }

            if ( !empty($data['profissional_id']) ) {
                $query->whereIn('profissional_id', $data['profissional_id'])->get();
            }
        })->get();

		return $atendimentos;
	}
}

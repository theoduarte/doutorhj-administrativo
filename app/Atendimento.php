<?php

namespace App;

use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;
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
	    return $this->belongsTo('App\Profissional')->withDefault();
	}
	
	public function filials()
	{
		return $this->belongsToMany('App\Filial');
	}

    public function setVlNetAtendimentoAttribute($value)
    {
        if (empty($value)) return;
        $this->attributes['vl_net_atendimento'] = str_replace(',', '.', str_replace('.', '', $value));
    }
    
    public function setVlComAtendimentoAttribute($value)
    {
        if (empty($value)) return;
        $this->attributes['vl_com_atendimento'] = str_replace(',', '.', str_replace('.', '', $value));
    }
	
	public function getVlNetAtendimentoAttribute(){
	    return number_format( $this->attributes['vl_net_atendimento'],  2, ',', '.');
	}
	
	public function getVlComAtendimentoAttribute($val){
	    return number_format( $this->attributes['vl_com_atendimento'],  2, ',', '.');
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

    public function getFirstProcedimento($data) {

        $atendimentos =  $this::where(function ($query) use ($data) {
            $query->where('cs_status','A')->get();

            if ( !empty($data['clinica_id']) ) {
                $query->where('clinica_id', $data['clinica_id'])->get();
            }

            if ( !empty($data['procedimento_id']) ) {
                $query->where('procedimento_id', $data['procedimento_id'])->get();
            }
        })->first();

        return !empty($atendimentos) ? $atendimentos->toArray() : [];
    }

    public function getAll($data) {
		$atendimentos =  $this::where(function ($query) use ($data) {
            $query->where('cs_status','A')->get();
            if ( !empty($data['clinica_id']) ) {
                $query->whereIn('clinica_id', explode(',',$data['clinica_id']))->get();
            }

            if ( !empty($data['consulta_id']) ) {
                $query->where('consulta_id', $data['consulta_id'])->get();
            }

            if ( !empty($data['procedimento_id']) ) {
                $query->where('procedimento_id', $data['procedimento_id'])->get();
            }

            if ( !empty($data['profissional_id']) ) {
                $query->whereIn('profissional_id', $data['profissional_id'])->get();
            }
        })->get();

		return $atendimentos;
	}

    public function getAtendsProcedimentoByCheckup($data){
        return DB::select(" SELECT at.*
                              FROM atendimentos at
                              JOIN item_checkups ic ON (ic.atendimento_id = at.id)
                             WHERE ic.checkup_id = ?
                               AND at.clinica_id = ?
                               AND at.procedimento_id = ?", [$data['checkup_id'], $data['clinica_id'], $data['procedimento_id']]);
    }
}

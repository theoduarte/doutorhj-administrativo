<?php

namespace App;

use Illuminate\Support\Carbon;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Agendamento extends Model
{
    use Sortable;

    public $fillable  = ['id', 'te_ticket', 'profissional_id', 'paciente_id', 'clinica_id', 'dt_atendimento', 'cs_status'];
    
    public $sortable  = ['id', 'te_ticket', 'dt_atendimento', 'cs_status'];
    
    public $dates 	  = ['dt_atendimento'];
    
    
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    
    public function clinica()
    {
        return $this->belongsTo(Clinica::class);
    }
    
    public function profissional()
    {
        return $this->belongsTo(Profissional::class);
    }
    
    public function getDtConsultaPrimariaAttribute()
    {
        $date = new Carbon($this->attributes['dt_consulta_primaria']);
        return $date->format('d/m/Y g:i A');
    }
    
    public function getDtAtendimentoAttribute()
    {
        $date = new Carbon($this->attributes['dt_atendimento']);
        return $date->format('d/m/Y g:i A');
    }
    
    public function getCsStatusAttribute($csStatus) {
        switch($csStatus){
            case 10 : return 'Pré-Agendado';   break;   
            case 20 : return 'Confirmado';     break;   
            case 30 : return 'Não Confirmado'; break;   
            case 40 : return 'Finalizado';     break;   
            case 50 : return 'Ausente';        break;   
            case 60 : return 'Cancelado';      break;   
            case 70 : return 'Agendado';       break;   
        }
    }
}
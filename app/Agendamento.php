<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;

class Agendamento extends Model
{
    use Sortable;
    
    public $fillable  = ['id', 'te_ticket', 'dt_consulta1', 'dt_consulta2', 'dt_consulta3', 'obs_agendamento', 
                         'obs_cancelamento', 'profissional_id', 'paciente_id', 'clinica_id', 'dt_atendimento', 'cs_status'];
    
    public $sortable  = ['id', 'te_ticket', 'dt_consulta1', 'dt_consulta2', 'dt_consulta3', 'dt_atendimento', 'cs_status'];
    
    public $dates 	  = ['dt_atendimento', 'dt_consulta1', 'dt_consulta2', 'dt_consulta3'];
    
    
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
}
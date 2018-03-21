<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Agendamento extends Model
{
    use Sortable;
    
    public $fillable  = ['id', 'bo_contato_inicial', 'bo_contato_final', 'te_ticket', 
                         'dt_consulta_primaria', 'dt_consulta_secundaria', 'bo_consulta_consumada', 
                         'te_observacoes', 'profissional_id', 'paciente_id', 'clinica_id'];
    
    public $sortable  = ['id', 'bo_contato_inicial', 'bo_contato_final', 'te_ticket',
                         'dt_consulta_primaria', 'dt_consulta_secundaria', 'bo_consulta_consumada',
                         'te_observacoes', 'profissional_id', 'paciente_id', 'clinica_id'];
    
    public $dates 	  = ['dt_consulta_secundaria'];
    
    
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
    
    public function clinica(){
        return $this->belongsTo(Clinica::class);
    }
}
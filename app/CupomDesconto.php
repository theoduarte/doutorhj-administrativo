<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;

class CupomDesconto extends Model
{
    
    use Sortable;
    
    public $fillable  = ['id', 'titulo', 'codigo', 'descricao', 'percentual', 'dt_inicio', 'dt_fim', 'cs_status', 'cs_sexo', 'dt_nascimento'];
    public $sortable  = ['id', 'titulo', 'codigo', 'percentual', 'dt_inicio', 'dt_fim', 'cs_status', 'cs_sexo', 'dt_nascimento'];
    
    public function agendamentos()
    {
        return $this->hasMany('App\Agendamento');
    }
    
    public function procedimentos()
    {
        return $this->belongsToMany('App\Procedimento');
    }
    
    public function getDtInicio() {
        $data = $this->attributes['dt_inicio'];
        $obData = new Carbon($data);
        return $obData->format('d/m/Y');
    }
    
    public function getDtFim() {
        $data = $this->attributes['dt_fim'];
        $obData = new Carbon($data);
        return $obData->format('d/m/Y');
    }
    
    public function getDtNascimento() {
        $data = $this->attributes['dt_nascimento'];
        $obData = new Carbon($data);
        return $obData->format('d/m/Y');
    }
}

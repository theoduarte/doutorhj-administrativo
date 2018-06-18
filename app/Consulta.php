<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
	use Sortable;
	
    public $fillable = ['cd_consulta', 'ds_consulta', 'especialidade_id', 'tipoatendimento_id'];
    public $sortable = ['id', 'cd_consulta', 'ds_consulta', 'especialidade_id', 'tipoatendimento_id'];
	
    public function especialidade()
    {
        return $this->belongsTo('App\Especialidade');
    }
    
    public function tipoatendimento()
    {
        return $this->belongsTo('App\Tipoatendimento');
    }
    
    public function atendimentos()
    {
        return $this->hasMany('App\Atendimento');
    }
}
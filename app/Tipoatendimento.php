<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Tipoatendimento extends Model
{
    use Sortable;
    
    protected $fillable = ['cd_atendimento', 'ds_atendimento', 'cs_status', 'tag_value'];
    
    public $sortable = ['id', 'cd_atendimento', 'ds_atendimento'];
    
    public function consultas()
    {
        return $this->hasMany('App\Consulta');
    }
    
    public function procedimentos()
    {
        return $this->hasMany('App\Procedimento');
    }

    public function getStatusString() {
        return $this->attributes['cs_status'] == 'A' ? 'Ativo': 'Inativo';
    }
}

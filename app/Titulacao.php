<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Titulacao extends Model
{
    use Sortable;
    
    protected $fillable = ['titulo', 'tempo_formacao', 'amb', 'cnrm'];
    public $sortable = ['id', 'titulo', 'tempo_formacao', 'amb', 'cnrm'];
    
    public function especialidades()
    {
        return $this->hasMany('App\Especialidade');
    }
    
    public function requisitos()
    {
        return $this->belongsToMany('App\Requisito');
    }
}

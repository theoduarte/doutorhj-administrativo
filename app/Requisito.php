<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Requisito extends Model
{
    use Sortable;
    
    protected $fillable = ['titulo'];
    public $sortable = ['id', 'titulo'];
    
    public function titulacaos()
    {
        return $this->belongsToMany('App\Titulacao');
    }
}

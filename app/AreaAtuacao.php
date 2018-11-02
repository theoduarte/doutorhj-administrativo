<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class AreaAtuacao extends Model
{
    use Sortable;
    
    protected $fillable = ['titulo', 'cs_status'];
    
    public $sortable = ['id', 'titulo', 'cs_status'];
    
    public function profissionals()
    {
        return $this->belongsToMany('App\Profissional');
    }
}

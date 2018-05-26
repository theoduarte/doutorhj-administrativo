<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class TipoLog extends Model
{
    use Sortable;
    
    protected $fillable = ['titulo'];
    public $sortable = ['id', 'titulo'];
}

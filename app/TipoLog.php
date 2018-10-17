<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;

class TipoLog extends Model
{
    use Sortable;
    
    protected $fillable = ['titulo'];
    public $sortable = ['id', 'titulo'];
    
    public function getUpdatedAtAttribute()
    {
        $date = new Carbon($this->attributes['updated_at']);
        return $date->format('d/m/Y H:i:s');
    }
}

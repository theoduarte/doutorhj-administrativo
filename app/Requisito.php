<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;

class Requisito extends Model
{
    use Sortable;
    
    protected $fillable = ['titulo'];
    public $sortable = ['id', 'titulo'];
    
    public function titulacaos()
    {
        return $this->belongsToMany('App\Titulacao');
    }
    
    public function getUpdatedAtAttribute() {
        $obData = new Carbon($this->attributes['updated_at']);
        return $obData->format('d/m/Y H:i');
    }
    
    public function getRawUpdatedAtAttribute() {
        return $this->attributes['updated_at'];
    }
}

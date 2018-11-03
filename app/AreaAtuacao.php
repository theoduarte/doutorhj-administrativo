<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;

class AreaAtuacao extends Model
{
    use Sortable;
    
    protected $fillable = ['titulo', 'cs_status'];
    
    public $sortable = ['id', 'titulo', 'cs_status'];
    
    public function profissionals()
    {
        return $this->belongsToMany('App\Profissional');
    }
    
    public function getUpdatedAtAttribute() {
        $obData = new Carbon($this->attributes['updated_at']);
        return $obData->format('d/m/Y H:i');
    }
    
    public function getRawUpdatedAtAttribute() {
        return $this->attributes['updated_at'];
    }
}

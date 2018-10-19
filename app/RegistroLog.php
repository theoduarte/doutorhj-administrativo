<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;

class RegistroLog extends Model
{
    use Sortable;
    
    protected $fillable = ['titulo', 'descricao', 'ativo'];
    public $sortable = ['id', 'titulo', 'descricao', 'ativo'];
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function tipo_log(){
        return $this->belongsTo('App\TipoLog');
    }
    
    public function getCreatedAtAttribute($data) {
        $obData = new Carbon($data);
        return $obData->format('d/m/Y H:i');
    }
}

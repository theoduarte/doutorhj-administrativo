<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;

class RegistroLog extends Model
{
    use Sortable;

	const INSERT 	= 1;
	const READ 		= 2;
	const UPDATE 	= 3;
	const DELETE	= 4;
	const EXCEPTION	= 5;
	const LOGIN		= 6;
	const LOGOUT	= 7;

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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
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

	/**
	 * @param $titulo
	 * @param $tipolog_id
	 * @param $model Objeto model que foi dado o save
	 */
	public static function saveLog($titulo, $tipolog_id, $model)
	{
		$user = Auth::user();

		$new_log = json_encode($model->getChanges());
		$log = "{{$new_log}}";

		$registroLog = new RegistroLog();
		$registroLog->titulo = $titulo;
		$registroLog->tipolog_id = $tipolog_id;
		$registroLog->ativo = true;
		$registroLog->user_id = $user->id;
		$registroLog->table_name = $model->getTable();
		$registroLog->field_id = $model->id;
		$registroLog->descricao = $log;
		$registroLog->save();
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Carbon;

class CampanhaVenda extends Model
{
	use Sortable;
	
	/**
	 * @var array
	 */
	protected $fillable = ['url_param', 'ds_campanha', 'data_inicio', 'data_fim', 'cs_status', 'empresa_id', 'plano_id',  'created_at', 'updated_at'];
	public $sortable = ['id', 'url_param', 'ds_campanha', 'data_inicio', 'data_fim', 'cs_status', 'empresa_id', 'plano_id',  'created_at', 'updated_at'];
	
	
	public function empresa()
	{
		return $this->belongsTo('App\Empresa');
	}
	
	public function plano()
	{
		return $this->belongsTo('App\Plano');
	}
	
	/*
	 * Getters and Setters
	 */
	public function setDataInicioAttribute($data)
	{
		$this->attributes['data_inicio'] = Carbon::createFromFormat('d/m/Y H:i:s', $data);
	}
	
	public function getDataInicioAttribute()
	{
		if(isset($this->attributes['data_inicio']) && !is_null($this->attributes['data_inicio'])) {
			$date = new Carbon($this->attributes['data_inicio']);
			return $date->format('d/m/Y H:i:s');
		} else {
			return null;
		}
	}
	
	public function setDataFimAttribute($data)
	{
		$this->attributes['data_fim'] = Carbon::createFromFormat('d/m/Y H:i:s', $data);
	}
	
	public function getDataFimAttribute()
	{
		if(isset($this->attributes['data_fim']) && !is_null($this->attributes['data_fim'])) {
			$date = new Carbon($this->attributes['data_fim']);
			return $date->format('d/m/Y H:i:s');
		} else {
			return null;
		}
	}
}

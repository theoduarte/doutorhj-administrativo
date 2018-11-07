<?php

namespace App;

use App\Http\Controllers\UtilController;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $empresa_id
 * @property int $plano_id
 * @property float $vl_anuidade_ano
 * @property float $vl_anuidade_mes
 * @property string $cs_status
 * @property string $data_inicio
 * @property string $data_fim
 * @property string $created_at
 * @property string $updated_at
 * @property Empresa $empresa
 * @property Plano $plano
 */
class Anuidade extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['empresa_id', 'plano_id', 'vl_anuidade_ano', 'vl_anuidade_mes', 'cs_status', 'data_inicio', 'data_fim', 'created_at', 'updated_at'];
	protected $dates 	= ['data_inicio', 'data_fim'];
	protected $appends 	= ['data_vigencia'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plano()
    {
        return $this->belongsTo('App\Plano');
    }

	public function setVlAnuidadeAnoAttribute($value)
	{
		$this->attributes['vl_anuidade_ano'] = UtilController::removeMaskMoney($value);
	}

	public function setVlAnuidadeMesAttribute($value)
	{
		$this->attributes['vl_anuidade_mes'] = UtilController::removeMaskMoney($value);
	}

	public function getVlAnuidadeAnoAttribute()
	{
		return number_format( $this->attributes['vl_anuidade_ano'],  2, ',', '.');
	}

	public function getVlAnuidadeMesAttribute()
	{
		return number_format( $this->attributes['vl_anuidade_mes'],  2, ',', '.');
	}

	public function getDataVigenciaAttribute()
	{
		if(isset($this->attributes['data_inicio']) && isset($this->attributes['data_fim']))
			return $this->data_inicio->format('d/m/Y').' - '.$this->data_fim->format('d/m/Y');
	}
}

<?php

namespace App;

use App\Http\Controllers\UtilController;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $atendimento_id
 * @property int $plano_id
 * @property int $itemcheckup_id
 * @property int $tp_preco_id
 * @property int $cd_preco
 * @property float $vl_comercial
 * @property float $vl_net
 * @property string $data_inicio
 * @property string $data_fim
 * @property boolean $cs_status
 * @property string $created_at
 * @property string $updated_at
 * @property Atendimento $atendimento
 * @property Plano $plano
 * @property ItemCheckup $itemCheckup
 * @property TipoPreco $tipoPreco
 */
class Preco extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['atendimento_id', 'plano_id', 'itemcheckup_id', 'tp_preco_id', 'cd_preco', 'vl_comercial', 'vl_net', 'data_inicio', 'data_fim', 'cs_status', 'created_at', 'updated_at'];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
		'data_inicio',
		'data_fim',
		'created_at',
		'updated_at',
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function atendimento()
    {
        return $this->belongsTo('App\Atendimento');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plano()
    {
        return $this->belongsTo('App\Plano');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemCheckup()
    {
        return $this->belongsTo('App\ItemCheckup', 'itemcheckup_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoPreco()
    {
        return $this->belongsTo('App\TipoPreco', 'tp_preco_id');
    }

	public function setVlNetAttribute($value)
	{
		$this->attributes['vl_net'] = UtilController::removeMaskMoney($value);
	}

	public function setVlComercialAttribute($value)
	{
		$this->attributes['vl_comercial'] = UtilController::removeMaskMoney($value);
	}

	public function getVlNetAttribute()
	{
		return number_format( $this->attributes['vl_net'],  2, ',', '.');
	}

	public function getVlComercialAttribute()
	{
		return number_format( $this->attributes['vl_comercial'],  2, ',', '.');
	}
}

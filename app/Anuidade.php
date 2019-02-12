<?php

namespace App;

use App\Http\Controllers\UtilController;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;

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
	protected $appends 	= ['vl_anuidade_ano_db', 'vl_anuidade_mes_db', 'data_vigencia', 'situacao', 'isento'];

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

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function vigenciaPacientes()
	{
		return $this->hasMany('App\VigenciaPaciente');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function vigenciaPacientesAtiva()
	{
		return $this->vigenciaPacientes()
			->where(function($query) {
				$query->where('vigencia_pacientes.data_inicio', '<=', date('Y-m-d H:i:s'))
					->where('vigencia_pacientes.data_fim', '>=', date('Y-m-d H:i:s'))
					->orWhere('vigencia_pacientes.cobertura_ativa', true);
			});
	}

	public function setVlAnuidadeAnoAttribute($value)
	{
		$this->attributes['vl_anuidade_ano'] = UtilController::removeMaskMoney($value);
	}

	public function setVlAnuidadeMesAttribute($value)
	{
		$this->attributes['vl_anuidade_mes'] = UtilController::removeMaskMoney($value);
	}

	public function getSituacaoAttribute()
	{
		if(!is_null($this->deleted_at) || $this->cs_status == 'I' || $this->data_fim < new Carbon()) {
			return false;
		} else {
			return true;
		}
	}

	public function getIsentoAttribute()
	{
		if($this->vl_anuidade_ano_db == 0 && $this->vl_anuidade_mes_db == 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getVlAnuidadeAnoAttribute()
	{
		return number_format($this->attributes['vl_anuidade_ano'],  2, ',', '.');
	}

	public function getVlAnuidadeMesAttribute()
	{
		return number_format($this->attributes['vl_anuidade_mes'],  2, ',', '.');
	}

	public function getVlAnuidadeAnoDbAttribute()
	{
		return $this->attributes['vl_anuidade_ano'];
	}

	public function getVlAnuidadeMesDbAttribute()
	{
		return $this->attributes['vl_anuidade_mes'];
	}

	public function getDataVigenciaAttribute()
	{
		if(isset($this->attributes['data_inicio']) && isset($this->attributes['data_fim']))
			return $this->data_inicio->format('d/m/Y').' - '.$this->data_fim->format('d/m/Y');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;

/**
 * @property int $id
 * @property int $perfiluser_id
 * @property int $empresa_id
 * @property int $user_id
 * @property string $nm_primario
 * @property string $nm_secundario
 * @property string $cs_sexo
 * @property string $dt_nascimento
 * @property string $telefone
 * @property string $cpf
 * @property string $created_at
 * @property string $updated_at
 * @property Perfiluser $perfiluser
 * @property Empresa $empresa
 * @property User $user
 */
class Representante extends Model
{
	use Sortable;

	/*
	 * Constants
	 */
	const MASCULINO = 'M';
	const FEMININO  = 'F';

	protected static $cs_sexo = array(
		self::MASCULINO => 'Masculino',
		self::FEMININO  => 'Feminino'
	);

    /**
     * @var array
     */
    protected $fillable = ['perfiluser_id', 'empresa_id', 'user_id', 'nm_primario', 'nm_secundario', 'cs_sexo', 'dt_nascimento', 'telefone', 'cpf', 'created_at', 'updated_at'];
	public $dates		= ['dt_nascimento'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perfiluser()
    {
        return $this->belongsTo('App\Perfiluser');
    }

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
    public function user()
    {
        return $this->belongsTo('App\User');
    }


	public function getNomeAttribute()
	{
		return mb_strtoupper($this->attributes['nm_primario'].' '.$this->attributes['nm_secundario']);
	}

	public function setDtNascimentoAttribute($data)
	{
		if(isset($data) && !empty($data)) $this->attributes['dt_nascimento'] = Carbon::createFromFormat('d/m/Y', $data);
	}

	public function getDtNascimentoAttribute()
	{
		if(isset($this->attributes['dt_nascimento']) && !empty($this->attributes['dt_nascimento'])) {
			$date = new Carbon($this->attributes['dt_nascimento']);
			return $date->format('d/m/Y');
		}
	}

	public function getNmPrimarioAttribute()
	{
		if(isset($this->attributes['nm_primario'])) return mb_strtoupper($this->attributes['nm_primario']);
	}

	public function getNmSecundarioAttribute()
	{
		if(isset($this->attributes['nm_secundario'])) return mb_strtoupper($this->attributes['nm_secundario']);
	}
}

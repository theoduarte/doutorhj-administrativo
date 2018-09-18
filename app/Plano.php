<?php

namespace App;

use App\Http\Controllers\UtilController;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * @property int $id
 * @property int $cd_plano
 * @property string $ds_plano
 * @property float $anuidade
 * @property string $created_at
 * @property string $updated_at
 * @property VigenciaPaciente[] $vigenciaPacientes
 * @property ServicoAdicional[] $servicoAdicionals
 * @property Voucher[] $vouchers
 * @property Preco[] $precos
 * @property Entidade[] $entidades
 * @property TipoPlano[] $tipoPlanos
 */
class Plano extends Model
{
	const OPEN = 1;

	use Sortable;

    /**
     * @var array
     */
    protected $fillable = ['cd_plano', 'ds_plano', 'anuidade', 'created_at', 'updated_at'];
	public $sortable = ['id', 'cd_plano', 'ds_plano', 'anuidade', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vigenciaPacientes()
    {
        return $this->hasMany('App\VigenciaPaciente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicoAdicionals()
    {
        return $this->hasMany('App\ServicoAdicional');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchers()
    {
        return $this->hasMany('App\Voucher');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function precos()
    {
        return $this->hasMany('App\Preco');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function entidades()
    {
        return $this->belongsToMany('App\Entidade');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tipoPlanos()
    {
        return $this->belongsToMany('App\TipoPlano', 'plano_tipoplano');
    }

	/**
	 * Set the anuidade without mask
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setAnuidadeAttribute($value)
	{
		$this->attributes['anuidade'] = UtilController::removeMaskMoney($value);
	}

	/**
	 * Get the anuidade with mask.
	 * @return string
	 */
	public function getAnuidadeAttribute($value)
	{
		return number_format($value, 2, ',', '.');
	}
}

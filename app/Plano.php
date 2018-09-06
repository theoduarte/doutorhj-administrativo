<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * @property int $id
 * @property int $tp_plano_id
 * @property int $cd_plano
 * @property string $ds_plano
 * @property string $created_at
 * @property string $updated_at
 * @property TipoPlano $tipoPlano
 * @property VigenciaPaciente[] $vigenciaPacientes
 * @property ServicoAdicional[] $servicoAdicionals
 * @property Voucher[] $vouchers
 * @property Preco[] $precos
 * @property Entidade[] $entidades
 */
class Plano extends Model
{
	use Sortable;

	public $sortable = ['id', 'tp_plano_id', 'cd_plano', 'ds_plano'];

    /**
     * @var array
     */
    protected $fillable = ['tp_plano_id', 'cd_plano', 'ds_plano', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoPlano()
    {
        return $this->belongsTo('App\TipoPlano', 'tp_plano_id');
    }

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
}

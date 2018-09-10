<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $titulo
 * @property string $ds_campanha
 * @property string $created_at
 * @property string $updated_at
 * @property Voucher[] $vouchers
 * @property Paciente[] $pacientes
 */
class Campanha extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['titulo', 'ds_campanha', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchers()
    {
        return $this->hasMany('App\Voucher');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pacientes()
    {
        return $this->belongsToMany('App\Paciente', 'campanha_clinica');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $tp_voucher_id
 * @property int $plano_id
 * @property int $paciente_id
 * @property int $campanha_id
 * @property string $titulo
 * @property string $cd_voucher
 * @property string $ds_voucher
 * @property string $prazo_utilizacao
 * @property string $created_at
 * @property string $updated_at
 * @property TipoVoucher $tipoVoucher
 * @property Plano $plano
 * @property Paciente $paciente
 * @property Campanha $campanha
 */
class Voucher extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tp_voucher_id', 'plano_id', 'paciente_id', 'campanha_id', 'titulo', 'cd_voucher', 'ds_voucher', 'prazo_utilizacao', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoVoucher()
    {
        return $this->belongsTo('App\TipoVoucher', 'tp_voucher_id');
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
    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campanha()
    {
        return $this->belongsTo('App\Campanha');
    }
}

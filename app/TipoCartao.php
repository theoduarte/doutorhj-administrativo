<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $descricao
 * @property string $created_at
 * @property string $updated_at
 * @property CartaoPaciente[] $cartaoPacientes
 */
class TipoCartao extends Model
{
	const INDIVIDUAL = 1;
	const EMPRESARIAL = 2;
	const PRE_PAGO = 3;

    /**
     * @var array
     */
    protected $fillable = ['descricao', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartaoPacientes()
    {
        return $this->hasMany('App\CartaoPaciente', 'tp_cartao_id');
    }
}

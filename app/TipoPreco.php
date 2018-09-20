<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $descricao
 * @property string $created_at
 * @property string $updated_at
 * @property Preco[] $precos
 */
class TipoPreco extends Model
{
	const INDIVIDUAL = 1;
	const CHECKUP = 2;

    /**
     * @var array
     */
    protected $fillable = ['descricao', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function precos()
    {
        return $this->hasMany('App\Preco', 'tp_preco_id');
    }
}

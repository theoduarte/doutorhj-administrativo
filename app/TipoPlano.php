<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $descricao
 * @property string $created_at
 * @property string $updated_at
 * @property Plano[] $planos
 */
class TipoPlano extends Model
{
	const INDIVIDUAL = 1;
	const CORPORATIVO = 2;
	const PARCERIA = 3;

    /**
     * @var array
     */
    protected $fillable = ['descricao', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function planos()
    {
        return $this->belongsToMany('App\Plano', 'plano_tipoplano');
    }
}

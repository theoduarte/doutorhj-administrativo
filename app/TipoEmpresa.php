<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $descricao
 * @property string $abreviacao
 * @property string $created_at
 * @property string $updated_at
 */
class TipoEmpresa extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['descricao', 'abreviacao', 'created_at', 'updated_at'];

}

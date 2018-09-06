<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $titulo
 * @property string $abreviacao
 * @property string $img_path
 * @property string $created_at
 * @property string $updated_at
 * @property Plano[] $planos
 */
class Entidade extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['titulo', 'abreviacao', 'img_path', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function planos()
    {
        return $this->belongsToMany('App\Plano');
    }
}

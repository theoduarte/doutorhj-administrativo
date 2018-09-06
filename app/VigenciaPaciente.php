<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $plano_id
 * @property int $paciente_id
 * @property string $data_inicio
 * @property string $data_fim
 * @property boolean $cobertura
 * @property string $created_at
 * @property string $updated_at
 * @property Plano $plano
 * @property Paciente $paciente
 */
class VigenciaPaciente extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['plano_id', 'paciente_id', 'data_inicio', 'data_fim', 'cobertura', 'created_at', 'updated_at'];

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
}

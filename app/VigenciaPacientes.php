<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $plano_id
 * @property int $paciente_id
 * @property int $anuidade_id
 * @property string $data_inicio
 * @property string $data_fim
 * @property boolean $cobertura_ativa
 * @property float $vl_max_consumo
 * @property string $created_at
 * @property string $updated_at
 * @property Paciente $paciente
 * @property Plano $plano
 * @property Anuidade $anuidade
 */
class VigenciaPacientes extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['plano_id', 'paciente_id', 'anuidade_id', 'data_inicio', 'data_fim', 'cobertura_ativa', 'vl_max_consumo', 'created_at', 'updated_at'];

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
    public function plano()
    {
        return $this->belongsTo('App\Plano');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anuidade()
    {
        return $this->belongsTo('App\Anuidade');
    }
}

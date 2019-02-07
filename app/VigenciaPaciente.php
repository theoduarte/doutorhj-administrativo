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
 * @property string $periodicidade
 * @property string $created_at
 * @property string $updated_at
 * @property Paciente $paciente
 * @property Plano $plano
 * @property Anuidade $anuidade
 */
class VigenciaPaciente extends Model
{
    /**
     * @var array
     */
	protected $fillable = ['anuidade_id', 'paciente_id', 'anuidade_id', 'data_inicio', 'data_fim', 'cobertura_ativa', 'vl_max_consumo', 'created_at', 'updated_at'];
	protected $dates 	= ['data_inicio', 'data_fim'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
//     public function plano()
//     {
//         return $this->belongsTo('App\Plano');
//     }

    public function anuidade()
    {
        return $this->belongsTo('App\Anuidade');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

	public function getVlAnuidadeAttribute()
	{
		if($this->periodicidade == 'anual') $perioVl = 'vl_anuidade_ano';
		elseif($this->periodicidade == 'mensal') $perioVl = 'vl_anuidade_mes';
		else return 0;

		return $this->anuidade->$perioVl;
	}
}

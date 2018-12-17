<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $tp_contato
 * @property string $ds_contato
 * @property string $created_at
 * @property string $updated_at
 * @property Paciente[] $pacientes
 * @property Profissional[] $profissionals
 * @property Clinica[] $clinicas
 * @property Empresa[] $empresas
 * @property Representante[] $representantes
 */
class Contato extends Model
{
	const TP_CEL_PESSOAL 		= 'CP';
	const TP_CEL_COMERCIAL		= 'CC';
	const TP_FIXO_RESIDENCIAL	= 'FR';
	const TP_FIXO_COMERCIAL		= 'FC';
	const TP_FAX				= 'FX';

    /**
     * @var array
     */
    protected $fillable = ['tp_contato', 'ds_contato', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pacientes()
    {
        return $this->belongsToMany('App\Paciente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function profissionals()
    {
        return $this->belongsToMany('App\Profissional');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function clinicas()
    {
        return $this->belongsToMany('App\Clinica');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function empresas()
    {
        return $this->belongsToMany('App\Empresa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function representantes()
    {
        return $this->belongsToMany('App\Representante');
    }

	public static function validaContato($tp_contato, $ds_contato)
	{
		$contato = Contato::where('tp_contato', $tp_contato)->where('ds_contato', $ds_contato)->get();

		if($contato->count() > 0) {
			$contato = $contato->first();

			$conPacientes = $contato->pacientes()->where('cs_status', 'A')->get();
			$conProfissionals = $contato->profissionals()->where('cs_status', 'A')->get();
			$conRepresentantes = $contato->representantes()->get();
			$conClinicas = $contato->clinicas()->get();

			if($conPacientes->count() > 0 || $conProfissionals->count() > 0 || $conRepresentantes->count() > 0 || $conClinicas->count() > 0) {
				return false;
			}
		}

		return true;
	}
}

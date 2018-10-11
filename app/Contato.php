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
}

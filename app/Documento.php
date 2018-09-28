<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * @property int $id
 * @property int $estado_id
 * @property string $tp_documento
 * @property string $te_documento
 * @property int $nr_serie
 * @property string $dt_expedicao
 * @property string $dt_validade
 * @property string $sg_orgao_expedidor
 * @property string $created_at
 * @property string $updated_at
 * @property Estado $estado
 * @property Clinica[] $clinicas
 * @property Paciente[] $pacientes
 * @property Profissional[] $profissionals
 */
class Documento extends Model
{
	use Sortable;

	/**
	 * @var array
	 */
	public $fillable = ['tp_documento', 'te_documento', 'nr_serie', 'dt_expedicao', 'dt_validade', 'sg_orgao_expedidor', 'estado_id'];
	public $sortable = ['tp_documento', 'te_documento'];
	public $dates 	 = ['dt_expedicao', 'dt_validade'];
	public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('App\Estado');
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

	public function getTeDocumentoAttribute($nrDocumento){
		if( $this->attributes['tp_documento'] == 'CPF' ) {
			return \App\Http\Controllers\UtilController::formataCpf($nrDocumento);
		}elseif( $this->attributes['tp_documento'] == 'CNPJ' ) {
			return \App\Http\Controllers\UtilController::formataCnpj($nrDocumento);
		}else{
			return $nrDocumento;
		}
	}
}
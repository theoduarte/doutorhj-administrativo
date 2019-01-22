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

	const TP_CPF 		= 'CPF';
	const TP_RG			= 'RG';
	const TP_CNASC		= 'CNASC';
	const TP_CTPS		= 'CTPS';
	const TP_CNPJ		= 'CNPJ';

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
    
    public function filials()
    {
    	return $this->hasMany('App\Filial');
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function representantes()
	{
		return $this->belongsToMany('App\Representante');
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

	public static function validaDocumento($tp_documento, $te_documento)
	{
		$documento = Documento::where('tp_documento', $tp_documento)->where('te_documento', $te_documento)->get();

		if($documento->count() > 0) {
			$documento = $documento->first();

			$docPacientes = $documento->pacientes()->where('cs_status', 'A')->get();
			$docProfissionals = $documento->profissionals()->where('cs_status', 'A')->get();
			$docRepresentantes = $documento->representantes()->get();
			$docClinicas = $documento->clinicas()->where('cs_status', 'A')->get();

			if($docPacientes->count() > 0 || $docProfissionals->count() > 0 || $docRepresentantes->count() > 0  || $docClinicas->count() > 0) {
				return false;
			}
		}

		return true;
	}
}
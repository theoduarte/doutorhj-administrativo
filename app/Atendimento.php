<?php

namespace App;

use Illuminate\Http\Request;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $clinica_id
 * @property int $consulta_id
 * @property int $procedimento_id
 * @property int $profissional_id
 * @property string $ds_preco
 * @property string $cs_status
 * @property string $created_at
 * @property string $updated_at
 * @property Clinica $clinica
 * @property Consulta $consulta
 * @property Procedimento $procedimento
 * @property Profissional $profissional
 * @property Preco[] $precos
 * @property AgendamentoAtendimento[] $agendamentoAtendimentos
 * @property Filial[] $filials
 * @property ItemCheckup[] $itemCheckups
 * @property Agendamento[] $agendamentos
 */

class Atendimento extends Model
{
	use Sortable;
	
	public $fillable  = ['id', 'ds_preco'];
	public $sortable  = ['id', 'ds_preco'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function clinica()
	{
		return $this->belongsTo('App\Clinica');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function consulta()
	{
		return $this->belongsTo('App\Consulta');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function procedimento()
	{
		return $this->belongsTo('App\Procedimento');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function profissional()
	{
		return $this->belongsTo('App\Profissional');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function precos()
	{
		return $this->hasMany('App\Preco')->where('cs_status', '=', 'A');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function agendamentoAtendimentos()
	{
		return $this->hasMany('App\AgendamentoAtendimento');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function filials()
	{
		return $this->belongsToMany('App\Filial');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function itemCheckups()
	{
		return $this->hasMany('App\ItemCheckup');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function agendamentos()
	{
		return $this->hasMany('App\Agendamento');
	}

	public function getFirst($data) {

        $atendimentos =  $this::where(function ($query) use ($data) {
            $query->where('cs_status','A')->get();

            if ( !empty($data['clinica_id']) ) {
                $query->where('clinica_id', $data['clinica_id'])->get();
            }

            if ( !empty($data['consulta_id']) ) {
                $query->where('consulta_id', $data['consulta_id'])->get();
            }

            if ( !empty($data['especialidade']) ) {
                $query->where('consulta_id', $data['especialidade'])->get();
            }

            if ( !empty($data['profissional_id']) ) {

                if (is_array($data['profissional_id']) ) {
                    $query->whereIn('profissional_id', $data['profissional_id'])->get();
                }
                else {
                    $query->where('profissional_id', $data['profissional_id'])->get();
                }
            }
        })->first();

        return !empty($atendimentos) ? $atendimentos->toArray() : [];
    }

    public function getFirstProcedimento($data) {

        $atendimentos =  $this::where(function ($query) use ($data) {
            $query->where('cs_status','A')->get();

            if ( !empty($data['clinica_id']) ) {
                $query->where('clinica_id', $data['clinica_id'])->get();
            }

            if ( !empty($data['procedimento_id']) ) {
                $query->where('procedimento_id', $data['procedimento_id'])->get();
            }

            if ( !empty($data['especialidade']) ) {
                $query->where('procedimento_id', $data['especialidade'])->get();
            }

            
        })->first();

        return !empty($atendimentos) ? $atendimentos->toArray() : [];
    }

    public function getAll($data) {
		$atendimentos =  $this::where(function ($query) use ($data) {
            $query->where('cs_status','A')->get();
            if ( !empty($data['clinica_id']) ) {
                $query->whereIn('clinica_id', explode(',',$data['clinica_id']))->get();
            }

            if ( !empty($data['consulta_id']) ) {
                $query->where('consulta_id', $data['consulta_id'])->get();
            }

            if ( !empty($data['procedimento_id']) ) {
                $query->where('procedimento_id', $data['procedimento_id'])->get();
            }

            if ( !empty($data['profissional_id']) ) {
                $query->whereIn('profissional_id', $data['profissional_id'])->get();
            }
        })->get();

		return $atendimentos;
	}

    public function getAtendsProcedimentoByCheckup($data){
        return DB::select(" SELECT at.*
                              FROM atendimentos at
                              JOIN item_checkups ic ON (ic.atendimento_id = at.id)
                             WHERE ic.checkup_id = ?
                               AND at.clinica_id = ?
                               AND at.procedimento_id = ?", [$data['checkup_id'], $data['clinica_id'], $data['procedimento_id']]);
    }
}

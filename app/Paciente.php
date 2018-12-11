<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $cargo_id
 * @property int $responsavel_id
 * @property int $empresa_id
 * @property string $nm_primario
 * @property string $nm_secundario
 * @property string $cs_sexo
 * @property string $dt_nascimento
 * @property string $access_token
 * @property string $time_to_live
 * @property string $created_at
 * @property string $updated_at
 * @property string $parentesco
 * @property string $cs_status
 * @property string $mundipagg_token
 * @property Cargo $cargo
 * @property Paciente $paciente
 * @property User $user
 * @property Empresa $empresa
 * @property Contato[] $contatos
 * @property Endereco[] $enderecos
 * @property Pedido[] $pedidos
 * @property Agendamento[] $agendamentos
 * @property Documento[] $documentos
 * @property CartaoPaciente[] $cartaoPacientes
 * @property VigenciaPaciente[] $vigenciaPacientes
 * @property Voucher[] $vouchers
 * @property Campanha[] $campanhas
 *
 * @property Plano $plano_ativo
 * @property float $vl_max_consumo
 * @property float $vl_consumido
 * @property float $saldo_empresarial
 */

class Paciente extends Model
{
	use Sortable;

	public $fillable      = ['id', 'nm_primario', 'nm_secundario', 'cs_sexo', 'dt_nascimento', 'cargo_id'];
	public $sortable      = ['id', 'nm_primario', 'nm_secundario'];
	public $dates 	      = ['dt_nascimento'];

	protected $hidden = ['access_token', 'time_to_live', 'mundipagg_token'];
	protected $appends = ['plano_ativo', ];

	/*
	 * Constants
	 */
	const MASCULINO = 'M';
	const FEMININO  = 'F';
	
	protected static $cs_sexo = array(
	    self::MASCULINO => 'Masculino',
	    self::FEMININO  => 'Feminino'
	);

	/*
	 * Relationship
	 */
	public function cargo(){
	    return $this->belongsTo('App\Cargo');
	}

	public function contatos(){
	    return $this->belongsToMany('App\Contato');
	}

	public function empresa() {
		return $this->belongsTo('App\Empresa');
	}

	public function pedidos() {
		return $this->hasMany('App\Pedido');
	}

	public function agendamentos() {
		return $this->hasMany('App\Agendamento');
	}

	public function enderecos() {
	    return $this->belongsToMany('App\Endereco');
	}
	
	public function documentos() {
	    return $this->belongsToMany('App\Documento'); 
	}
	
	public function user() {
	    return $this->belongsTo('App\User');
	}

	public function responsavel() {
	    return $this->belongsTo(self::class, 'responsavel_id');
	}

	public function cartaoPacientes() {
		return $this->hasMany('App\CartaoPaciente');
	}

	public function vigenciaPacientes() {
		return $this->hasMany('App\VigenciaPaciente');
	}

	public function vouchers() {
		return $this->hasMany('App\Voucher');
	}

	public function campanhas() {
		return $this->belongsToMany('App\Campanha', 'campanha_clinica');
	}

	/*
	 * Getters and Setters
	 */
	public function setDtNascimentoAttribute($data)
	{
	    $this->attributes['dt_nascimento'] = Carbon::createFromFormat('d/m/Y', $data);
	}
    
	public function getDtNascimentoAttribute()
	{
	    $date = new Carbon($this->attributes['dt_nascimento']);
	    return $date->format('d/m/Y');
	}
	
	public function getNmPrimarioAttribute()
	{
	    return mb_strtoupper($this->attributes['nm_primario']);
	}
	
	public function getNmSecundarioAttribute()
	{
	    return mb_strtoupper($this->attributes['nm_secundario']);
	}

	public function getPlanoAtivoAttribute()
	{
		return Plano::findOrFail($this->getPlanoAtivo($this->attributes['id'])); //some logic to return numbers
	}

	public static function getPlanoAtivo($paciente_id)
	{
		$vigenciaPac = self::getVigenciaAtiva($paciente_id);

		if(is_null($vigenciaPac) || is_null($vigenciaPac->anuidade)) {
			return Plano::OPEN;
		} else {
			return $vigenciaPac->anuidade->plano_id;
		}
	}

	public static function getVigenciaAtiva($paciente_id)
	{
		$vigenciaPac = VigenciaPaciente::where(['paciente_id' => $paciente_id])
			->where(function($query) {
				$query->whereDate('data_inicio', '<=', date('Y-m-d H:i:s'))
					->whereDate('data_fim', '>=', date('Y-m-d H:i:s'))
					->orWhere(DB::raw('cobertura_ativa'), '=', true);
			})
			->first();

		return $vigenciaPac;
	}
}
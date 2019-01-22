<?php

namespace App;

use App\Http\Controllers\UtilController;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * @property int $id
 * @property int $tp_empresa_id
 * @property int $endereco_id
 * @property int $matriz_id
 * @property int $resp_financeiro_id
 * @property string $nome_fantasia
 * @property string $cnpj
 * @property string $inscricao_estadual
 * @property string $cs_status
 * @property float $vl_max_empresa
 * @property float $vl_max_funcionario
 * @property float $anuidade
 * @property float $desconto
 * @property string $created_at
 * @property string $updated_at
 * @property string $razao_social
 * @property string $logomarca_path
 * @property boolean $pre_autorizar
 * @property string $mundipagg_token
 * @property TipoEmpresa $tipoEmpresa
 * @property Endereco $endereco
 * @property Empresa $empresa
 * @property Representante $responsavelFinanceiro
 * @property Representante[] $representantes
 * @property CartaoPaciente[] $cartaoPacientes
 * @property Contato[] $contatos
 * @property Paciente[] $pacientes
 * @property Anuidades[] $anuidades
 */
class Empresa extends Model
{
	use Sortable;

	/**
	 * @var array
	 */
	protected $fillable = ['tp_empresa_id', 'endereco_id', 'matriz_id', 'resp_financeiro_id', 'nome_fantasia', 'cnpj',
		'inscricao_estadual', 'cs_status', 'vl_max_empresa', 'vl_max_funcionario', 'anuidade', 'desconto', 'created_at',
		'updated_at', 'razao_social', 'pre_autorizar', 'mundipagg_token', 'logomarca_path', 'contato_financeiro',
		'contato_administrativo'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function tipoEmpresa()
	{
		return $this->belongsTo('App\TipoEmpresa', 'tp_empresa_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function endereco()
	{
		return $this->belongsTo('App\Endereco');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function empresa()
	{
		return $this->belongsTo('App\Empresa', 'matriz_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function responsavelFinanceiro()
	{
		return $this->belongsTo('App\Representante', 'resp_financeiro_id');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function representantes()
	{
		return $this->belongsToMany('App\Representante');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function cartaoPacientes()
	{
		return $this->hasMany('App\CartaoPaciente');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function anuidades()
	{
		return $this->hasMany('App\Anuidade')->whereNull('deleted_at')->orderBy('plano_id', 'asc');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function contatos()
	{
		return $this->belongsToMany('App\Contato');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function pacientes()
	{
		return $this->hasMany('App\Paciente');
	}

	public function setCnpjAttribute($value)
	{
		$this->attributes['cnpj'] = UtilController::retiraMascara($value);
	}

	public function getCnpjAttribute()
	{
		if(isset($this->attributes['cnpj'])) return UtilController::mask($this->attributes['cnpj'], '##.###.###/####-##');
	}

	public function setAnuidadeAttribute($value)
	{
		if(!is_null($value)) $this->attributes['anuidade'] = UtilController::removeMaskMoney($value);
	}

	public function getAnuidadeAttribute()
	{
		if(isset($this->attributes['anuidade'])) return number_format( $this->attributes['anuidade'],  2, ',', '.');
	}

	public function setDescontoAttribute($value)
	{
		if(!is_null($value)) $this->attributes['desconto'] = UtilController::removeMaskMoney($value);
	}

	public function getDescontoAttribute()
	{
		if(isset($this->attributes['desconto'])) return number_format( $this->attributes['desconto'],  2, ',', '.');
	}

	public function setVlMaxEmpresaAttribute($value)
	{
		$this->attributes['vl_max_empresa'] = UtilController::removeMaskMoney($value);
	}

	public function getVlMaxEmpresaAttribute()
	{
		if(isset($this->attributes['vl_max_empresa'])) return number_format( $this->attributes['vl_max_empresa'],  2, ',', '.');
	}

	public function setVlMaxFuncionarioAttribute($value)
	{
		$this->attributes['vl_max_funcionario'] = UtilController::removeMaskMoney($value);
	}

	public function getVlMaxFuncionarioAttribute()
	{
		if(isset($this->attributes['vl_max_funcionario'])) return number_format( $this->attributes['vl_max_funcionario'],  2, ',', '.');
	}

	public function getCartaoAtivo()
	{
		$cartao = $this->cartaoPacientes()->where('cs_status', 'A')->where('tp_cartao_id', TipoCartao::EMPRESARIAL)->first();

		return $cartao;
	}
}

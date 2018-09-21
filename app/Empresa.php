<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * @property int $id
 * @property int $tp_empresa_id
 * @property int $endereco_id
 * @property int $matriz_id
 * @property string $nome_fantasia
 * @property integer $cnpj
 * @property string $inscricao_estadual
 * @property string $cs_status
 * @property float $vl_max_empresa
 * @property float $vl_max_funcionario
 * @property float $anuidade
 * @property int $desconto
 * @property string $created_at
 * @property string $updated_at
 * @property string $razao_social
 * @property TipoEmpresa $tipoEmpresa
 * @property Endereco $endereco
 * @property Empresa $empresa
 * @property CartaoPaciente[] $cartaoPacientes
 * @property Contato[] $contatos
 * @property EmpresaUser[] $empresaUsers
 * @property Paciente[] $pacientes
 */
class Empresa extends Model
{
	use Sortable;

    /**
     * @var array
     */
    protected $fillable = ['tp_empresa_id', 'endereco_id', 'matriz_id', 'nome_fantasia', 'cnpj', 'inscricao_estadual', 'cs_status', 'vl_max_empresa', 'vl_max_funcionario', 'anuidade', 'desconto', 'created_at', 'updated_at', 'razao_social'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartaoPacientes()
    {
        return $this->hasMany('App\CartaoPaciente');
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
    public function empresaUsers()
    {
        return $this->hasMany('App\EmpresaUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pacientes()
    {
        return $this->hasMany('App\Paciente');
    }
}

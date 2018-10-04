<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $paciente_id
 * @property int $empresa_id
 * @property int $tp_cartao_id
 * @property string $bandeira
 * @property string $nome_impresso
 * @property string $numero
 * @property int $ano_vencimento
 * @property int $mes_vencimento
 * @property string $codigo_seg
 * @property string $created_at
 * @property string $updated_at
 * @property string $card_token
 * @property string $dt_validade
 * @property string $cs_status
 * @property Paciente $paciente
 * @property Empresa $empresa
 * @property TipoCartao $tipoCartao
 * @property Pedido[] $pedidos
 */
class CartaoPaciente extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['paciente_id', 'empresa_id', 'tp_cartao_id', 'bandeira', 'nome_impresso', 'numero', 'ano_vencimento', 'mes_vencimento', 'codigo_seg', 'created_at', 'updated_at', 'card_token', 'dt_validade', 'cs_status'];

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
    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoCartao()
    {
        return $this->belongsTo('App\TipoCartao', 'tp_cartao_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany('App\Pedido', 'cartao_id');
    }
}

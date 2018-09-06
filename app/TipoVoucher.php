<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $descricao
 * @property string $created_at
 * @property string $updated_at
 * @property Voucher[] $vouchers
 */
class TipoVoucher extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['descricao', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vouchers()
    {
        return $this->hasMany('App\Voucher', 'tp_voucher_id');
    }
}

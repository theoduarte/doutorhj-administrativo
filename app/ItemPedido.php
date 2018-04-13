<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Itempedido extends Model
{
    use Sortable;
    
    public $fillable  = ['id', 'valor', 'pedido_id', 'agendamento_id'];
    public $sortable  = ['id', 'valor'];
    
    public function agendamento()
    {
        return $this->belongsTo(Agendamento::class);
    }
}

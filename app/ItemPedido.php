<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Itempedido extends Model
{
    use Sortable;
    
    public $fillable  = ['id', 'valor', 'pedido_id', 'agendamento_id'];
    public $sortable  = ['id', 'valor'];
    
    public function agendamento()
    {
        return $this->belongsTo('App\Agendamento');
    }
    
    public function pedido()
    {
        return $this->belongsTo('App\Pedido');
    }
    
    public function getVlItempedido()
    {
        return number_format( $this->attributes['valor'],  2, ',', '.');
    }
    
    public function getValorAttribute($valor){
        return number_format( $valor,  2, ',', '.');
    }
}
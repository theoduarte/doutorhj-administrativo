<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class MensagemDestinatario extends Model
{
    use Sortable;
    
    public $fillable = ['visualizado', 'cs_status', 'tipo_destinario', 'mensagem_id', 'destinatario_id'];
    public $sortable = ['visualizado', 'cs_status', 'tipo_destinario', 'mensagem_id', 'destinatario_id'];
    
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.u';
    
    const ATIVO = 'A';
    const INATIVO = 'I';
    
    public function remetente(){
        return $this->belongsTo('App\User');
    }
    
    public function mensagem(){
        return $this->belongsTo('App\Mensagem');
    }
    
    public function getCreatedAtAttribute($data){
        $obData = new Carbon($data);
        
        return $obData->format('d/m/Y - H:i');
    }
}

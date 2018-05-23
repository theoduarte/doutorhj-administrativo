<?php

namespace App;

use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use Sortable;
    
    public $fillable = ['assunto', 'conteudo', 'remetente_id'];
    public $sortable = ['assunto', 'conteudo'];
    
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.u';
    
    public function remetente(){
        return $this->belongsTo('App\User');
    }
    
    public function mensagem_destinatarios(){
        return $this->hasMany('App\MensagemDestinatario', 'mensagem_id');
    }
    
    public function getCreatedAtAttribute($data){
        $obData = new Carbon($data);
        
        return $obData->format('d/m/Y - H:i');
    }
    
    public function getRawCreatedAtAttribute() {
        return $this->attributes['created_at'];
    }
}
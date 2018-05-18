<?php

namespace App;

use Illuminate\Support\Carbon;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use Sortable;
    
    public $fillable = ['remetente', 'destinatario', 'titulo', 'descricao', 'visualizado', 'cs_status'];
    public $sortable = ['remetente', 'destinatario', 'titulo', 'descricao'];
    
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.u';
    
    const ATIVO = 'A';
    const INATIVO = 'I';
    
    
    
    
    public function clinica(){
        return $this->belongsTo('App\Clinica');
    }
    
    
    public function getCreatedAtAttribute($data){
        $obData = new Carbon($data);
        
        return $obData->format('d/m/Y - H:i');
    }
}
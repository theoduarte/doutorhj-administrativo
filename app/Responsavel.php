<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Responsavel extends Model
{
    use Sortable;
    
    protected $fillable = ['telefone', 'cpf'];
    
    public $sortable = ['id', 'telefone', 'cpf'];
    
    public function clinicas()
    {
        return $this->hasMany('App\Clinica');
        
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

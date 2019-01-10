<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Responsavel extends Model
{
    use Sortable;
	use SoftDeletes;
    
    protected $fillable = ['telefone', 'cpf'];
    
    public $sortable = ['id', 'telefone', 'cpf'];
	protected $dates = ['deleted_at'];
    
    public function clinicas()
    {
        return $this->hasMany('App\Clinica');
        
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

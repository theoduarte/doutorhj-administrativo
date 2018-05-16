<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Clinica extends Model
{
	use Sortable;
	
    public $fillable = ['nm_razao_social', 'nm_fantasia'];
    public $sortable = ['id', 'nm_razao_social', 'nm_fantasia'];
	
    public function responsavel(){
        return $this->belongsTo('App\Responsavel');
    }
    
    public function contatos(){
        return $this->belongsToMany('App\Contato');
    }
    
    public function enderecos(){
        return $this->belongsToMany('App\Endereco');
    }
    
    public function documentos(){
        return $this->belongsToMany('App\Documento');
    }
    
    public function consultas(){
        return $this->belongsToMany('App\Consulta');
    }
    
    public function procedimentos(){
        return $this->belongsToMany('App\Procedimento');
    }
    
    public function profissionals()
    {
        return $this->hasMany('App\Profissional');
    }
}
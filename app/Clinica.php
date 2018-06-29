<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
	use Sortable;
	
    public $fillable = ['nm_razao_social', 'nm_fantasia', 'tp_prestador', 'cs_status', 'obs_procedimento'];
    public $sortable = ['id', 'nm_razao_social', 'nm_fantasia', 'tp_prestador', 'cs_status', 'obs_procedimento'];
	
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
    
    public function filials()
    {
        return $this->hasMany('App\Filial');
    }
}
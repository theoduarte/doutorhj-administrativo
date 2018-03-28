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
        return $this->belongsToMany(Contato::class, 'clinica_contato', 'clinica_id', 'contato_id');
    }
    
    public function enderecos(){
        return $this->belongsToMany(Endereco::class, 'clinica_endereco', 'clinica_id', 'endereco_id');
    }
    
    public function documentos(){
        return $this->belongsToMany(Documento::class, 'clinica_documento', 'clinica_id', 'documento_id');
    }
    
    public function consultas(){
        return $this->belongsToMany(Consulta::class, 'clinica_consulta', 'consulta_id', 'clinica_id');
    }
    
    public function procedimentos(){
        return $this->belongsToMany(Procedimento::class, 'clinica_procedimento', 'procedimento_id', 'clinica_id');
    }
    
    public function profissionals()
    {
        return $this->hasMany('App\Profissional');
    }
}
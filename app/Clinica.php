<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
	use Sortable;
	
    public $fillable = ['nm_razao_social', 'nm_fantasia'];
    public $sortable = ['id', 'nm_razao_social', 'nm_fantasia'];
	
    public function cargo(){
        return $this->hasOne(Cargo::class);
    }
    
    public function agendamentos(){
        return $this->hasMany(Agendamento::class);
    }
    
    public function contatos(){
        return $this->belongsToMany(Contato::class, 'contato_profissional', 'profissional_id', 'contato_id');
    }
    
    public function enderecos(){
        return $this->belongsToMany(Endereco::class, 'endereco_profissional', 'profissional_id', 'endereco_id');
    }
    
    public function documentos(){
        return $this->belongsToMany(Documento::class, 'documento_profissional', 'profissional_id', 'documento_id');
    }
}
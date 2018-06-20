<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Filial extends Model
{
    use Sortable;
    
    protected $fillable = ['nm_nome_fantasia', 'cs_status', 'clinica_id', 'endereco_id'];
    
    public $sortable = ['id', 'nm_nome_fantasia', 'cs_status', 'clinica_id', 'endereco_id'];
    
    public function clinica()
    {
        return $this->belongsTo('App\Clinica');
    }
    
    public function endereco()
    {
        return $this->belongsTo('App\Endereco');
    }
    
    public function agendamentos()
    {
        return $this->hasMany('App\Agendamento');
    }
    
    public function profissionals()
    {
        return $this->belongsToMany('App\Profissional');
    }
}

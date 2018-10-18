<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Endereco extends Model
{
    use Sortable;
    
	public $fillable   = ['cidade_id', 'sg_logradouro', 'te_endereco', 'nr_logradouro', 'te_bairro', 'nr_cep', 'te_complemento', 'nr_latitude_gps', 'nr_longitude_gps'];
	public $sortable   = ['id', 'cidade_id', 'sg_logradouro', 'te_endereco', 'nr_logradouro', 'te_bairro', 'nr_cep', 'te_complemento', 'nr_latitude_gps', 'nr_longitude_gps'];
	
	public function cidade(){
	    return $this->belongsTo("App\Cidade");
	}
}

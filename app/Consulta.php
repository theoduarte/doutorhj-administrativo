<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Consulta extends Model
{
	use Sortable;
	
    public $fillable = ['cd_consulta', 'ds_consulta'];
    public $sortable = ['id', 'cd_consulta', 'ds_consulta'];
	
    public function especialidade(){
        return $this->belongsTo(Especialidade::class);
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class TagPopular extends Model
{
    use Sortable;
    
    protected $fillable = ['cs_tag', 'procedimento_id', 'consulta_id'];
    
    public $sortable = ['id', 'cs_tag', 'procedimento_id', 'consulta_id'];
    
    public function procedimento()
    {
        return $this->belongsTo('App\Procedimento');
    }
    
    public function consulta()
    {
    	return $this->belongsTo('App\Consulta');
    }
}

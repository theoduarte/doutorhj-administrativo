<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class TagPopular extends Model
{
    use Sortable;
    
    protected $fillable = ['cs_tag', 'atendimento_id'];
    
    public $sortable = ['id', 'cs_tag', 'atendimento_id'];
    
    public function atendimento()
    {
        return $this->belongsTo('App\Atendimento');
    }
}

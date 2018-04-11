<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Convenio extends Model
{
    use Sortable;
    
    public $fillable  = ['id', 'cd_convenio', 'ds_convenio', 'cs_status'];
    
    /*
     * CS_STATUS
     */
    const ATIVO   = 'A';
    const INATIVO = 'B';

    protected static $cs_status = array(
        self::ATIVO   => 'Ativo',
        self::INATIVO => 'Inativo',
    );
}
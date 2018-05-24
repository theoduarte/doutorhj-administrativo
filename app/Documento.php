<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
	use Sortable;
	
	
    public $fillable = ['tp_documento', 'te_documento', 'nr_serie', 'dt_expedicao', 'dt_validade', 'sg_orgao_expedidor', 'estado_id'];
    public $sortable = ['tp_documento', 'te_documento'];
    public $dates 	 = ['dt_expedicao', 'dt_validade'];
    public $timestamps = true;
	
    
    
	public function estado(){
		return $this->belongsTo('App\Estado'); 
	}
	
	
	public function getTeDocumentoAttribute($nrDocumento){
	    if( $this->attributes['tp_documento'] == 'CPF' ) {
	        return \App\Http\Controllers\UtilController::formataCpf($nrDocumento);
	    }elseif( $this->attributes['tp_documento'] == 'CNPJ' ) {
	        return \App\Http\Controllers\UtilController::formataCnpj($nrDocumento);
	    }else{
	        return $nrDocumento;
	    }
	}
}
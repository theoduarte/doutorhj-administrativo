<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ItemCheckups extends Model
{
    public function atendimento() {
        return $this->belongsTo('App\Atendimento');
    }

    public function getVlNetCheckupAttribute($value) {
        return number_format( $value,  2, '.', ',');
    }
    
    public function getVlComCheckupAttribute($value) {
        return number_format( $value,  2, '.', ',');
    }
       
    public function setVlNetCheckupAttribute($value){
        if (empty($value)) return;
            
        $this->attributes['vl_net_checkup'] = str_replace(',', '.', str_replace('.', '', $value));
    }
    
    public function setVlComCheckupAttribute($value){
        if (empty($value)) return;
            
        $this->attributes['vl_com_checkup'] = str_replace(',', '.', str_replace('.', '', $value));
    }

    /*
    -- Validation Rules --
    */
    public static function validationRules(Request $request) {
        $fields['vl_net_checkup'] = ['required'];
        $fields['vl_com_checkup'] = ['required'];

        $messages['vl_net_checkup.required'] = 'O campo "Vl. NET Checkup" é obrigatório';
        $messages['vl_com_checkup.required'] = 'O campo "Vl. Comercial Checkup" é obrigatório';
        
        Validator::make( $request->all(), $fields, $messages )->validate();
    }

    public function getItensGrouped($checkup){

        return DB::select(" SELECT ic.checkup_id, ds_item, ic.vl_net_checkup, ic.vl_com_checkup, 
                                    c.id consulta_id, c.cd_consulta, c.ds_consulta,
                                    array_agg( CONCAT(p.id, ':\"', p.nm_primario, ' ', p.nm_secundario,'\"') ) profissionals
                              FROM item_checkups ic
                              JOIN atendimentos a ON (ic.atendimento_id = a.id)
                              JOIN profissionals p ON (a.profissional_id = p.id)
                              JOIN consultas c ON (a.consulta_id = c.id)
                             WHERE checkup_id = ?
                             GROUP BY ic.checkup_id, ds_item, ic.vl_net_checkup, ic.vl_com_checkup, 
                                    c.id, c.cd_consulta, c.ds_consulta;", [$checkup]);
    }
}
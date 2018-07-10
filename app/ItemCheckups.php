<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

class ItemCheckups extends Model
{
    public function getVlNetCheckupAttribute(){
        return number_format( $valor,  2, ',', '.');
    }
    
    public function getVlComCheckupAttribute(){
        return number_format( $valor,  2, ',', '.');
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
}
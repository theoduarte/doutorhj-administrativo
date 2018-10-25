<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Checkups extends Model
{
    public $fillable = ['titulo', 'cs_status', 'tipo', 'ds_checkup'];

    /*
    -- Validation Rules --
    */
    public static function validationRules(Request $request, $isUpdate = false) {
        $fields['titulo'] = ['required'];
        $fields['tipo'] = ['required'];

        if( $isUpdate ) {
            $fields['cs_status'] = ['required'];
        }

        $messages['titulo.required'] = 'O campo "Título" é obrigatório';
        $messages['tipo.required'] = 'O campo "Tipo" é obrigatório';
        $messages['cs_status.required'] = 'O campo "Status" é obrigatório';
        
        Validator::make( $request->all(), $fields, $messages )->validate();
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfissionaisEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [
            'nm_primario'   => 'required|max:20|min:3',
            'nm_secundario' => 'required|max:50',
            'cs_sexo'       => 'required|max:1',
            'dt_nascimento' => 'required|max:10|date_format:"d/m/Y"',
            'te_documento'  => 'required|max:15',
        ];
    }
}

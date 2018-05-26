<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfissionaisRequest extends FormRequest
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
            'nr_crm'        => 'required|numeric',
            'cd_ibge_cidade'=> 'required|numeric',
            'dt_nascimento' => 'required|max:10|date_format:"d/m/Y"',
            'tp_documento'  => 'required|max:3',
            'te_documento'  => 'required|max:15',
            'tp_contato1'   => 'required|max:2',
            'ds_contato1'   => 'required|max:15|min:10',
            'nr_cep'        => 'max:9|min:8',
            'te_complemento'=> 'max:1000',
            'email'         => 'required|max:50|min:3|email|unique:users,email',
            'password'      => 'required|string|min:6|confirmed', 
        ];
    }
}

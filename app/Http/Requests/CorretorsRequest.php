<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CorretorsRequest extends FormRequest
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
    
    public function attributes()
    {
        return [
            'nm_primario'       	=> 'Nome',
            'nm_secundario'        	=> 'Sobrenome',
            'email'                 => 'E-mail do Corretor',
            'dt_nascimento'      	=> 'Data de Nascimento',
        	'te_documento'          => 'CPF do Corretor',
        	'telefone'				=> 'Telefone do Corretor',
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch ($this->method()) {
            case 'PUT':

            	$rules = [
            			'nm_primario'       	=> 'required|max:50',
            			'nm_secundario'         => 'required|max:100',
            			'tp_documento'          => 'required|max:5',
            			'dt_nascimento'			=> 'required',
            			'email'                 => 'required|max:150|min:3|email|unique:corretors,email,'.$this->id,
            			'te_documento'          => 'required|max:30',
            			'telefone'       		=> 'required|max:14|min:11|',
            			];

                break;
                
            default:
                $rules = [
                    'nm_primario'       	=> 'required|max:50',
            			'nm_secundario'         => 'required|max:100',
            			'tp_documento'          => 'required|max:5',
            			'dt_nascimento'			=> 'required',
            			'email'                 => 'required|max:150|min:3|email|unique:corretors,email',
            			'documento_id'          => 'unique:corretors,documento_id',
            			'contato_id'          	=> 'unique:corretors,contato_id',
            			'te_documento'          => 'required|max:30',
            			'telefone'       		=> 'required|max:15|min:11|',
                ];
                break;
        }

        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use App\Documento;
use Illuminate\Foundation\Http\FormRequest;

class ColaboradorRequest extends FormRequest
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
    			'nm_primario'          		=> 'Nome',
    			'nm_secundario'       		=> 'Sobrenome',
    			'cs_sexo'           		=> 'Sexo',
    			'cpf'    		     		=> 'CPF',
    			'telefone'      			=> 'Celular',
    			'dt_nascimento'  			=> 'Data de Nascimento',
    			'cpf_responsavel'       	=> 'CPF do Responsável',
    			'email'             		=> 'Email',
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
                    'nm_primario'       		=> 'required|max:50',
                    'nm_secundario'     		=> 'required|max:50',
                    'cs_sexo'           		=> 'required|max:1',
                    'cpf'     			 		=> 'required|max:14|min:11|cpf',
                    'telefone'        			=> 'required',
                    'dt_nascimento' 			=> 'required|max:10|date_format:"d/m/Y"',
                    'email'         			=> 'required|max:250|min:3',
					'dt_nascimento'				=> 'required|date_format:"d/m/Y"'
                ];
                break;
                
            default:
                $rules = [
                    'nm_primario'       		=> 'required|max:50',
                    'nm_secundario'     		=> 'required|max:50',
                    'cs_sexo'           		=> 'required|max:1',
                    'cpf'      					=> ['required','max:14','min:11','cpf', ],
                    'telefone'    	    		=> 'max:30|celular_com_ddd',
                    'dt_nascimento' 			=> 'required|max:10|date_format:"d/m/Y"',
                    'email'         			=> 'required|max:250|min:3|email',
					'dt_nascimento'				=> 'required|date_format:"d/m/Y"',
				];
                break;
        }
        
        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use App\Documento;
use Illuminate\Foundation\Http\FormRequest;

class DependenteRequest extends FormRequest
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
			'tp_documento'				=> 'Tipo Documento',
			'te_documento'    		    => 'Documento',
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
		if($this->tp_documento == Documento::TP_CPF) {
			$te_documento = '|cpf';
		} elseif($this->tp_documento == Documento::TP_CNASC) {
			$te_documento = '|min:2|max:30';
		} elseif($this->tp_documento == Documento::TP_CTPS) {
			$te_documento = '|min:2|max:30';
		} elseif($this->tp_documento == Documento::TP_RG) {
			$te_documento = '|min:2|max:30';
		}

		$rules = [
			'nm_primario'       		=> 'required|max:50',
			'nm_secundario'     		=> 'required|max:50',
			'cs_sexo'           		=> 'required|max:1',
			'tp_documento'				=> 'required',
			'te_documento'      		=> "required{$te_documento}",
			'telefone'    	    		=> 'required|max:30|celular_com_ddd',
			'dt_nascimento' 			=> 'required|max:10|date_format:"d/m/Y"',
			'email'         			=> 'required|max:250|min:3|email',
			'dt_nascimento'				=> 'required|date_format:"d/m/Y"',
		];

		if($this->method() == 'PUT') {
			$rules['telefone'] = ['max:30', 'celular_com_ddd'];
		}
        
        return $rules;
    }
}

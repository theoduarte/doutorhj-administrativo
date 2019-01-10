<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepresentanteRequest extends FormRequest
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
			'nm_primario' 		=> 'Nome',
			'nm_secundario' 	=> 'Sobrenome',
			'cs_sexo' 			=> 'Sexo',
			'dt_nascimento' 	=> 'Nascimento',
			'email'				=> 'Email',
			'perfiluser_id'		=> 'Perfil do Usuário',
			'cpf'  				=> 'CPF',
			'telefone'			=> 'Telefone',
			'email_pessoal'		=> 'Email Pessoal',
			'email'				=> 'Email Corporativo',
		];
	}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nm_primario' 		=> 'required|string|max:150',
			'nm_secundario' 	=> 'required|string|max:100',
			'cs_sexo' 			=> 'required|string|max:1',
			'dt_nascimento' 	=> 'required|max:10|data',
			'email'				=> 'required|email|',
			'perfiluser_id'		=> 'required|integer|exists:perfilusers,id',
			'cpf'  				=> 'required|max:15|formato_cpf|cpf',
			'telefone'			=> 'required|celular_com_ddd',
			'email_pessoal'		=> 'required|max:250|email',
			'email'				=> 'required|max:250|email',
        ];
    }
}

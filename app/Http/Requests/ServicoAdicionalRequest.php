<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicoAdicionalRequest extends FormRequest
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
		 public function attributes()
	 	{
	 		return [
	 			'serv_adicional'	=> 'Serviço Adicional',
	 		];
	 	}

    public function rules()
    {
        return [
          'titulo'    => 'required|max:150|min:3',
          'plano_id'  => 'required|numeric',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanoRequest extends FormRequest
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
			'cd_plano'					=> 'Código',
			'ds_plano'					=> 'Descrição',
			'tp_plano_id'				=> 'Tipo de Plano',
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
			'cd_plano'					=> 'required|integer',
			'ds_plano'					=> 'required|string|max:150',
			'tipoPlanos'				=> 'required|array',
			'tipoPlanos.*'				=> 'required|integer|exists:tipo_planos,id',
        ];
    }
}

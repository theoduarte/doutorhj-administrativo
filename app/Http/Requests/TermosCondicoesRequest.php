<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TermosCondicoesRequest extends FormRequest
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
            'dt_inicial' => 'required|date_format:d/m/Y',
            'dt_final' => 'required|date_format:d/m/Y',
            'ds_termo' => 'required',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'dt_inicial.required' => 'O campo "data inicial" é obrigatório!',
            'dt_final.required' => 'O campo "data final" é obrigatório!',
            'dt_inicial.date_format' => 'O campo "data inicial" está com um formato inválido!',
            'dt_final.date_format' => 'O campo "data final" está com um formato inválido!',
            'ds_termo.required' => 'O campo "Termos e Condições" é obrigatório!',
        ];
    }
}
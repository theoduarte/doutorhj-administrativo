<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrecificacaoConsultaRequest extends FormRequest
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
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    'atendimento_id' => 'required',
                    'ds_consulta' => 'required',
                    'vl_com_consulta' => 'required',
                    'vl_net_consulta' => 'required',
                    'profissional_id' => 'required',
                ];
                
                break;
        
            case 'DELETE':
                $rules = [
                    'atendimento_id' => 'required',
                ];
                
                break;
        
            default:
                $rules = [
                    'consulta_id' => 'required',
                    'ds_consulta' => 'required',
                    'vl_com_consulta' => 'required',
                    'vl_net_consulta' => 'required',
                    'list_profissional_consulta' => 'required',
                ];
                
                break;
        }
        
        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'consulta_id.required' => 'O campo "Consulta" é obrigatório!',
            'ds_consulta.required' => 'O campo "Consulta" é obrigatório!',
            'vl_com_consulta.date_format' => 'O campo "Valor Comercial (R$)" está com um formato inválido!',
            'vl_net_consulta.date_format' => 'O campo "Valor NET (R$)" está com um formato inválido!',
            'list_profissional_consulta.required' => 'O campo "Profissional" é obrigatório!',
            'profissional_id.required' => 'O campo "Profissional" é obrigatório!',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrecificacaoProcedimentoRequest extends FormRequest
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
                    'ds_procedimento' => 'required',
                    'atendimento_filial' => 'required',
                ];
                
                break;
        
            case 'DELETE':
                $rules = [
                    'atendimento_id' => 'required',
                ];
                
                break;
        
            default:
                $rules = [
                    'procedimento_id' => 'required',
                    'ds_procedimento' => 'required',
                    'vl_com_procedimento' => 'required',
                    'vl_net_procedimento' => 'required',
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
            'atendimento_filial.required' => 'O campo "Filial" é obrigatório!',
            'ds_procedimento.required' => 'O campo "Procedimento" é obrigatório!',
            'vl_com_procedimento.date_format' => 'O campo "Valor Comercial (R$)" está com um formato inválido!',
            'vl_net_procedimento.date_format' => 'O campo "Valor NET (R$)" está com um formato inválido!',
        ];
    }
}

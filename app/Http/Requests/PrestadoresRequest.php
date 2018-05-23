<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestadoresRequest extends FormRequest
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
            'te_documento'          => 'CNPJ',
            'nm_razao_social'       => 'Razão Social',
            'nm_fantasia'           => 'Nome Fantasia',
            'email'                 => 'E-mail da Empresa',
            'name_responsavel'      => 'Nome do Responsável',
            'telefone_responsavel'  => 'Telefone do Responsável',
            'cpf_responsavel'       => 'CPF do Responsável',
            'password'              => 'Senha',
        	'nr_latitude_gps'       => 'Latitude',
        	'nr_longitute_gps'      => 'Longitude',
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
                    'nm_razao_social'       => 'required|max:150',
                    'nm_fantasia'           => 'required|max:150',
                    'cd_cidade_ibge'        => 'required',
                    'tp_documento'          => 'required|max:5',
                    'te_documento'          => 'required|max:30|unique:documentos,te_documento,'.$this->cnpj_id,
                    'nr_cep'                => 'max:10|min:8',
                    'te_complemento'        => 'max:1000',
                    'email'                 => 'required|max:50|min:3|email|unique:users,email,'.$this->responsavel_user_id,
                    'password'              => 'required|string|min:6|confirmed',
                    'name_responsavel'      => 'required|max:50',
                    'cpf_responsavel'       => 'required|max:14|min:11|unique:responsavels,cpf,'.$this->responsavel_id,
                    'telefone_responsavel'  => 'required|max:20|unique:responsavels,telefone,'.$this->responsavel_id,
                    'nr_latitude_gps'       => 'required',
                    'nr_longitute_gps'      => 'required'
                ];
                break;
                
            default:
                $rules = [
                    'nm_razao_social'       => 'required|max:150',
                    'nm_fantasia'           => 'required|max:150',
                    //             'nm_primario'   => 'required|max:20|min:3',
                    //             'nm_secundario' => 'required|max:50',
                    //             'cs_sexo'       => 'required|max:1',
                    //             'nr_cnpj'       => 'required|cnpj',
                    //             'dt_nascimento' => 'required|max:10|date_format:"d/m/Y"',
                    'cd_cidade_ibge'        => 'required',
                    'tp_documento'          => 'required|max:5',
                    'te_documento'          => 'required|max:30|unique:documentos,te_documento',
                    'nr_cep'                => 'max:10|min:8',
                    'te_complemento'        => 'max:1000',
                    'email'                 => 'required|max:50|min:3|email|unique:users,email',
                    'password'              => 'required|string|min:6|confirmed',
                    'name_responsavel'      => 'required|max:50',
                    'cpf_responsavel'       => 'required|max:14|min:11|unique:responsavels,cpf',
                    'telefone_responsavel'  => 'required|max:20|unique:responsavels,telefone',
                    'nr_latitude_gps'       => 'required',
                    'nr_longitute_gps'      => 'required'
                ];
                break;
        }
        
        return $rules;
    }
}

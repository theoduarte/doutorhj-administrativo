<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
			'razao_social' 				=> 'Razão Social',
			'nome_fantasia' 			=> 'Nome Fantasia',
			'cnpj' 						=> 'CNPJ',
			'inscricao_estadual' 		=> 'Inscriçao Estadual',
			'vl_max_empresa' 			=> 'Valor Limite da Empresa',
			'vl_max_funcionario' 		=> 'Valor Limite do Funcionário',
			'anuidade' 					=> 'Anuidade',
			'desconto' 					=> 'Desconto',
			'tp_empresa_id' 			=> 'Tipo de Empresa',
			'matriz_id' 				=> 'Matriz',
			'nr_cep' 					=> 'CEP',
			'te_endereco' 				=> 'Endereço',
			'nr_logradouro' 			=> 'Número',
			'sg_logradouro' 			=> 'Logradouro',
			'te_bairro' 				=> 'Bairro',
			'te_complemento' 			=> 'Complemento',
			'cd_cidade_ibge' 			=> 'Cidade',
			'contato_financeiro' 		=> 'Contato Financeiro',
			'contato_administrativo'	=> 'Contato Administrativo',
			'logomarca'					=> 'Logomarca',
			'anuidades'					=> 'Anuidades',
			'anuidades.*.data_vigencia'	=> 'Vigencia',
			'anuidades.*.cs_status'		=> 'Status',
		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'anuidades.*.data_vigencia.required_if' => 'O campo :attribute é obrigatório quando o status é ativo.',
		];
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		if ($this->method() == 'PUT') {
			$logomarca_rule 			= 'image';
			$anuidades['1']				= 'array';
			$anuidades['vigencia']		= 'required_if:anuidades.*.cs_status,A';

		} else {
			// Create operation. There is no id yet.
			$logomarca_rule 			= 'required|image';
			$anuidades['1']				= 'array';
			$anuidades['vigencia']		= '';
		}
		return [
			'razao_social' 				=> 'required|string|max:250',
			'nome_fantasia' 			=> 'required|string|max:250',
			'cnpj' 						=> 'required|formato_cnpj|cnpj',
		  	'inscricao_estadual' 		=> 'required|string|max:20',
		  	'vl_max_empresa' 			=> 'required|money',
		  	'vl_max_funcionario' 		=> 'required|money',
		  	'anuidade' 					=> 'money|nullable',
		  	'desconto' 					=> 'money|nullable',
			'tp_empresa_id' 			=> 'required|integer|exists:tipo_empresas,id',
		  	'matriz_id' 				=> 'integer|nullable',
		  	'nr_cep' 					=> 'required|formato_cep',
			'te_endereco' 				=> 'required|string|max:250',
			'nr_logradouro' 			=> 'integer|nullable',
			'sg_logradouro' 			=> 'required|string|max:10',
			'te_bairro' 				=> 'required|string|max:250',
			'te_complemento' 			=> 'string|nullable',
			'cd_cidade_ibge' 			=> 'required|integer',
			'contato_financeiro' 		=> 'required|celular_com_ddd',
			'contato_administrativo'	=> 'required|celular_com_ddd',
			'logomarca'					=> $logomarca_rule,
			'anuidades'					=> $anuidades['1'],
			'anuidades.*.data_vigencia'	=> $anuidades['vigencia'],
		];
	}
}

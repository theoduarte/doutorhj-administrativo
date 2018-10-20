<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
    			'name'          			=> 'Nome',
    			'email'       				=> 'E-mail',
    			'password'           		=> 'Senha',
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
	    			'name'       => 'required|max:250',
	    			'email'      => 'required|max:250|min:3|email|unique:users,email,'.$this->user,
	    			'password'   => 'required|string|min:6|confirmed'
    			];
    			
    			break;
    	
    		default:
    			$rules = [
	    			'name'      => 'required|max:250',
	    			'email'     => 'required|max:250|min:3|email|unique:users,email',
	    			'password'  => 'required|string|min:6|confirmed'
    			];
    			
    			break;
    	}
    	
    	return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequisitosRequest extends FormRequest
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
            'titulo'       => 'Título'
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
                $id = $this->route('requisito');
                $rules = [
                    'titulo'   => 'required|unique:requisitos,titulo,'.$id,
                ];
                
                break;
                
            default:
                
                $rules = [
                    'titulo'   => 'required|unique:requisitos,titulo',
                ];
                
                break;
        }
        
        return $rules;
    }
}

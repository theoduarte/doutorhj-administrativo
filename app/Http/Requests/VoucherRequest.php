<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
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
        'titulo'            =>  'required|max:100|min:3',
        'cd_voucher'        =>  'required|max:20',
        'prazo_utilizacao'  =>  'required',
        'tp_voucher_id'     =>  'required',
        'plano_id'          =>  'required',
        'paciente_id'       =>  'required',
        'campanha_id'       =>  'required',
        ];
    }
}

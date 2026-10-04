<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Regime_residenciaRequest extends FormRequest
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

    public function rules()
    {
        return[
            'descricao_regime'=> 'required',
            

        ];
    }

    public function messages()
    {
        return [
            'required'=> 'Este campo é obrigatório'
    ];
    }
}

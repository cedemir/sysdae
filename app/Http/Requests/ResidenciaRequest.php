<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidenciaRequest extends FormRequest
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
            'matricula'=> 'required',
            'data_entrada'=> 'required',
            'data_saida'=> 'required',
            'regime_residencia_id'=> 'required',
            'apto_antigo'=> 'required',
            'apto_novo'=> 'required',
            'data_troca'=> 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'required'=> 'Este campo é obrigatório'
    ];
    }
}

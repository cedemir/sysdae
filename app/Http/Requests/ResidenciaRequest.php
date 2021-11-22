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
            'aluno_id'=> 'required',
            'data_entrada'=> 'required',
            'regime_residencia_id'=> 'required',
            'apto'=> 'required',
            'data_saida'=> 'nullable',
            'apto_antigo'=> 'nullable',
            'apto_novo'=> 'nullable',
            'data_troca'=> 'nullable'
            
        ];
    }

    public function messages()
    {
        return [
            'required'=> 'Este campo é obrigatório'
    ];
    }
}

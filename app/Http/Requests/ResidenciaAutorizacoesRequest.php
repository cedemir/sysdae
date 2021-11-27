<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidenciaAutorizacoesRequest extends FormRequest
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
            'aluno_id'=>'required',
            'autorizacao_parcial'=>'required',
            'data'=>'required',
            'justificativa'=>'required',
            'forma_autorizacao'=>'required', 
            'quem_autorizou'=>'required'

        ];

    
    }

    public function messages()
    {
        return [
            'required'=> 'Este campo é obrigatório'
    ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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
            'cpf'=> 'required',
            'nome'=> 'required',
            'sexo'=> 'required',
            'email'=> 'required',
            //'slug'=> 'required',
            'telefone'=> 'required',
            'nome_pai'=> 'required',
            'telefone_pai'=> 'required',
            'nome_mae'=> 'required',
            'telefone_mae'=> 'required',
            'contato_emergencia'=> 'required',
            'municipio'=> 'required',
            'beneficio_id'=> 'required',
            'situacao_id'=> 'required',
            'observacoes'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'=> 'Este campo é obrigatório'
    ];
    }
}
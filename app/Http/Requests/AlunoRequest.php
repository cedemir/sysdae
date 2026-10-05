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
     * Grava o CPF só com números (a coluna tem 11 caracteres).
     */
    protected function prepareForValidation()
    {
        if ($this->filled('cpf')) {
            $this->merge(['cpf' => preg_replace('/\D/', '', $this->input('cpf'))]);
        }
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
            'sexo_id'=> 'required',
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
            'observacoes'=> 'required',
            'foto'=> 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'required'=> 'Este campo é obrigatório',
            'foto.image'=> 'O arquivo deve ser uma imagem',
            'foto.mimes'=> 'A foto deve ser JPG, PNG ou WEBP',
            'foto.max'=> 'A foto deve ter no máximo 2 MB'
    ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OcorrenciaRequest extends FormRequest
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
            
            'alunos_envolvidos' =>'required',
            'data_ocorrencia' =>'required',
            'descricao_ocorrencia' =>'required',
            'data_reuniao_conselho_disciplinar' =>'required',
            'medidas' =>'required',
            'total_horas_recebidas' =>'required','numeric'
        ];
    }

    public function messages()
    {
        return [
            'required'=> 'Este campo é obrigatório',
            'date'=> 'A data não é uma data válida'
            
    ];
    }
}

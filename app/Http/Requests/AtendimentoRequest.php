<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtendimentoRequest extends FormRequest
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
            //$location->locacao_dt->format('d/m/Y H:i:s')
            //'data'=>'date_format:d/m/Y|required',
            'data'=>'required',
            'hora'=>'required',	
            'user_id'=>'required',
            'relato_atendimento'=>'required',
            'outras_observacoes'=>'required',	
            'historia_de_vida'=>'required',
            'encaminhamentos'=>'required'
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

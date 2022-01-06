<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OcorrenciasAtividadesOrientadasRequest extends FormRequest
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
            
                'ocorrencia_id'=> 'required',
                'setor_id'=> 'required',
                'aluno_id'=> 'required',
                'user_id'=> 'required',
                'servidor'=> 'required',
                'nro_horas'=> 'required'
            

        ];
    }

    public function messages()
    {
        return [
            'required'=> 'Este campo é obrigatório'
    ];
    }
}

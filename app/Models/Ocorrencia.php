<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;
    //id 	
    protected $table='ocorrencia';
    protected $fillable=[
    'aluno_id',
    'data_ocorrencia',
    'descricao_ocorrencia',	
    'data_reuniao_conselho_disciplinar',
    'medidas',
    'total_horas_recebidas'
    ];
    protected $dates=['data_ocorrencia', 'data_reuniao_conselho_disciplinar'];

    //public function medidas_disciplinares(){
    //    return $this->hasMany(Ocorrencias::class);
    //    }
}

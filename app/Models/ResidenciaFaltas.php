<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenciaFaltas extends Model
{
    use HasFactory;


    protected $table='residencia_faltas';
    protected $fillable=[
        'aluno_id', 
        'data_falta',
        'motivo'
    ];
    protected $dates=['data_falta'];

    public function setDataAttribute($value){
        $this->attributes['data_falta']=(\DateTime::createFromFormat('d/m/Y',$value))->format('Y-m-d');
    }
    public function aluno(){
    return $this->hasMany(Aluno::class); //id_matricula
}
}


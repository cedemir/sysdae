<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;
    
    protected $table='atendimento';
    protected $fillable=[
    
    'data',
    'hora', 	
    'aluno_id',
    'user_id',
    'atendimento_id',
    'relato_atendimento',
    'outras_observacoes', 	
    'historia_de_vida',
    'encaminhamentos'
];

protected $dates=['data'];

public function setDataAttribute($value){
  $this->attributes['data']=(\DateTime::createFromFormat('d/m/Y',$value))->format('Y-m-d');
}


public function forma_atendimento(){
  return $this->hasOne(Forma_atendimento::class); //forma de atendimento
}

public function users(){
  return $this->hasOne(Users::class); //user_id
}

public function alunos(){
  return $this->hasMany(Aluno::class); //aluno_id
}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    //id 	matricula 	id_turma 	ano 	id_curso 

    protected $table='matricula';
    protected $fillable=[
    'matricula',
    'aluno_id',
    'turma_id',
    'serie_id',
    'ano',
    'curso_id'

];

public function aluno(){
    return $this->hasMany(Aluno::class); //id_aluno
    
}

public function turma(){
    return $this->hasMany(Turma::class); //id_turma
        
}

public function curso(){
    return $this->hasOne(Curso::class); //id_curso
    
}


public function serie(){
    return $this->hasMany(Serie::class); //id_serie
    
}

}

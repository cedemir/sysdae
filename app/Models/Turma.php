<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table='turma';
    protected $fillable=['descricao_turma'];

     public function  matricula(){
    return $this->belongsTo(Matricula::class);  
}
}

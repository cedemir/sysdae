<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia_autorizacoes extends Model
{
    use HasFactory;

    protected $table='residencia_autorizacoes';
    protected $fillable=['matricula','autoricacao_parcial','data','justificativa', 'forma_autorizacao', 'quem_autorizou'];
    protected $dates=['data'];

     public function matricula(){
    return $this->hasMany(Matricula::class); //id_matricula
}   
}

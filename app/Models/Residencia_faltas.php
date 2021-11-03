<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia_faltas extends Model
{
    use HasFactory;


    protected $table='residencia_faltas';
    protected $fillable=['matricula', 'data_falta'];
    protected $dates=['data_falta'];

    
    public function matricula(){
    return $this->hasMany(Matricula::class); //id_matricula
}
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    //id 	descricao_curso
    
    protected $table='curso';
    protected $fillable=[
    
    'descricao_curso'
    
];



public function matricula(){
    return $this->belongsTo(Matricula::class);    
}
}

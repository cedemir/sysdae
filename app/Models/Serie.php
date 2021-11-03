<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;


    protected $table='serie';
    protected $fillable=['descricao_serie'];

     public function  matricula(){
    return $this->belongsTo(Matricula::class);  
}  
}

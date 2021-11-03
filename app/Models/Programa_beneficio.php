<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa_beneficio extends Model
{
    use HasFactory;
    // id 	descricao_beneficio

    protected $table='programa_beneficio';
    protected $fillable=[
    
    'descricao_beneficio'
    
    ];

    public function programa_beneficio(){
    return $this->belongsTo(Aluno::class);    

}
}

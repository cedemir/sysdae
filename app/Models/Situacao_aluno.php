<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacao_aluno extends Model
{
    use HasFactory;
    
    protected $table='situacao_aluno';
    protected $fillable=['descricao_situacao'];

     public function  aluno(){
    return $this->belongsTo(Aluno::class);    
}

}

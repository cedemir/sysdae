<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenciaAutorizacoes extends Model
{
    use HasFactory;

    protected $table='residencia_autorizacoes';
    protected $fillable=[
    'aluno_id',
    'autorizacao_parcial',
    'data',
    'justificativa',
    'forma_autorizacao', 
    'quem_autorizou'];


    protected $dates=['data'];

    public function setDataAttribute($value){
        $this->attributes['data']=(\DateTime::createFromFormat('d/m/Y',$value))->format('Y-m-d');
    }
      
    public function aluno(){
    return $this->hasMany(Aluno::class); //aluno_id
    }   
}

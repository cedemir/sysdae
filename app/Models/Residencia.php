<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    use HasFactory;
    // matricula 	residencia_id 	armario_antigo 	armario_novo 	data_troca 
    protected $table='residencia';
    protected $fillable=[
    'aluno_id',
    'data_entrada',
    'data_saida',  
    'regime_residencia_id',
    'apto',
    'apto_antigo', 
    'apto_novo', 
    'data_troca'
];

    protected $dates=['data_entrada','data_saida','data_troca'];

    public function setDataAttribute($value){
        $this->attributes['data_entrada']=(\DateTime::createFromFormat('d/m/Y',$value))->format('Y-m-d');
        $this->attributes['data_saida']=(\DateTime::createFromFormat('d/m/Y',$value))->format('Y-m-d');
        $this->attributes['data_troca']=(\DateTime::createFromFormat('d/m/Y',$value))->format('Y-m-d');
      }
     public function regimes_residencia(){
        return $this->hasOne(Regime_residencia::class); //id_foto
} 	
    public function alunos(){
        return $this->hasMany(Aluno::class);
    }    
}


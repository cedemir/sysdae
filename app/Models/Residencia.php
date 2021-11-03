<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residencia extends Model
{
    use HasFactory;
    // matricula 	residencia_id 	armario_antigo 	armario_novo 	data_troca 
    protected $table='residencia';
    protected $fillable=['matricula',
    //'residencia_id',
    'apto_antigo', 
    'apto_novo', 
    'data_entrada',
    'data_saida',
    'regime_residencia_id',
    'data_troca'];

    protected $dates=['data_troca','data_entrada','data_saida'];


     public function regimes_residencia(){
    return $this->hasOne(Regimes_residencia::class); //id_foto
} 	
    
}


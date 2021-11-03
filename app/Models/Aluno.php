<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $table='aluno';
    protected $fillable=[
  'cpf',
  'nome',
  'sexo',
  'email', 
  'slug',
  'telefone', 
  'nome_pai',
  'telefone_pai',
  'nome_mae',
  'telefone_mae',
  'contato_emergencia',
  'municipio' ,
  'beneficio_id',
  'situacao_id',
  'observacoes'
];

public function fotos()
    {
        return $this->hasMany(Foto::class); //id_foto
    }

    

public function programa_beneficio(){
  return $this->hasOne(Programa_beneficio::class); //id_programa_beneficio
}

public function situacao(){
  return $this->hasOne(Situacao::class); //id_situacao
}


} 

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencias_atividades_orientadas extends Model
{
    use HasFactory;

    protected $table='ocorrencias_atividades_orientadas';
    protected $fillable=[
    'ocorrencia_id',
    'aluno_id',
    'user_id',
    'setor_id',
    'data',
    'descricao_atividade',
    'nro_horas'];

    protected $dates=['data'];

    public function ocorrencias(){
    return $this->hasMany(Ocorrencias::class);
    }

    public function setor(){
        return $this->hasMany(Setor::class);
        }

    public function aluno(){
        return $this->ManyToMany(Aluno::class);
    }

    public function user(){
        return $this->ManyToMany(User::class);
    }


}

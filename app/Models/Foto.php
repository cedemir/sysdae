<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $table='foto';
    protected $fillable=['aluno_id','foto'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class); //aluno_id
    }
}

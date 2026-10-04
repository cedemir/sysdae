<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table='perfil';
    use HasFactory;

    protected $fillable=['sobre','fone','redes_sociais'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medidas_disciplinares extends Model
{
    use HasFactory;
    // id 	medida_disciplinar 	

    protected $table='medidas_disciplinares';
    protected $fillable=['medida_disciplinar'];

    public function ocorrencias(){
    return $this->belongsTo(Ocorrencia::class);    
}
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forma_atendimento extends Model
{
    use HasFactory;

    //id 	forma_atendimento 	


    protected $table='forma_atendimento';
    protected $fillable=[
    
    'forma_atendimento'
    
];



public function atendimento(){
    return $this->belongsTo(Atendimento::class);    
}
}

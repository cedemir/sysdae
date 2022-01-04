<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Alojamento extends Model
{
    use HasFactory;
    protected $table='alojamento';
    protected $fillable=[

    'descricao_alojamento',
    'nro_aptos',
    'user_id'	
    
];


public function apartamento(){
    return $this->belongsTo(Apartamento::class);    
}

public function user(){
    return $this->hasOne(User::class); //user_id
  }

}

 

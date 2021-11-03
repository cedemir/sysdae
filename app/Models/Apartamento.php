<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model

{
    use HasFactory;
    protected $table='apartamento';
    protected $fillable=[
    'descricao_apartamento',
    'alojamento_id'
];


      // id 	descricao_apartamento 	id_alojamento  


public function alojamento(){
    return $this->hasMany(Alojamento::class);
}
}
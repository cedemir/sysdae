<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ata extends Model
{
    use HasFactory;
    protected $table='ata';
    protected $fillable=[


    'nro_ata',
 	'data_ata',
 	'descricao_ata'
];
    protected $dates=['data_ata'];

}

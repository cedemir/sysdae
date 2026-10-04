<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semirresidentes extends Model
{
    use HasFactory;
    protected $table='semirresidentes';
    protected $fillable=[
  'TotalSemiResidentes',
  
];



} 

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regime_residencia extends Model
{
    use HasFactory;

     protected $table='regimes_residencia';
    protected $fillable=['descricao_regime'];

    //protected $fillable=['matricula', 'residencia_id', 'armario_antigo','armario_novo', 'data_troca'];

    public function residencia(){
    return $this->belongsTo(Residencia::class);    

}
}

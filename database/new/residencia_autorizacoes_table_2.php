<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenciaAutorizacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencia_autorizacoes', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('matricula');
           $table->boolean('autoricacao_parcial');
           $table->date('data');
           $table->string('justificativa');
           $table->string('forma_autorizacao');
           $table->string('quem_autorizou');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residencia_autorizacoes');
    }
}

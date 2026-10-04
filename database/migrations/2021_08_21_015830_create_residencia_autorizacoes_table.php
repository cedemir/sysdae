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
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->string('autorizacao_parcial', 1);
            $table->date('data');
            $table->text('justificativa');
            $table->string('forma_autorizacao');
            $table->string('quem_autorizou');
            $table->timestamps();

            $table->foreign('aluno_id', 'residencia_autorizacoes_aluno_id')->references('id')->on('aluno')->onDelete('cascade');
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

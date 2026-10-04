<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matricula');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('serie_id');
            $table->unsignedBigInteger('turma_id');
            $table->integer('ano');
            $table->unsignedBigInteger('curso_id');
            $table->timestamps();

            $table->foreign('aluno_id', 'matricula_id_aluno_foreign')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('serie_id', 'matricula_id_serie_foreign')->references('id')->on('serie')->onDelete('cascade');
            $table->foreign('turma_id', 'matricula_id_turma_foreign')->references('id')->on('turma')->onDelete('cascade');
            $table->foreign('curso_id', 'matricula_id_curso_foreign')->references('id')->on('curso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matricula');
    }
}

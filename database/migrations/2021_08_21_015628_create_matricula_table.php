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
            $table->bigIncrements('id');
            $table->integer('matricula');
            $table->foreignId('id_aluno')->constrained('aluno')->cascadeOnDelete();

            //$table->integer('id_turma');
            $table->foreignId('id_serie')->constrained('serie')->cascadeOnDelete();
            $table->foreignId('id_turma')->constrained('turma')->cascadeOnDelete();
            $table->integer('ano');
            //$table->integer('id_curso');
            $table->foreignId('id_curso')->constrained('curso')->cascadeOnDelete();
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
        Schema::dropIfExists('matricula');
    }
}

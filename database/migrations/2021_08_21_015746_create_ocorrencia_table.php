<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->date('data_ocorrencia');
            $table->text('descricao_ocorrencia');
            $table->date('data_reuniao_conselho_disciplinar');
            $table->text('medidas');
            $table->integer('total_horas_recebidas');
            $table->timestamps();

            $table->foreign('aluno_id', 'ocorrencia_aluno_id')->references('id')->on('aluno')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencia');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciasAtividadesOrientadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias_atividades_orientadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ocorrencia_id');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('setor_id');
            $table->text('descricao_atividade');
            $table->date('data');
            $table->integer('nro_horas');
            $table->timestamps();

            $table->foreign('aluno_id', 'ocorrencias_aluno_id')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('ocorrencia_id', 'ocorrencias_atividades_orientadas_id_ocorrencia_foreign')->references('id')->on('ocorrencia')->onDelete('cascade');
            $table->foreign('setor_id', 'ocorrencias_atividades_orientadas_id_setor_foreign')->references('id')->on('setor')->onDelete('cascade');
            $table->foreign('user_id', 'ocorrencias_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencias_atividades_orientadas');
    }
}

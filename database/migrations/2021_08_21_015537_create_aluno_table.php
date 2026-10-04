<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->id();
            $table->string('cpf', 11);
            $table->string('nome', 50);
            $table->unsignedBigInteger('sexo_id');
            $table->string('email');
            $table->string('slug');
            $table->string('telefone');
            $table->string('nome_pai', 50);
            $table->string('telefone_pai');
            $table->string('nome_mae', 50);
            $table->string('telefone_mae');
            $table->string('contato_emergencia');
            $table->string('municipio', 50);
            $table->unsignedBigInteger('beneficio_id');
            $table->unsignedBigInteger('situacao_id');
            $table->text('observacoes');
            $table->timestamps();

            $table->foreign('beneficio_id', 'aluno_programa_beneficio_id_foreign')->references('id')->on('programa_beneficio')->onDelete('cascade');
            $table->foreign('situacao_id', 'aluno_situacao_id_foreign')->references('id')->on('situacao_aluno')->onDelete('cascade');
            $table->foreign('sexo_id', 'aluno_sexo_id_foreign')->references('id')->on('sexo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}

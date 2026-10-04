<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('hora');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('atendimento_id');
            $table->text('relato_atendimento');
            $table->text('outras_observacoes');
            $table->text('historia_de_vida');
            $table->text('encaminhamentos');
            $table->timestamps();

            $table->foreign('aluno_id', 'atendimento_aluno_id')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('atendimento_id', 'atendimento_id_forma_atendimento_foreign')->references('id')->on('forma_atendimento')->onDelete('cascade');
            $table->foreign('user_id', 'atendimento_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimento');
    }
}

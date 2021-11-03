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
            $table->bigIncrements('id');
            $table->date('data');
            $table->time('hora');
            $table->string('servidores_responsaveis');
            $table->foreignId('id_forma_atendimento')->constrained('forma_atendimento')->cascadeOnDelete();
            $table->text('relato_atendimento');
            $table->text('outras_observacoes ');
            $table->text('historia_de_vida');
            $table->text('encaminhamentos ');
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
        Schema::dropIfExists('atendimento');
    }
}

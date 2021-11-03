<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcompanhamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento', function (Blueprint $table) {
            //$table->id();
            //$table->increments('cod_anotacao');
            $table->bigIncrements('id');
            
            $table->date('data_atendimento');
            $table->time('hora', $precision = 0);
            $table->string('servidores_responsaveis');
            //$table->integer('id_forma_atendimento');
            $table->foreignId('id_forma_atendimento')->constrained('forma_atendimento')->cascadeOnDelete();
            $table->text('relato_atendimento');
            $table->text('outras_observacoes');
            $table->text('historia_de_vida');
            $table->string('encaminhamentos');
            


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
        Schema::dropIfExists('acompanhamento');
    }
}

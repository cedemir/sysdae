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
            $table->bigIncrements('id');
            //$table->integer('id_ocorrencia');
            $table->foreignId('id_ocorrencia')->constrained('ocorrencia')->cascadeOnDelete();
            //$table->integer('id_setor');
            $table->foreignId('id_setor')->constrained('setor')->cascadeOnDelete();
            $table->string('servidor');
            $table->integer('nro_horas');

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
        Schema::dropIfExists('ocorrencias_atividades_orientadas');
    }
}

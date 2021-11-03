<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricula');
            //$table->integer('id_apto');
             // $table->foreignId('id_apto')->constrained('apartamento')->cascadeOnDelete();
            $table->string('armario');
            $table->string('armario_novo');
            $table->date('data_troca');
            //$table->date('data_falta');// rever esse campo. fazer como id_matricula, data_falta em outra tabela
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
        Schema::dropIfExists('residencia');
    }
}
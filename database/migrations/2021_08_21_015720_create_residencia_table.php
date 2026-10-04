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
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->date('data_entrada');
            $table->date('data_saida')->nullable();
            $table->unsignedBigInteger('regime_residencia_id');
            $table->string('apto', 50);
            $table->string('apto_antigo', 50)->nullable();
            $table->string('apto_novo', 50)->nullable();
            $table->date('data_troca')->nullable();
            $table->timestamps();

            $table->foreign('aluno_id', 'residencia_aluno_id_foreign')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('regime_residencia_id', 'residencia_residencia_id_foreign')->references('id')->on('regimes_residencia')->onDelete('cascade');
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

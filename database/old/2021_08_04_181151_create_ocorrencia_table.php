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
            $table->bigIncrements('id');
            $table->string('alunos_envolvidos');
            $table->date('data_ocorrencia');
            $table->text('descricao_ocorrencia');
            $table->date('data_reuniao_conselho_disciplinar');
            //$table->unsignedBigInteger('id_medidas');
            //$table->integer('id_medidas');
            $table->foreignId('id_medidas')->constrained('medidas_disciplinares')->cascadeOnDelete();
            $table->integer('total_horas_recebidas');
            
            
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
        Schema::dropIfExists('ocorrencia');
    }
}

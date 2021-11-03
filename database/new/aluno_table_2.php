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
            $table->bigIncrements('id');
            $table->string('cpf', 11);
            $table->string('nome', 50);
            $table->string('foto', 255);
            $table->string('sexo',1);
            $table->string('matricula', 255);
            $table->string('email', 255);
            $table->string('telefone', 255);
            $table->string('nome_pai', 50);
            $table->string('telefone_pai', 255);
            $table->string('nome_mae', 50);
            $table->string('telefone_mae', 255);
            $table->string('contato_emergencia', 255);
            $table->string('municipio', 50);
            $table->foreignId('programa_beneficio_id')->constrained('programa_beneficio')->cascadeOnDelete();        
            $table->foreignId('situacao_id')->constrained('situacao_aluno')->cascadeOnDelete();  
           // $table->integer('id_programa_benefício');
            //$table->integer('id_situacao');
            $table->text('observacoes');
        
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
        Schema::dropIfExists('aluno');
    }
}

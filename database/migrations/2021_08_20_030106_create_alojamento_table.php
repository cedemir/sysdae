<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlojamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alojamento', function (Blueprint $table) {
            $table->id();
            $table->string('descricao_alojamento', 100);
            $table->integer('nro_aptos');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id', 'alojamento_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alojamento');
    }
}

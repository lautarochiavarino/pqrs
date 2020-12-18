<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pqrs_id');
            $table->integer('user_id');
            $table->string('nuevaGestion', 3000);
            $table->string('adjuntarSoporteGestion', 100)->nullable();
            $table->string('nuevoTiempoRespuesta', 100)->nullable()->default(10);;
            $table->text('respuestaPreliminar')->nullable();
            $table->string('adjuntarSoportePreliminar', 100)->nullable();
            $table->text('respuestaFinal')->nullable();
            $table->string('consecutivoCorrespondencia', 100)->nullable();
            $table->string('adjuntarSoporteFinal', 100)->nullable();
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
        Schema::dropIfExists('respuesta');
    }
}

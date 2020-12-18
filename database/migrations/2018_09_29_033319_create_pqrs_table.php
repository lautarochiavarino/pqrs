<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePqrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pqrs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('aSuNombre', 2);
            $table->string('formatoRecepcion', 30);
            $table->string('tipoSolicitud', 30);
            $table->string('tipoSolicitante_id',100);
            $table->string('medioRespuesta', 30);
            $table->string('breveDescripcion', 150);
            $table->string('descripcion', 3000);
            $table->string('adjuntarSoporte', 100)->nullable();
            $table->tinyInteger('estado')->default(0);
            $table->timestamp('cerrado');
            $table->integer('contacto_id');
            $table->integer('grupo_id')->default(0);
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
        Schema::dropIfExists('pqrs');
    }
}

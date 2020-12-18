<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipoContacto','150')->nullable();
            $table->string('entidad', 100)->nullable();
            $table->string('contacto', 100);
            $table->string('cargo', 100)->nullable();
            $table->integer('pais_id');
            $table->integer('provincia_id');
            $table->string('ciudad','100')->nullable();
            $table->string('direccionFisica', 200);
            $table->string('cp', 100)->nullable();
            $table->string('email', 100);
            $table->string('telFijo1', 100)->nullable();
            $table->string('telFijo2', 100)->nullable();
            $table->string('telCelular', 100)->nullable();
            $table->string('fax', 100)->nullable();
            $table->string('proposito', 100)->nullable();
            $table->string('datosAdicionales', 500)->nullable();
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
        Schema::dropIfExists('contacto');
    }
}

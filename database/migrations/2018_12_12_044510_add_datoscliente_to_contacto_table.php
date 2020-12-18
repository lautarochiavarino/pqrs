<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatosclienteToContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacto', function (Blueprint $table) {
            $table->string('razonSocial','150')->nullable();
            $table->string('tipoTramite','150')->nullable();
            $table->string('causal','150')->nullable();
            $table->string('detalleCausal','150')->nullable();
            $table->string('codigoSic','100')->nullable();
            $table->string('nroFactura','150')->nullable();
            $table->date('fechaEvento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacto', function (Blueprint $table) {
            //
        });
    }
}

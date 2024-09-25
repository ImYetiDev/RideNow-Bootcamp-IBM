<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquileresTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('bicicleta_id');
            $table->unsignedBigInteger('estacion_inicio_id')->nullable();
            $table->unsignedBigInteger('estacion_fin_id')->nullable();
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();
            $table->string('estado')->default('pendiente');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('bicicleta_id')->references('id')->on('bicicletas')->onDelete('cascade');
            $table->foreign('estacion_inicio_id')->references('id')->on('estaciones')->onDelete('set null');
            $table->foreign('estacion_fin_id')->references('id')->on('estaciones')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('alquileres');
    }
}

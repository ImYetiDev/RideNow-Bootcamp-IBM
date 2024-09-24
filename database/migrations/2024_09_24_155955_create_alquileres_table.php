<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquileresTable extends Migration
{
    public function up()
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('bicicleta_id');
            $table->unsignedBigInteger('estacion_inicio_id');
            $table->unsignedBigInteger('estacion_fin_id')->nullable();
            $table->timestamp('fecha_inicio')->useCurrent();
            $table->timestamp('fecha_fin')->nullable();
            $table->enum('estado', ['en curso', 'completado', 'cancelado'])->default('en curso');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('bicicleta_id')->references('id')->on('bicicletas')->onDelete('cascade');
            $table->foreign('estacion_inicio_id')->references('id')->on('estaciones')->onDelete('cascade');
            $table->foreign('estacion_fin_id')->references('id')->on('estaciones')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alquileres');
    }
}

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstacionesTable extends Migration
{
    public function up()
    {
        Schema::create('estaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_estacion', 100);
            $table->string('direccion', 255);
            $table->decimal('latitud', 10, 8);
            $table->decimal('longitud', 11, 8);
            $table->integer('capacidad'); // Cantidad máxima de bicicletas
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estaciones');
    }
}

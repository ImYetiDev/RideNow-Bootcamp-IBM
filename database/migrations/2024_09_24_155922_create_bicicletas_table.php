<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBicicletasTable extends Migration
{
    public function up()
    {
        Schema::create('bicicletas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 50)->unique();
            $table->string('modelo', 100);
            $table->enum('estado', ['disponible', 'en uso', 'mantenimiento'])->default('disponible');
            $table->string('ubicacion_actual')->nullable(); // Coordenadas o estación
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bicicletas');
    }
}


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
            $table->string('marca', 50)->unique();
            $table->string('color', 50);
            $table->integer('estado')->default(1); // 1 = Disponible, 0 = No disponible
            $table->integer('precio');
            $table->string('ubicacion_actual')->nullable(); // Coordenadas o estación
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bicicletas');
    }
}


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
            $table->string('marca', 50);
            $table->string('color', 50);
            $table->integer('estado')->default(1);  // 1 = Disponible, 0 = No disponible
            $table->integer('precio');
            $table->unsignedBigInteger('region_id');  // Llave foránea
            $table->string('ubicacion_actual')->nullable();  // Coordenadas o estación
            $table->timestamps();

            // Definir la clave foránea con la tabla 'regionales'
            $table->foreign('region_id')->references('id')->on('regionales')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bicicletas');
    }
}

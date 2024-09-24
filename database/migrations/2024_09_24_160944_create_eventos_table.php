<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->text('descripcion')->nullable();
            $table->date('fecha');
            $table->string('ubicacion', 255);
            $table->unsignedBigInteger('organizador_id'); // Usuario que crea el evento (generalmente un administrador)
            $table->timestamps();

            $table->foreign('organizador_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGananciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ganancias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id'); // ID del usuario que pagó
            $table->decimal('monto', 8, 2); // El monto pagado por el alquiler
            $table->timestamps();

            // Relación con la tabla usuarios
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ganancias');
    }
}

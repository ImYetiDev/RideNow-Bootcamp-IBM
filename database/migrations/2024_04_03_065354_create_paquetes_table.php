<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('destinatario', 100);
            $table->unsignedBigInteger('vivienda_id'); // Debes agregar esta línea para crear la columna
            $table->foreign('vivienda_id')->references('id')->on('viviendas');
            $table->string('recibido_por', 100);
            $table->string('entregado_a', 100);
            $table->boolean('estado')->default(true);
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquetes');
    }
};

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientoTable extends Migration
{
    public function up()
    {
        Schema::create('mantenimiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bicicleta_id');
            $table->text('descripcion')->nullable();
            $table->timestamp('fecha')->useCurrent();
            $table->timestamps();

            $table->foreign('bicicleta_id')->references('id')->on('bicicletas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mantenimiento');
    }
}


<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipacionesTable extends Migration
{
    public function up()
    {
        Schema::create('participaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');

            $table->unique(['evento_id', 'usuario_id']); // Evita que un usuario se registre dos veces en el mismo evento
        });
    }

    public function down()
    {
        Schema::dropIfExists('participaciones');
    }
}

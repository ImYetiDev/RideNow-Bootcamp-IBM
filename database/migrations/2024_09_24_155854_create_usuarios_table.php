<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->integer('tipo_usuario')->unsigned();
            $table->string('estrato', 1)->nullable();
            $table->boolean('estado')->default(true); // Eliminación lógica
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}

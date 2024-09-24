<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionalesTable extends Migration
{
    public function up()
    {
        Schema::create('regionales', function (Blueprint $table) {
            $table->id();  // Esto crea un campo 'id' unsignedBigInteger automáticamente
            $table->string('nombre', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('regionales');
    }
}

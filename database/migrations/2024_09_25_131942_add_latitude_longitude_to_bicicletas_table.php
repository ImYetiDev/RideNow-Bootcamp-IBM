<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatitudeLongitudeToBicicletasTable extends Migration
{
    public function up()
    {
        Schema::table('bicicletas', function (Blueprint $table) {
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
        });
    }

    public function down()
    {
        Schema::table('bicicletas', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
}

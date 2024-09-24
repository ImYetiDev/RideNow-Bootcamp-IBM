<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regionales', function (Blueprint $table) {
            $table->id();  // AUTO_INCREMENT PRIMARY KEY
            $table->string('nombre', 100);  // VARCHAR(100) NOT NULL
            $table->timestamps();  // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regionales');
    }
}

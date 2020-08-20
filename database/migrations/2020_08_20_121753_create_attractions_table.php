<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attractions', function (Blueprint $table) {
            $table->id(); // 1
            $table->string('name'); // Skagens Odde
            $table->string('url_gmap'); // https://www.google.com/maps/place/The+Skaw
            $table->decimal('lat', 10, 8); // 57.666665
            $table->decimal('lng', 11, 8); // 10.3991572
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attractions');
    }
}

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
            $table->longText('description'); // Skagen Odde, also Skagens Odde, sometimes known in English as the Scaw Spit or The Skaw...
            $table->string('url_gmap'); // https://www.google.com/maps/place/The+Skaw
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

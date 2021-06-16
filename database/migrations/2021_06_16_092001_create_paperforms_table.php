<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paperforms', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas', 255);
            $table->string('url', 255);
            $table->string('paperform_code', 255);
            $table->string('puslapis', 255);
            $table->string('vardas', 255);
            $table->string('tel', 255);
            $table->string('el_pastas', 255);
            $table->string('uzklausa', 255);
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
        Schema::dropIfExists('paperforms');
    }
}

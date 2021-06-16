<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUzklausosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uzklausos', function (Blueprint $table) {
            $table->id();
            $table->text('puslapis');
            $table->string('vardas', 255);
            $table->string('tel', 255);
            $table->string('el_pastas', 255);
            $table->string('uzklausa');
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
        Schema::dropIfExists('uzklausos');
    }
}

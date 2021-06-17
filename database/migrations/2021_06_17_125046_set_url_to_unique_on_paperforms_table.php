<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetUrlToUniqueOnPaperformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('unique_on_paperforms', function (Blueprint $table) {
            Schema::table('paperforms', function($table) {
                $table->unique('url', 'paperforms_url_unique');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('unique_on_paperforms', function (Blueprint $table) {
            $table->dropUnique('paperforms_url_unique');
        });
    }
}

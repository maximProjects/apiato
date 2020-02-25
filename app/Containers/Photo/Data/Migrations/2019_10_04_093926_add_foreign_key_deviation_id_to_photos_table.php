<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyDeviationIdToPhotosTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {

            $table->integer('deviation_id')->unsigned()->index()->nullable();
            $table->foreign('deviation_id')->references('id')->on('deviations');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign(['deviation_id']);
            $table->dropColumn('deviation_id');
        });
    }
}

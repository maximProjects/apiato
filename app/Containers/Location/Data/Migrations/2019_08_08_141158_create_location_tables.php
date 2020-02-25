<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLocationTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {

            $table->increments('id');
            $table->morphs('location');
            $table->integer('address_id')->unsigned()->index()->nullable();
            $table->foreign('address_id')->nullable()->references('id')->on('addresses')->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfirmationTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('confirmations', function (Blueprint $table) {

            $table->increments('id');
            $table->morphs('confirmationable');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->integer('media_id')->unsigned()->index()->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('set null');
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('confirmations');
    }
}

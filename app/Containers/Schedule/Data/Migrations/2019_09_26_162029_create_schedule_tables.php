<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScheduleTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('scheduleable_id')->unsigned()->index()->nullable();
            $table->string('scheduleable_type')->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->dateTime('duration')->nullable();
            $table->integer('free_days')->nullable();
            $table->integer('hours')->nullable();

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}

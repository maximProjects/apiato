<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTimerTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('timers', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('time_registry_id')->unsigned()->index()->nullable();
            $table->foreign('time_registry_id')->references('id')->on('time_registry')->nullable();

            $table->integer('task_id')->unsigned()->index()->nullable();
            $table->foreign('task_id')->references('id')->on('tasks')->nullable();

            $table->integer('state_id')->unsigned()->nullable();

            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();

            $table->integer('total_time')->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('timers');
    }
}

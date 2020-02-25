<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkincapacityTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('incapacities', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('type_id')->unsigned()->index()->nullable();
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();

            $table->text('comment')->nullable();
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('incapacities');
    }
}

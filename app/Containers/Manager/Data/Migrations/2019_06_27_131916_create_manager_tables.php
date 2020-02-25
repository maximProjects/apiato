<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManagerTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->unsigned()->unique()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('managers');
    }
}

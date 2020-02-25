<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskUsersTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('task_users', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('task_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('type')->nullable();
            $table->foreign('task_id')->nullable()->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('task_users');
    }
}

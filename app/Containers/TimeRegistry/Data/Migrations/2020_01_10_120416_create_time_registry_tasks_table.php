<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTimeRegistryTasksTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('time_registry_tasks', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('time_registry_id')->unsigned()->index()->nullable();
            $table->foreign('time_registry_id')->nullable()->references('id')->on('time_registry')->onDelete('cascade');
            $table->integer('task_id')->unsigned()->index()->nullable();
            $table->foreign('task_id')->nullable()->references('id')->on('tasks')->onDelete('cascade');
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('time_registry_tasks');
    }
}

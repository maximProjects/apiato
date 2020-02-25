<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskJobTypes extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('task_job_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned()->index()->nullable();
            $table->integer('job_type_id')->unsigned()->index()->nullable();
            $table->dateTime('duration')->nullable();
            $table->float('qnt', 8, 2)->nullable();
            $table->foreign('task_id')->nullable()->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('job_type_id')->nullable()->references('id')->on('job_types')->onDelete('cascade');
            $table->boolean('use_checklist')->default(0);
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('task_job_types');
    }
}

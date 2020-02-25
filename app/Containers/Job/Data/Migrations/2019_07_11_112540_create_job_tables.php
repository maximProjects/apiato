<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('time_registry_id')->unsigned()->index()->nullable();
            $table->foreign('time_registry_id')->references('id')->on('time_registry')->nullable();

            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->nullable();

            $table->integer('project_group_id')->unsigned()->index()->nullable();
            $table->foreign('project_group_id')->references('id')->on('project_groups')->nullable();

           $table->integer('task_id')->unsigned()->index()->nullable();
           $table->foreign('task_id')->references('id')->on('tasks')->nullable();

          $table->boolean('is_template')->default(1);

           $table->integer('state_id')->unsigned()->nullable();

            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->dateTime('duration')->nullable();
            $table->integer('extra_time')->unsigned()->nullable();
            $table->integer('length')->nullable();
            $table->longText('description')->nullable();
            $table->integer('tenant_id')->unsigned()->nullable();

            $table->decimal('hourly_rate', 20, 2)->nullable();
            $table->decimal('fixed_amount', 20, 2)->nullable();

            $table->timestamps();
            //$table->softDeletes();

        });

        Schema::create('job_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('job_id')->unsigned();
            $table->string('name', 256)->nullable();
            $table->longText('description')->nullable();
            $table->string('locale')->index();

            $table->unique(['job_id','locale']);
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->integer('tenant_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_translations');
    }
}

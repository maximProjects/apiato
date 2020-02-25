<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobTypeTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('job_types', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('type_id')->unsigned()->index()->nullable();
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->boolean('is_template')->default(0);

            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->nullable();

            $table->double('planned_hours', 15, 2)->nullable();
            $table->decimal('planned_quantity', 20, 6)->nullable();
            $table->decimal('price_per_hour', 20, 6)->nullable();
            $table->decimal('price_per_hour_extra', 20, 6)->nullable();

            $table->integer('tenant_id')->unsigned()->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });


        Schema::create('job_types_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('job_type_id')->unsigned();
            $table->string('name', 256)->nullable();
            $table->longText('description')->nullable();
            $table->string('locale')->index();

            $table->unique(['job_type_id','locale']);
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
            $table->integer('tenant_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('job_types');
        Schema::dropIfExists('job_types_translations');
    }
}

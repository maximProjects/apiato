<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResourceplanTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('resource_plans', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->integer('number_employees_required')->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('resource_plans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviationTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('deviations', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->integer('checkpoint_id')->unsigned()->index()->nullable();
            $table->foreign('checkpoint_id')->references('id')->on('checkpoints')->onDelete('set null');
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->integer('type_id')->nullable();
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->longText('description')->nullable();
            $table->text('suggested_actions')->nullable();
            $table->text('path')->nullable();
            $table->text('location')->nullable();
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
        Schema::dropIfExists('deviations');
    }
}

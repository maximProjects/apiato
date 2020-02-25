<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');

            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->integer('project_group_id')->unsigned()->index()->nullable();
            $table->foreign('project_group_id')->references('id')->on('project_groups')->onDelete('set null');

            $table->integer('from_id')->unsigned()->index()->nullable();
            $table->foreign('from_id')->references('id')->on('users')->onDelete('set null');

            $table->integer('to_id')->unsigned()->index()->nullable();
            $table->foreign('to_id')->references('id')->on('users')->onDelete('set null');

           // $table->text('from')->nullable();
            $table->text('to')->nullable();
            $table->text('cc')->nullable();
            $table->text('subject')->nullable();
            $table->longText('content')->nullable();
            $table->text('state_id')->nullable();
            $table->text('type_id')->nullable();
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
        Schema::dropIfExists('messages');
    }
}

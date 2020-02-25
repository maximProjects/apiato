<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCheckpointTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('checkpoints', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('checklist_id')->unsigned()->index()->nullable();
            $table->foreign('checklist_id')->references('id')->on('checklists')->onDelete('cascade');
            $table->timestamps();
            //$table->softDeletes();

        });


        Schema::create('checkpoint_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('checkpoint_id')->unsigned();
            $table->string('name', 256)->nullable();
            $table->longText('description')->nullable();
            $table->string('locale')->index();

            $table->unique(['checkpoint_id','locale']);
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->foreign('checkpoint_id')->references('id')->on('checkpoints')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('checkpoints');
        Schema::dropIfExists('checkpoint_translations');
    }
}

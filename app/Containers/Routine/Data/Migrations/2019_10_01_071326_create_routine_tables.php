<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;

class CreateRoutineTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('state_id')->unsigned()->nullable();

            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->nullable();
            $table->integer('project_group_id')->unsigned()->index()->nullable();
            $table->foreign('project_group_id')->references('id')->on('project_groups')->nullable();

            $table->integer('tenant_id')->unsigned()->nullable();

            NestedSet::columns($table);
            $table->timestamps();
            $table->softDeletes();

        });


        Schema::create('routine_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('routine_id')->unsigned();
            $table->string('name', 256)->nullable();
            $table->longText('description')->nullable();
            $table->string('locale')->index();

            $table->unique(['routine_id','locale']);
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->foreign('routine_id')->references('id')->on('routines')->onDelete('cascade');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('routines');
        Schema::dropIfExists('routines_translations');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskChecklistsTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('task_checklists', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('task_id')->unsigned()->index()->nullable();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('set null');

            $table->integer('checklist_id')->unsigned()->index()->nullable();
            $table->foreign('checklist_id')->references('id')->on('checklists')->onDelete('set null');

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('task_checklists');
    }
}

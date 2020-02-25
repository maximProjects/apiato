<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskProjectGroupForeignKey extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {

            $table->integer('project_group_id')->unsigned()->index()->nullable();
            $table->foreign('project_group_id')->references('id')->on('project_groups')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {

            $table->dropForeign(['project_group_id']);
        });
    }
}

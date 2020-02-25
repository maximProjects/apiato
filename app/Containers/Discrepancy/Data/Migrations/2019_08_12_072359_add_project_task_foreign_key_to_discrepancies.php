<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddProjectTaskForeignKeyToDiscrepancies extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('discrepancies', function (Blueprint $table) {

            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('discrepancies', function (Blueprint $table) {

            $table->dropForeign(['project_id']);
        });

    }
}

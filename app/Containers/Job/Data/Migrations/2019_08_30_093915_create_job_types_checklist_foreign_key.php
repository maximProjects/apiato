<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobTypesChecklistForeignKey extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('job_types', function (Blueprint $table) {

            $table->integer('checklist_id')->unsigned()->index()->nullable();
            $table->foreign('checklist_id')->references('id')->on('checklists')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('checklist_id', function (Blueprint $table) {

            $table->dropForeign(['job_types']);

        });
    }
}

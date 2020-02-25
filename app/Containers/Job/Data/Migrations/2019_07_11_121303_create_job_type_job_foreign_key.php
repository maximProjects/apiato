<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobTypeJobForeignKey extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {

            $table->integer('job_type_id')->unsigned()->index()->nullable();
            $table->foreign('job_type_id')->references('id')->on('job_types')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('');
    }
}

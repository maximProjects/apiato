<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReporttypeTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('report_types', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('report_types_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('report_type_id')->unsigned();
            $table->string('name', 256)->nullable();
            $table->string('locale')->index();

            $table->unique(['report_type_id', 'locale']);
            $table->foreign('report_type_id')->references('id')->on('report_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('report_types');
        Schema::dropIfExists('report_types_translations');
    }
}

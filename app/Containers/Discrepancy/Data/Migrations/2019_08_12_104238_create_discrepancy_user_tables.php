<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscrepancyUserTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('discrepancy_user', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->string('type')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('discrepancy_id')->nullable()->references('id')->on('discrepancies')->onDelete('cascade');
            $table->integer('discrepancy_id')->unsigned()->index()->nullable();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('discrepancy_user');
    }
}

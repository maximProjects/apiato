<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyHoursTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('monthly_hours', function (Blueprint $table) {

            $table->increments('id');
            $table->date('period')->format('Y-m')->nullable();
            $table->integer('days')->nullable();
            $table->integer('hours')->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('monthly_hours');
    }
}

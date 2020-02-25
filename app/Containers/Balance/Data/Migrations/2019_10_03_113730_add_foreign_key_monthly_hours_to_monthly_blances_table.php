<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyMonthlyHoursToMonthlyBlancesTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('monthly_balances', function (Blueprint $table) {
            $table->integer('monthly_hour_id')->unsigned()->index()->nullable();
            $table->foreign('monthly_hour_id')->references('id')->on('monthly_hours')->onDelete('set null');
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('monthly_hour_id', function (Blueprint $table) {
            $table->dropForeign(['monthly_hour_id']);
            $table->dropColumn('monthly_hour_id');
        });
    }
}

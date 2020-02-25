<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyBalancesTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('monthly_balances', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->integer('hours_substr')->default(0);
            $table->integer('hours_add')->default(0);
            $table->integer('hours_advance')->default(0);
            $table->float('custom_monthly_rate', 8,2)->default(0);
            $table->text('notice')->nullable();
            $table->text('notice_administrative')->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('monthly_balances');
    }
}

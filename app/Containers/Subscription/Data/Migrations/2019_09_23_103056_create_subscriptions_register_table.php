<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionsRegisterTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('subscriptions_register', function (Blueprint $table) {

            $table->increments('id');
            $table->text('plan_type')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('employees')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_number')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('uid')->nullable();
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions_register');
    }
}

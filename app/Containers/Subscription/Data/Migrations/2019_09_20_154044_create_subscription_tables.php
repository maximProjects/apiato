<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            //$table->softDeletes();

        });

      Schema::create('subscription_users', function (Blueprint $table) {

        $table->increments('id');
        $table->integer('user_id')->unsigned()->index();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->integer('subscription_id')->unsigned()->index();
        $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
        $table->timestamps();
        //$table->softDeletes();

      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {

      Schema::dropIfExists('subscription_users');
      Schema::dropIfExists('subscriptions');
    }
}

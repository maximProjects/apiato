<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {

            $table->increments('id');
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->integer('country_id')->unsigned()->index()->nullable();
            $table->integer('country_state_id')->unsigned()->index()->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code', 12)->nullable();
            $table->string('location_lat', 18)->nullable();
            $table->string('location_lng', 18)->nullable();
            $table->string('first_name', 32)->nullable();
            $table->string('last_name', 32)->nullable();
            $table->string('contact_email', 64)->nullable();
            $table->string('contact_phone', 64)->nullable();
            $table->text('additional_information', 64)->nullable();
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}

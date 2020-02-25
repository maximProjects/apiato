<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->string('gender')->nullable();
            $table->string('birth')->nullable();
            $table->string('device')->nullable();
            $table->string('platform')->nullable();
            $table->boolean('is_client')->default(false);
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->decimal('hourly_rate', 20, 2)->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}

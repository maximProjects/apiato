<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyUsersTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('company_users', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('company_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('type')->nullable();
            $table->foreign('company_id')->nullable()->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('company_users');
    }
}

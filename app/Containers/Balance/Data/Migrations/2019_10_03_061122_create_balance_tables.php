<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBalanceTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
            $table->integer('project_group_id')->unsigned()->index()->nullable();
            $table->foreign('project_group_id')->references('id')->on('project_groups')->onDelete('set null');
            $table->integer('time_registry_id')->unsigned()->index()->nullable();
            $table->foreign('time_registry_id')->references('id')->on('time_registry')->nullable();
            $table->integer('hours')->unsigned()->nullable();
            $table->integer('extra_time')->unsigned()->nullable();
            $table->decimal('sum', 20, 2)->nullable();
            $table->dateTime('balance_date')->nullable();
            $table->boolean('is_val')->default(0);
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('balances');
    }
}

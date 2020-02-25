<?php

use App\Containers\Task\Models\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->double('budget_planned', 15, 2)->nullable();
            $table->decimal('price_per_hour', 20, 6)->nullable();
            $table->decimal('price_per_hour_extra', 20, 6)->nullable();
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('priority')->unsigned()->nullable();
            $table->timestamps();

            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}

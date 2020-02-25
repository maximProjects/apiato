<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserChecklist extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_checklist', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('checklist_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('type')->nullable();
            $table->foreign('checklist_id')->nullable()->references('id')->on('checklists')->onDelete('cascade');
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
        Schema::dropIfExists('user_checklist');
    }
}

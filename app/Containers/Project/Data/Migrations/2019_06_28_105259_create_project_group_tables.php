<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectGroupTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('project_groups', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->integer('state_id')->nullable();
            $table->string('reference')->nullable();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->double('working_hours_planned', 15, 2)->nullable();
            $table->decimal('budget_planned', 20, 6)->nullable();
            $table->integer('number_employees_required')->nullable();
            $table->longText('description')->nullable();

            $table->integer('tenant_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('project_groups');
    }
}

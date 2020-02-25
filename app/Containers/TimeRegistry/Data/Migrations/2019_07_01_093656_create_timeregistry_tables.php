<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Containers\TimeRegistry\Models\TimeRegistry;

class CreateTimeregistryTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('time_registry', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->integer('project_id')->unsigned()->nullable()->index();
            $table->integer('project_group_id')->unsigned()->nullable()->index();
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->integer('extra_time')->unsigned()->nullable();
            $table->text('description')->nullable();

            $table->string('latitude_start')->nullable();
            $table->string('latitude_end')->nullable();
            $table->string('longitude_start')->nullable();
            $table->string('longitude_end')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('type_id')->nullable();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');
            $table->foreign('project_group_id')->references('id')->on('project_groups')->onDelete('set null');
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->boolean('confirmed_hours')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('time_registry');
    }
}

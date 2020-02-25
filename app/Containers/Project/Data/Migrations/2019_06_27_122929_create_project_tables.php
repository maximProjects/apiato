<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->string('reference')->nullable();
            $table->string('name', 256)->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('manager_id')->nullable();
            $table->string('building_number')->nullable();
            $table->string('property_number')->nullable();
            $table->string('gnr')->nullable();
            $table->string('bnr')->nullable();
            $table->string('fnr')->nullable();
            $table->string('section')->nullable();
            $table->string('property_owner')->nullable();
            $table->string('property_owner_phone')->nullable();
            $table->string('property_owner_information')->nullable();
            $table->string('property_developer')->nullable();
            //Address
            $table->integer('address_id')->nullable();
            //Work related fields
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->dateTime('working_hours_from')->nullable();
            $table->dateTime('working_hours_to')->nullable();
            $table->decimal('price_per_hour', 20, 6)->nullable();
            $table->decimal('price_per_hour_extra', 20, 6)->nullable();
            $table->double('working_hours_planned', 15, 2)->nullable();
            $table->decimal('budget_planned', 20, 6)->nullable();
            $table->boolean('exclude_from_balance')->nullable();
            $table->boolean('has_building_application_form')->nullable();
            $table->boolean('has_work_safety_plan')->nullable();
            $table->boolean('is_large_scale_project')->nullable();
            $table->string('color_marker')->nullable();
            $table->text('additional_information')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}

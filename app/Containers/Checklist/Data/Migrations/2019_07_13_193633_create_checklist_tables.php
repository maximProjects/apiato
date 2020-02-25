<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Kalnoy\Nestedset\NestedSet;

class CreateChecklistTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->boolean('is_template')->default(0);
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('type_id')->unsigned()->nullable();
            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->nullable();
            $table->integer('project_group_id')->unsigned()->index()->nullable();
            $table->foreign('project_group_id')->references('id')->on('project_groups')->nullable();

            $table->integer('contact_user_id')->unsigned()->index()->nullable();
            $table->foreign('contact_user_id')->references('id')->on('users')->onDelete('set null');
            $table->boolean('is_group')->default(0);
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->float("percent",8,2)->nullable();
            NestedSet::columns($table);
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('checklist_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('checklist_id')->unsigned();
            $table->string('name', 256)->nullable();
            $table->longText('description')->nullable();
            $table->string('locale')->index();

            $table->unique(['checklist_id','locale']);
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->foreign('checklist_id')->references('id')->on('checklists')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('checklists');
        Schema::dropIfExists('checklist_translations');
    }
}

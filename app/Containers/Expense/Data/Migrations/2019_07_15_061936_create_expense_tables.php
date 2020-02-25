<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpenseTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('project_id')->unsigned()->index()->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('set null');

            $table->integer('project_group_id')->unsigned()->index()->nullable();
            $table->foreign('project_group_id')->references('id')->on('project_groups')->onDelete('set null');

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            $table->text('supplier')->nullable();

            $table->integer('type_id')->nullable();
            $table->integer('document_type_id')->nullable();
            $table->string('number')->nullable();
            $table->decimal('extra', 20, 6)->nullable();
            $table->dateTime('date')->nullable();
            $table->decimal('vat', 20, 6)->nullable();
            $table->decimal('total', 20, 6)->nullable();
            $table->decimal('total_with_vat', 20, 6)->nullable();
            $table->text('comment')->nullable();
            $table->integer('state_id')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}

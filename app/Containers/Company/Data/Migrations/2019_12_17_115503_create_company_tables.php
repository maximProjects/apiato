<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('address_id')->unsigned()->index()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('set null');

            $table->integer('tenant_id')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->string('name')->nullable();
            $table->string('company_code')->nullable();
            $table->string('vat_code')->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}

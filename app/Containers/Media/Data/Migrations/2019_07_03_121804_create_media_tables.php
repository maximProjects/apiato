<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Containers\Media\Models\Media;


class CreateMediaTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('file');
            $table->string('file_name');
            $table->string('file_size');
            $table->string('mime_type');
            $table->string('storage_type');
            $table->integer('tenant_id')->unsigned()->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });



    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}

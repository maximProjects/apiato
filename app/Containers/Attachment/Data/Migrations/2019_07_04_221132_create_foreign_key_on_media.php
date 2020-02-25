<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeyOnMedia extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('attachments', function (Blueprint $table) {

            $table->integer('media_id')->unsigned()->index()->nullable();
            $table->foreign('media_id')->nullable()->references('id')->on('media')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}

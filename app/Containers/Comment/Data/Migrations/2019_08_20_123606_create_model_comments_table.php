<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModelCommentsTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('model_comments', function (Blueprint $table) {

            $table->increments('id');
            $table->morphs('model_comment');
            $table->integer('comment_id')->unsigned();
            $table->foreign('comment_id')
                ->references('id')
                ->on('comments')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('model_comments');
    }
}

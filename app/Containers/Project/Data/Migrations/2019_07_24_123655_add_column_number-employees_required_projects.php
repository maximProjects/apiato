<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnNumberEmployeesRequiredProjects extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->integer('number_employees_required')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            $table->dropColumn('number_employees_required');

        });
    }
}

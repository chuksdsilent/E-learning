<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 100)->nullable()->default('No ID');
            $table->string('username', 100)->nullable()->default('text');
            $table->string('email', 100)->nullable()->default('text');
            $table->string('phone', 100)->nullable()->default('text');
            $table->string('first_name', 100)->nullable()->default('text');
            $table->string('last_name', 100)->nullable()->default('text');
            $table->string('university', 100)->nullable()->default("No University");
            $table->string('faculty', 100)->nullable()->default("No Faculty");
            $table->string('department', 100)->nullable()->default('text');
            $table->string('state', 100)->nullable()->default('text');
            $table->string('school_name', 100)->nullable()->default('text');

            $table->string('country', 100)->nullable()->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

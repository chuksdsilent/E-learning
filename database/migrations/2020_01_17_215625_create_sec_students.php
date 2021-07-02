<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 100)->nullable()->default('');
            $table->string('username', 100)->nullable()->default('');
            $table->string('email', 100)->nullable()->default('');
            $table->string('phone', 100)->nullable()->default('');
            $table->string('first_name', 100)->nullable()->default('');
            $table->string('last_name', 100)->nullable()->default('');
            $table->string('school_name', 100)->nullable()->default('');
            $table->integer('student_Class');
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
        Schema::dropIfExists('sec_students');
    }
}

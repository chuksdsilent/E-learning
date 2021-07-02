<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uni_id', 100)->nullable()->default('text');
            $table->string('fac_id', 100)->nullable()->default('text');
            $table->string('dept_id', 100)->nullable()->default('text');
            $table->string('course_id', 100)->unique()->nullable()->default('text');
            $table->string('course_code', 100)->unique()->nullable()->default('text');
            $table->integer('level')->nullable()->default("No Level");
            $table->string('name', 100)->nullable()->default('text');

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
        Schema::dropIfExists('courses');
    }
}

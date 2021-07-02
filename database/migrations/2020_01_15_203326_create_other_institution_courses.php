<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherInstitutionCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_institution_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("institution_id", 100)->nullable()->default("No School type");
            $table->string("course_id", 100)->nullable()->default("No Course ID");
            $table->string("course_code", 100)->nullable()->default("No Course code");
            $table->string("course_name", 100)->nullable()->default("No course name");
            $table->integer("level");
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
        Schema::dropIfExists('other_institution_courses');
    }
}

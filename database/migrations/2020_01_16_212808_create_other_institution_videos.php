<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherInstitutionVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_institution_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('institution_id', 10)->nullable()->default("No ID");
            $table->string('instructor_email', 10)->nullable()->default("No Email");
            $table->string('video_id', 10)->nullable()->default("No ID");
            $table->integer('level');
            $table->string('course_id', 100)->nullable()->default("No Course ID");
            $table->string('semester', 100)->nullable()->default("No Semester");
            $table->string('topic_id', 100)->nullable()->default("No Topic");
            $table->string('title', 100)->nullable()->default("No Title");
            $table->longText('description');
            $table->string('cover_photo', 100)->nullable()->default("No Cover Photo");
            $table->string('video_path', 100)->nullable()->default("No Video File");
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
        Schema::dropIfExists('other_institution_videos');
    }
}

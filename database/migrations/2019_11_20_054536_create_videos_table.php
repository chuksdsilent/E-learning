<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('uni_id', 100)->nullable()->default('No Uni ID');
            $table->string('user_id', 100)->nullable()->default('No User ID');
            $table->string('fac_id', 100)->nullable()->default('No Faculty ID');
            $table->string('dept_id', 100)->nullable()->default('No Department ID');
            $table->string('course_id', 100)->nullable()->default('No Course ID');
            $table->string('course_code', 10)->nullable()->default('No Course Code');
            $table->string('level', 100)->nullable()->default('No Level');
            $table->string('semester', 100)->nullable()->default('No semester');
            $table->string('title', 100)->nullable()->default('No Title');
            $table->longText('description')->nullable();
            $table->string('vid_id', 100)->nullable()->default('No Vid ID')->unique();
            $table->string('vid_path', 255)->nullable()->default('No Vid Path');
            $table->bigInteger('publish')->nullable()->default(0);
            $table->string('cover_photo', 100)->nullable()->default('No cover Photo');
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
        Schema::dropIfExists('videos');
    }
}

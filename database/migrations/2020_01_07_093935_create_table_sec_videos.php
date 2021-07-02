<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSecVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vid_id', 100)->nullable()->default('No ID');
            $table->string('class_id', 100)->nullable()->default('No ID');
            $table->string('subject_id', 100)->nullable()->default('No ID');
            $table->string('title', 100)->nullable()->default('No ID');
            $table->string('overview', 100)->nullable()->default('No ID');
            $table->string('coverPhoto', 100)->nullable()->default('No ID');
            $table->string('secVideo', 100)->nullable()->default('No ID');

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
        Schema::dropIfExists('table_sec_videos');
    }
}

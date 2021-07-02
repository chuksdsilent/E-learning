<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherSchoolsTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_schools_topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("course_id", 100)->nullable()->default();
            $table->string("topic_id", 100)->nullable()->default();
            $table->string("name", 100)->nullable()->default();
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
        Schema::dropIfExists('other_schools_topics');
    }
}

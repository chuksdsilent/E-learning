<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherInstitutionTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_institution_topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("course_id")->nullable()->default("No Course id");
            $table->string("topic_id")->nullable()->default("No Topic id");
            $table->string("name")->nullable()->default("No Name");
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
        Schema::dropIfExists('other_institution_topics');
    }
}

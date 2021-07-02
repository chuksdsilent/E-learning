<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("sub_id", 100)->nullable()->default('');
            $table->string("topic_id", 100)->nullable()->default('');
            $table->string("topic_name", 100)->nullable()->default('');
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
        Schema::dropIfExists('sec_topics');
    }
}

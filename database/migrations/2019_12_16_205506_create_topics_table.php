<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uni_id', 100)->nullable()->default('text');
            $table->string('fac_id', 100)->nullable()->default('text');
            $table->string('dept_id', 100)->nullable()->default('text');
            $table->string('course_id', 100)->nullable()->default('text');
            $table->string('topic_id', 100)->nullable()->default('text');
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
        Schema::dropIfExists('topics');
    }
}

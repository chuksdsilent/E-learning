<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Department extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fac_id', 100)->nullable()->default('No faculty ID');
            $table->string('uni_id', 100)->nullable()->default('No department ID');
            $table->string('dept_id', 100)->nullable()->default('No ID');
            $table->string('name', 100)->nullable()->default('No Name');
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
        Schema::dropIfExists('departments');
    }
}

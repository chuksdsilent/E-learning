<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SecondarySchool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondary_schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('school_id', 100)->nullable()->default('No ID');
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
        Schema::dropIfExists('secondary_schools');
    }
}

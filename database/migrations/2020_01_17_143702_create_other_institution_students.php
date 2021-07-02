<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherInstitutionStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_institution_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 100)->nullable()->default("No username");
            $table->string('user_id', 100)->nullable()->default("No username");
            $table->string('email', 100)->nullable()->default("No username");
            $table->string('first_name', 100)->nullable()->default("No username");
            $table->string('last_name', 100)->nullable()->default("No username");
            $table->string('phone', 100)->nullable()->default("No username");
            $table->string('profile_pics', 100)->nullable()->default("");
            $table->string('institution_id', 100)->nullable()->default("No username");
            $table->string('institution_level', 100)->nullable()->default("No username");
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
        Schema::dropIfExists('other_institution_students');
    }
}

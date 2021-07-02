<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Instructor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 100)->nullable()->default('No ID');
            $table->string('username', 100)->nullable()->default('text');
            $table->string('acazone_name', 100)->nullable()->default('text');
            $table->string('email', 100)->nullable()->default('text');  
            $table->string('phone', 100)->nullable()->default('text');
            $table->string('first_name', 100)->nullable()->default('text');
            $table->string('last_name', 100)->nullable()->default('text');
            $table->string('department', 100)->nullable()->default('text');
            $table->string('state', 100)->nullable()->default('text');
            $table->string('country', 100)->nullable()->default('text');
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
        
        Schema::dropIfExists('instructors');
    }
}

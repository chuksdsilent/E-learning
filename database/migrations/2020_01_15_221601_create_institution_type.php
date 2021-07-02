<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("institution_id", 100)->nullable()->default("No School ID");
            $table->string("institution_type", 100)->nullable()->default("No school type");
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
        Schema::dropIfExists('institution_type');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherInstitutions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_institutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("institution_type_id", 100)->nullable()->default("No School ID");
            $table->string("institution_id", 100)->nullable()->default("No School ID");
            $table->string("institution_name", 100)->nullable()->default("No school type");
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
        Schema::dropIfExists('other_institutions');
    }
}

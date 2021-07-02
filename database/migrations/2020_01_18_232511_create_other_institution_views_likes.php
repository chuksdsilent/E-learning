<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherInstitutionViewsLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_institution_views_likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('thumbs_down')->unsigned()->nullable();
            $table->integer('thumbs_up')->unsigned()->nullable();
            $table->string('views', 255)->nullable()->default(0);
            $table->string('user_email', 255)->nullable()->default(0);
            $table->string('vid_id', 255)->nullable()->default('text');
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
        Schema::dropIfExists('other_institution_views_likes');
    }
}

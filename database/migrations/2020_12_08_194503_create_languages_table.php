<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('description'); 

            $table->unsignedBigInteger('reading_language_id');
            $table->foreign('reading_language_id')->references('id')->on('reading_languages'); 

            $table->unsignedBigInteger('writing_language_id');
            $table->foreign('writing_language_id')->references('id')->on('writing_languages');
            
            $table->unsignedBigInteger('speak_language_id');
            $table->foreign('speak_language_id')->references('id')->on('speak_languages'); 

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); 

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
        Schema::dropIfExists('languages');
    }
}

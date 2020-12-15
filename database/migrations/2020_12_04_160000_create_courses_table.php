<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('institution');
            $table->string('country');
            $table->string('uf');
            $table->string('city');
            $table->date('start');
            $table->date('end');

            $table->unsignedBigInteger('course_type_id');
            $table->foreign('course_type_id')->references('id')->on('course_types'); 

            $table->unsignedBigInteger('course_status_id');
            $table->foreign('course_status_id')->references('id')->on('course_statuses'); 

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
        Schema::dropIfExists('courses');
    }
}

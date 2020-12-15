<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_courses', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });
 
        DB::table('education_courses')->insert([
            ['description'=>'Ensino Fundamental'],
            ['description'=>'Ensino médio'], 
            ['description'=>'Ensino Superior'], 
            ['description'=>'Pós Graduação (Especialização)'],
            ['description'=>'Pós Graduação (Mestrado)'],
            ['description'=>'Pós Graduação (Doutorado)'], 
        ]); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_courses');
    }
}

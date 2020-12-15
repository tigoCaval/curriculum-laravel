<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_types', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });
 
        DB::table('course_types')->insert([
            ['description'=>'Cursos Complementares'],
            ['description'=>'Profissionalizante'],
            ['description'=>'Ensino médio/Técnico'], 
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
        Schema::dropIfExists('course_types');
    }
}

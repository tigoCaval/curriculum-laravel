<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWritingLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writing_languages', function (Blueprint $table) {
            $table->id();
            $table->string('description');  
            $table->timestamps();
        });

        DB::table('writing_languages')->insert([
            ['description'=>'(não tem)'],
            ['description'=>'Básico'],
            ['description'=>'Intermediário'],
            ['description'=>'Avançado'],
            ['description'=>'Fluente']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('writing_languages');
    }
}

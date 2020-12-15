<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_licenses', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });
           
        DB::table('driver_licenses')->insert([
            ['description'=>'(não tem)'],
            ['description'=>'A'],
            ['description'=>'B'],
            ['description'=>'AB'],
            ['description'=>'C'],
            ['description'=>'D'],
            ['description'=>'E'] 
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_licenses');
    }
}

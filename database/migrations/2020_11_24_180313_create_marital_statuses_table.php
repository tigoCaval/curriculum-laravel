<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaritalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marital_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });
       
        DB::table('marital_statuses')->insert([
            ['description'=>'Amasiado(a)'],
            ['description'=>'Casado(a)'],
            ['description'=>'Divorciado(a)'],
            ['description'=>'Solteiro(a)'],
            ['description'=>'Viúvo(a)']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marital_statuses');
    }
}

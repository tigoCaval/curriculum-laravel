<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('date_birth'); 
            $table->string('nationality');  
            $table->string('place_birth');
            $table->string('ssn')->nullable(); //cpf
            $table->string('identity')->nullable(); //rg  

            $table->unsignedBigInteger('driver_license_id');
            $table->foreign('driver_license_id')->references('id')->on('driver_licenses'); 

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
        Schema::dropIfExists('documents');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Expediente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes',function(Blueprint $table){
            $table->id(); 
            $table->string('numero');
            $table->string('anho',200);
            $table->string('descripcion');
            $table->string('estado');
            $table->string('hospital');
            $table->string('doctor');
            $table->unsignedBigInteger('id_pacientes');
            $table->foreign('id_pacientes')->references('id')->on('pacientes');
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
        
    }
}

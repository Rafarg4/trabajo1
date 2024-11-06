<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas',function(Blueprint $table){
            $table->id(); 
            $table->string('sintomas');
            $table->string('descripcion'); 
            $table->string('tipo_consulta');
            $table->string('fecha');
            $table->string('receta'); 
            $table->string('estado');
            $table->unsignedBigInteger('id_expediente');
            $table->foreign('id_expediente')->references('id')->on('expedientes');
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
        //
    }
}

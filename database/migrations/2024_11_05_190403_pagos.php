<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos',function(Blueprint $table){
            $table->id(); 
            $table->string('descripcion'); 
            $table->string('tipo_consulta');
            $table->string('metodo_pago');
            $table->string('monto'); 
            $table->string('fecha_pago');
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

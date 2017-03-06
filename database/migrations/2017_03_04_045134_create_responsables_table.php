<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidopaterno');
            $table->string('apellidomaterno');
            //$table->integer('region_id')->unsigned();
            //$table->foreign('region_id')->references('id')->on('regiones')->onDelete('cascade');
            //$table->integer('municipio_id')->unsigned();
            //$table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
            //$table->integer('nombramiento_id')->unsigned();           
            //$table->foreign('nombramiento_id')->references('id')->on('nombramientos')->onDelete('cascade'); 
            $table->integer('region_id');
            $table->integer('municipio_id');
            $table->integer('nombramiento_id');
            $table->string('clavedeelector')->unique();
            $table->string('curp')->unique();            
            $table->string('telefono');
            $table->string('email');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('whatsapp');
            //foreign keys
            
            
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
        Schema::drop('responsables');
    }
}

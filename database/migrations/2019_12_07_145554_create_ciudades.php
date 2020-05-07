<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiudades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciudades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_municipio');
            $table->string('nombre_municipio');
            $table->double('latitud')->comment('Latitud georeferenciacion');
            $table->double('longitud')->comment('Longitud Georeferenciacion');

            $table->unsignedBigInteger('codigo_dpto');
            $table->foreign('codigo_dpto')->references('id')->on('departamentos');
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
        Schema::dropIfExists('ciudades');
    }
}

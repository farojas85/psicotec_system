<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_modular',20);
            $table->string('nombre', 255);
            $table->string('nivel_modalidad');
            $table->string('gestion_dependencia');
            $table->string('ubigeo',255);
            $table->string('departamento',255);
            $table->string('provincia',255);
            $table->string('distrito',255);
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
        Schema::dropIfExists('colegios');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalidadsTable extends Migration
{

    public function up()
    {
        Schema::create('personalidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo',2);
            $table->string('nombre');
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personalidads');
    }
}

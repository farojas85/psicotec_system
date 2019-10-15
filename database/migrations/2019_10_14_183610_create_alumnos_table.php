<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_nacim');
            $table->bigInteger('persona_id')->unsigned()->unique()->index();
            $table->foreign('persona_id')->references('id')->on('personas')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('colegio_id')->unsigned()->index();
            $table->foreign('colegio_id')->references('id')->on('colegios')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('grado_id')->unsigned()->index();
            $table->foreign('grado_id')->references('id')->on('grados')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('seccion_id')->unsigned()->index();
            $table->foreign('seccion_id')->references('id')->on('seccions')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedTinyInteger('estado')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}

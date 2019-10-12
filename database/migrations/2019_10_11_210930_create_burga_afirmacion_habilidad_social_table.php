<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBurgaAfirmacionHabilidadSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('burga_afirmacion_habilidad_social', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('burga_afirmacion_id')->unsigned()->index();
            $table->foreign('burga_afirmacion_id')->references('id')->on('burga_afirmacions')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('habilidad_social_id')->unsigned()->index();
            $table->foreign('habilidad_social_id')->references('id')->on('habilidad_socials')
                    ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('burga_afirmacion_habilidad_social');
    }
}

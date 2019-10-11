<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcupacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocupacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('area_id')->unsigned()->index();
            $table->foreign('area_id')->references('id')->on('areas')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('personalidad_id')->unsigned()->index();
            $table->foreign('personalidad_id')->references('id')->on('personalidads')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('estado')->default(1);
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
        Schema::dropIfExists('ocupacions');
    }
}

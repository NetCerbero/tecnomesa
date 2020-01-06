<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvanceProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avance_proyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('descipcion')->nullable();
            $table->string('file')->nullable();
            $table->text('comentario')->nullable();;
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('guia_id');
            $table->unsignedBigInteger('trabajo_id');

            $table->foreign('guia_id')->references('id')->on('users');
            $table->foreign('trabajo_id')->references('id')->on('graduacions');
            
            $table->softDeletes();
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
        Schema::dropIfExists('avance_proyectos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostgradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postgrados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');

            $table->unsignedBigInteger('grado_id');
            $table->unsignedBigInteger('titulado_id');
            $table->foreign('titulado_id')->references('id')->on('titulados')->onDelete('cascade');
            $table->foreign('grado_id')->references('id')->on('grado_academicos')->onDelete('cascade');

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
        Schema::dropIfExists('postgrados');
    }
}

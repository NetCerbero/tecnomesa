<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('visto');
            $table->unsignedBigInteger('eliminar');
            $table->unsignedBigInteger('escribir');
            $table->unsignedBigInteger('visualizar');
            $table->unsignedBigInteger('editar');
            $table->unsignedBigInteger('cu_id');
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
        Schema::dropIfExists('estadisticas');
    }
}

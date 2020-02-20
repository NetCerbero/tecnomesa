<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipo');
            //-----------GRADUACION DIRECTA = 1---------------
            $table->integer('forma')->nullable();
            $table->decimal('nota')->nullable();
            //-----------EXAMEN DE GRADO = 2 --------------
            $table->date('fsorteoarea')->nullable();
            // $table->date('fdefensaescrita')->nullable();
            // $table->date('fdefensaoral')->nullable();
            $table->unsignedBigInteger('area_id')->nullable();
            //-----------TRABAJO TESIS/DIRIGIDO = 3---------------
            $table->date('fpresentacion')->nullable();
            $table->string('titulo')->nullable();
            $table->unsignedBigInteger('guia_id')->nullable();
            //***********************************************
            $table->unsignedBigInteger('egresado_id');


            $table->foreign('guia_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('egresado_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('graduacions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipo');
            $table->date('finicio');//escrita
            $table->date('ffinal')->nullable();
            $table->date('fdefensa')->nullable();//oral
            //*****************************************************
            $table->string('nresolucion');
            $table->unsignedBigInteger('graduacion_id');

            $table->foreign('graduacion_id')->references('id')->on('graduacions');

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
        Schema::dropIfExists('evaluacions');
    }
}

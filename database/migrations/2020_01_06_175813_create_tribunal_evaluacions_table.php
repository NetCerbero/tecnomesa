<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTribunalEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tribunal_evaluacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('eva1')->nullable();
            $table->decimal('eva2')->nullable();
            $table->string('observacion')->nullable();
            $table->string('oral')->nullable();
            $table->unsignedBigInteger('tribunal_id');
            $table->unsignedBigInteger('evaluacion_id');

            $table->foreign('tribunal_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('evaluacion_id')->references('id')->on('evaluacions')->onDelete('cascade');
           
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
        Schema::dropIfExists('tribunal_evaluacions');
    }
}

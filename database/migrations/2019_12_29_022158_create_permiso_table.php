<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso', function (Blueprint $table) {
            $table->unsignedBigInteger('rol_id');
            $table->unsignedBigInteger('cu_id');
            //acciones
            $table->char('leer',1);
            $table->char('escribir',1);
            $table->char('eliminar',1);
            $table->char('editar',1);

            $table->foreign('rol_id')->references('id')->on('rols')->onDelete('cascade');
            $table->foreign('cu_id')->references('id')->on('cus')->onDelete('cascade');

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
        Schema::dropIfExists('permiso');
    }
}

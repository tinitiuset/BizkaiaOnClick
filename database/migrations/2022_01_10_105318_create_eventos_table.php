<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {

            $table->integer("id")->autoIncrement();
            $table->string("titulo")->unique();
            $table->mediumText("descripcion")->nullable();
            $table->date("fechaInicio")->nullable();
            $table->date("fechaFin")->nullable();
            $table->string("hora")->nullable();
            $table->float("precio")->nullable()->unsigned();
            $table->string("direccion")->nullable();
            $table->enum("estado",["pendiente","aprobado"])->default("pendiente");
            $table->string("aforo")->nullable();
            $table->string("recinto")->nullable();
            $table->string("localidad")->nullable();
            $table->integer("usuarioAprobador")->nullable();
            $table->integer("usuarioCreador")->nullable();
            $table->string("categoria");
            $table->foreign('usuarioAprobador')->references('id')->on('users');
            $table->foreign('usuarioCreador')->references('id')->on('users');
            $table->foreign('categoria')->references('nombre')->on('categorias');
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
        Schema::dropIfExists('eventos');
    }

}

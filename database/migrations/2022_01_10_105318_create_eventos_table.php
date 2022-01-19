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
            $table->string("descripcion")->nullable();
            $table->date("fechaInicio")->nullable();
            $table->date("fechaFin")->nullable();
            $table->time("hora")->nullable();
            $table->float("precio")->nullable()->unsigned();
            $table->string("direccion")->nullable();
            $table->enum("estado",["pendiente","aprobado"])->default("pendiente");
            $table->string("sala")->nullable();
            $table->string("recinto")->nullable();
            $table->string("localidad")->nullable();
            $table->string("usuarioAprueba")->nullable();
            $table->string("usuarioCreador")->nullable();
            $table->foreign('usuarioAprueba')->references('usuario')->on('users');
            $table->foreign('usuarioCreador')->references('usuario')->on('users');
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

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

            $table->string("titulo")->primary();
            $table->string("descripcion");
            $table->date("fecha")->useCurrent();
            $table->float("precio")->unsigned();
            $table->string("direccion");
            $table->enum("estado",["pendiente","aprobado"])->default("pendiente");
            $table->integer("sala",false,true)->nullable()->unsigned();
            $table->string("recinto")->nullable();
            $table->string("provincia");
            $table->string("localidad");

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
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->integer("idUsuario");
            $table->string('categoria', 60);
            $table->primary(["idUsuario","categoria"]);
            $table->foreign('idUsuario')->references('id')->on('users')->onUpdate("cascade");
            $table->foreign('categoria')->references('nombre')->on('categorias')->onUpdate("cascade");
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
        Schema::dropIfExists('alertas');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaClasificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_clasificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->comment('Codigo de catalogo')->nullable();
            $table->string('nombre')->comment('Nombre de clasificacion')->nullable();
            $table->unsignedBigInteger('categoria_id')->comment('Categoria de la clasificacion')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');
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
        Schema::dropIfExists('categoria_clasificaciones');
    }
}

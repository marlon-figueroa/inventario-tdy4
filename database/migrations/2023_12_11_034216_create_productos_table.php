<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->comment('Codigo')->nullable();
            $table->string('foto')->nullable();
            $table->string('nombre')->comment('Nombre')->nullable();
            $table->string('existencia')->comment('Existencia')->nullable();
            $table->double('precio_unitario')->comment('Precio unitario de compra')->nullable();
            $table->double('margen')->comment('Margen de ganancia')->nullable();
            $table->double('impuesto')->comment('Impuesto')->nullable();
            $table->unsignedBigInteger('clasificacion_id')->comment('Clasificacion de catalogo')->nullable();
            $table->foreign('clasificacion_id')->references('id')->on('categoria_clasificaciones');
            $table->unsignedBigInteger('marca_id')->comment('Marca')->nullable();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->unsignedBigInteger('presentacion_id')->comment('Presentacion')->nullable();
            $table->foreign('presentacion_id')->references('id')->on('presentaciones');
            $table->unsignedBigInteger('medida_id')->comment('Medida')->nullable();
            $table->foreign('medida_id')->references('id')->on('medidas');
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
        Schema::dropIfExists('productos');
    }
}

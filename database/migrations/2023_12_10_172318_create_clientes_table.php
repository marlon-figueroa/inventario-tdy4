<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dui')->unique()->comment('Numero unico de identificacion')->nullable();
            $table->string('nombres')->comment('Nombres')->nullable();
            $table->string('apellidos')->comment('Apellidos')->nullable();
            $table->string('ciudad')->comment('Ciudad')->nullable();
            $table->text('direccion')->comment('Direccion')->nullable();
            $table->string('telefono')->comment('Telefono')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}

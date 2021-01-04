<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->boolean('disponible','no-disponible');
            $table->string('imagen')->nullable();
            $table->double('precio');
            $table->string('puntuacion')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('importadora')->nullable();
            $table->unsignedBigInteger('categorias_id')->unsigned();
            $table->unsignedBigInteger('subcategorias_id')->unsigned();
            $table->unsignedBigInteger('favoritos_id')->unsigned();
            
            $table->foreign('categorias_id')->references('id')->on('categorias')
            ->onDelete('cascade');

            $table->foreign('subcategorias_id')->references('id')->on('subcategorias')
            ->onDelete('cascade');

            $table->foreign('favoritos_id')->references('id')->on('favoritos')
            ->onDelete('cascade');

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
        Schema::dropIfExists('productos');
    }
}

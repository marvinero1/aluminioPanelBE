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
            $table->enum('estado', ['disponible', 'no-disponible','Pendiente']);
            $table->string('imagen')->nullable();
            $table->double('precio');
            $table->string('color')->nullable();
            $table->string('ancho')->nullable();
            $table->string('codigo')->nullable();
            $table->string('alto')->nullable();
            $table->string('puntuacion')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('novedad')->nullable();
            $table->string('importadora')->nullable();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('categorias_id')->unsigned();
            $table->unsignedBigInteger('subcategorias_id')->unsigned();
            $table->unsignedBigInteger('favoritos_id')->nullable();
            $table->string('disponibilidad')->nullable();
            $table->string('tipo_medida')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');

            $table->foreign('categorias_id')->references('id')->on('categorias')
            ->onDelete('cascade');

            $table->foreign('subcategorias_id')->references('id')->on('subcategorias')
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

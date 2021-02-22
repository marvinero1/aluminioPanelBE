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
            $table->string('importadora')->nullable();
            $table->unsignedBigInteger('categorias_id')->unsigned();
            $table->unsignedBigInteger('subcategorias_id')->unsigned();
            $table->unsignedBigInteger('favoritos_id')->nullable();
            $table->enum('disponibilidad', 
            ['La-Paz', 'Cochabamba','Santa-Cruz',
            'Oruro', 'Potosi','Chuquisaca',
            'Tarija', 'Pando','Beni']);
            $table->string('tipo_medida')->nullable();
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

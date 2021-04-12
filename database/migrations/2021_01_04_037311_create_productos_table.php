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
            $table->enum('confirmacion', ['true', 'false']);
            $table->string('imagen')->nullable();
            $table->double('precio', 8, 2);
            $table->string('color')->nullable();
            $table->double('ancho', 8, 2)->nullable();
            $table->string('codigo')->nullable();
            $table->double('alto', 8, 2)->nullable();
            $table->string('novedad')->nullable();
            $table->string('puntuacion')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('importadora')->nullable();
            $table->string('disponibilidad')->nullable();
            $table->string('tipo_medida')->nullable();

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('categorias_id')->unsigned();
            $table->unsignedBigInteger('subcategorias_id')->unsigned();
            $table->unsignedBigInteger('favoritos_id')->nullable();
            
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

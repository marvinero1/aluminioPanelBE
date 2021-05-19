<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            // $table->enum('estado', ['disponible', 'no-disponible','Pendiente']);
            $table->enum('confirmacion', ['true', 'false']);
            $table->string('imagen')->nullable();
            $table->double('precio', 8, 2);
            $table->string('color')->nullable();
            $table->double('ancho', 8, 2)->nullable();
            $table->double('alto', 8, 2)->nullable();
            $table->string('codigo')->nullable();
            $table->string('puntuacion')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('importadora')->nullable();
            $table->string('tipo_medida')->nullable();
            $table->string('cantidad_pedido');
            $table->string('user_id')->nullable();
            $table->string('categorias_id')->nullable();
            $table->string('subcategorias_id')->nullable();
            $table->string('favoritos_id')->nullable();
            
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
        Schema::dropIfExists('carritos');
    }
}

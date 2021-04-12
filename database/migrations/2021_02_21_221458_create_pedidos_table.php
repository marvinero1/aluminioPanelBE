<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('imagen')->nullable();
            $table->double('precio');
            $table->string('color')->nullable();
            $table->string('ancho')->nullable();
            $table->string('codigo')->nullable();
            $table->string('alto')->nullable();
            $table->string('puntuacion')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('importadora')->nullable();
            $table->string('disponibilidad');
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
        Schema::dropIfExists('pedidos');
    }
}

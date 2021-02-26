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
            $table->enum('disponibilidad', 
            ['La-Paz', 'Cochabamba','Santa-Cruz',
            'Oruro', 'Potosi','Chuquisaca',
            'Tarija', 'Pando','Beni']);
            $table->string('tipo_medida')->nullable();
            $table->string('categorias_id');
            $table->string('subcategorias_id');
            $table->string('cantidad_pedido');
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

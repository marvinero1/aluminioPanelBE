<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('cantidad_pedido')->nullable();
            $table->string('importadora');
            $table->string('nombre')->nullable();
            $table->string('imagen')->nullable();
            $table->double('precio', 8, 2);
            $table->string('color')->nullable();
            $table->double('ancho', 8, 2)->nullable();
            $table->string('codigo')->nullable();
            $table->double('alto', 8, 2)->nullable();
            $table->string('descripcion')->nullable();            
            $table->string('tipo_medida')->nullable();

            $table->unsignedBigInteger('carro_id')->unsigned();
            $table->foreign('carro_id')->references('id')->on('carritos')->onDelete('cascade');

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
        Schema::dropIfExists('carrito_detalles');
    }
}

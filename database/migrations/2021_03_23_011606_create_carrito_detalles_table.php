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

            $table->unsignedBigInteger('carro_id')->unsigned();
            $table->foreign('carro_id')->references('id')->on('carritos')->onDelete('cascade');
            
           
            $table->unsignedBigInteger('productos_id')->unsigned();
            $table->foreign('productos_id')->references('id')->on('productos')
            ->onDelete('cascade');
            
            $table->integer('cantidad');
            $table->string('importadora');
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

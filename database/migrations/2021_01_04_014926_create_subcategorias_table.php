<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();

            $table->unsignedBigInteger('categorias_id')->unsigned();
            $table->foreign('categorias_id')->references('id')->on('categorias')
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
        Schema::dropIfExists('subcategorias');
    }
}

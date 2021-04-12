<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->double('precio', 8, 2);
            $table->string('color')->nullable();
            $table->enum('confirmacion', ['true', 'false']);
            $table->string('codigo')->nullable();
            $table->string('imagen')->nullable();
            $table->string('importadora')->nullable();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('productos_id')->unsigned();
            $table->foreign('productos_id')->references('id')->on('productos')
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
        Schema::dropIfExists('favoritos');
    }
}

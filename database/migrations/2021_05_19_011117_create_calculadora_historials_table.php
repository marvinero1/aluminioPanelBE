<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculadoraHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculadora_historials', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->double('total_suma', 8,2)->nullable();
            $table->string('nombre_operacion')->nullable();
            $table->double('extra', 8,2)->nullable();
            $table->double('total_extra', 8,2)->nullable();

            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('calculadora_historials');
    }
}

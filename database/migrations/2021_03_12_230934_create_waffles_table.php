<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWafflesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waffles', function (Blueprint $table) {
            $table->id();

            $table->string('nombre')->unique();
            $table->string('codigo')->unique();
            $table->integer('stock');
            $table->string('image');
            $table->string('descripcion');
            $table->integer('precio');
            $table->enum('stado',['ACTIVO','DESACTIVADO'])->default('ACTIVO');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedBigInteger('prover_id');
            $table->foreign('prover_id')->references('id')->on('provers');

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
        Schema::dropIfExists('waffles');
    }
}

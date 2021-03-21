<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();

            $table->dateTime('fecha_compra');
            $table->integer('total');
            $table->string('picture');

            $table->enum('stado',['VALIDO','CANCELADO'])->default('VALIDO');

            $table->unsignedBigInteger('prover_id');
            $table->foreign('prover_id')->references('id')->on('provers');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('compras');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_compra', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');


            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id')->references('id')->on('compras');

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('waffles');

            $table->integer('total');
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
        Schema::dropIfExists('detalles_compra');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_detalles', function (Blueprint $table) {
            $table->id();


            $table->dateTime('fecha_venta');
            $table->integer('precio');
            $table->integer('descuento');
            $table->integer('cantidad');

                        
            $table->enum('estado',['VALIDO','CANCELADO'])->default('VALIDO');

            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->references('id')->on('ventas');

            $table->unsignedBigInteger('waffle_id');
            $table->foreign('waffle_id')->references('id')->on('waffles');

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
        Schema::dropIfExists('venta_detalles');
    }
}

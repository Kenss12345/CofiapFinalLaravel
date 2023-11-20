<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallepedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallepedidos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('idpedido')->nullable();
            $table->foreign('idpedido')
                ->references('id')
                ->on('pedidos')
                ->onDelete('set null')
                ->onUpdate('cascade');


            $table->unsignedBigInteger('idproducto')->nullable();
            $table->foreign('idproducto')
                ->references('id')
                ->on('productos')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->integer('cantidadsolitida');
            $table->decimal('precioUnitario',5,2);

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
        Schema::dropIfExists('detallepedidos');
    }
}

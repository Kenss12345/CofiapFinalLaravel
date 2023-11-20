<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('idcliente')->nullable();
            $table->foreign('idcliente')
                ->references('id')
                ->on('clientes')
                ->onDelete('set null')
                ->onUpdate('cascade');
            
            $table->date('fechapedido', 'd/m/Y');
            $table->date('fechaentrada', 'd/m/Y');
            $table->string('estadopedido', 1);
            $table->string('metodopago', 20);

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
        Schema::dropIfExists('pedidos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoInvernaderoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_invernadero', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('idproducto')->nullable();
            $table->foreign('idproducto')
                ->references('id')
                ->on('productos')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('idinvernadero')->nullable();
            $table->foreign('idinvernadero')
                ->references('id')
                ->on('invernaderos')
                ->onDelete('set null')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('producto_invernadero');
    }
}

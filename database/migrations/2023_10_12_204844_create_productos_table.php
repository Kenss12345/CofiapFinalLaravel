<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre',25);
            $table->decimal('precio', 5,2);
            $table->string('cantidadProducto',25);
            $table->string('loteProduccion', 4);
            $table->date('fechaCaducidad', 'd/m/Y');
            $table->string('clasificacion', 25)->default('Sin Clasificación');

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
        Schema::dropIfExists('productos');
    }
}

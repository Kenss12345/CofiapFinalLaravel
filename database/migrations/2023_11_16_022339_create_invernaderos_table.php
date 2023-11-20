<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvernaderosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invernaderos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 25);
            $table->string('direccion', 35);
            $table->string('area', 4);
            $table->date('fechainicio', 'd/m/Y');
            $table->string('responsable', 40);

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
        Schema::dropIfExists('invernaderos');
    }
}

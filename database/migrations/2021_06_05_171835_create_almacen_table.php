<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("articulo_id");
            $table->foreign("articulo_id")->references("id")->on("articulo");
            $table->integer("stock");
            $table->double("precio_venta");
            $table->tinyInteger("estado_almacen");
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
        Schema::dropIfExists('almacen');
    }
}
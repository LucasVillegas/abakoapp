<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("serie_articulo_id");
            $table->foreign("serie_articulo_id")->references("id")->on("serie_articulo");
            $table->unsignedBigInteger("servicio_id");
            $table->foreign("servicio_id")->references("id")->on("servicio");
            $table->string("codarticulo");
            $table->string("descripcion");
            $table->string("referencia");
            $table->string("medida");
            $table->double("costo");
            $table->double("precio_venta");
            $table->double("precio_minino");
            $table->double("ultimo_coste");
            $table->tinyInteger("estado_articulo");
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
        Schema::dropIfExists('articulo');
    }
}
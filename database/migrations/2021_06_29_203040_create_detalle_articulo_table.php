<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_articulo', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("articulo_id");
            $table->foreign("articulo_id")->references("id")->on("articulo");
            $table->unsignedBigInteger("componente_id");
            $table->foreign("componente_id")->references("id")->on("componente");
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
        Schema::dropIfExists('detalle_articulo');
    }
}
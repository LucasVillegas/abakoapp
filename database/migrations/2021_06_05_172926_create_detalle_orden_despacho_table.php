<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleOrdenDespachoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_orden_despacho', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer("orden_despacho_id");
            $table->integer("articulo_id");
            $table->integer("cantidad");
            $table->double("sub_total");
            $table->double("iva");
            $table->string("observacion", 255);
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
        Schema::dropIfExists('detalle_orden_despacho');
    }
}
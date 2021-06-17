<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenDespachoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_despacho', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("nunserie", 6);
            //$table->primary("nunserie");
            $table->unsignedBigInteger("cliente_id");
            $table->foreign("cliente_id")->references("id")->on("cliente");
            $table->unsignedBigInteger("users_id");
            $table->foreign("users_id")->references("id")->on("users");
            $table->unsignedBigInteger("forma_pago_id");
            $table->foreign("forma_pago_id")->references("id")->on("forma_pago");
            $table->unsignedBigInteger("conductor_id");
            $table->foreign("conductor_id")->references("id")->on("conductor");
            $table->decimal("nunpedido");
            $table->date("fecha_orden_despacho");
            $table->double("total_orden_despacho");
            $table->double("valor_flete");
            $table->decimal("peso");
            $table->tinyInteger("estado_orden_despacho");
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
        Schema::dropIfExists('orden_despacho');
    }
}
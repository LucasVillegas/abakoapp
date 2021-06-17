<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("cliente_id");
            $table->foreign("cliente_id")->references("id")->on("cliente");
            $table->unsignedBigInteger("users_id");
            $table->foreign("users_id")->references("id")->on("users");
            $table->double("nun_orden");
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->date("fecha_envio");
            $table->date("fecha_entrega");
            $table->tinyInteger("estado_orden");
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
        Schema::dropIfExists('orden');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componente', function (Blueprint $table) {
            $table->id()->autoIncrement();
            /* $table->unsignedBigInteger("articulo_id");
            $table->foreign("articulo_id")->references("id")->on("articulo"); */
            $table->string("descripcion_componente");
            $table->string("codigo_componente");
            $table->integer("referencia");
            $table->string("unidad");
            $table->decimal("medida");
            $table->double("ultimo_coste");
            $table->double("costo_total");
            $table->tinyInteger("estado_componente");
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
        Schema::dropIfExists('componente');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("tipo_servicio_id");
            $table->foreign("tipo_servicio_id")->references("id")->on("tipo_servicio");
            $table->unsignedBigInteger("trabajador_id");
            $table->foreign("trabajador_id")->references("id")->on("trabajador");
            $table->string("descripcion_servicio", 255);
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->double("costo_supuesto");
            $table->double("costo_real");
            $table->double("dif_costo");
            $table->tinyInteger("estado_Servicio");
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
        Schema::dropIfExists('servicio');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("identificacion");
            $table->string("nombre");
            $table->string("apellido");
            $table->string("telefono");
            $table->string("direccion");
            $table->string("genero");
            $table->tinyInteger("estado_persona");
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
        Schema::dropIfExists('_persona');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("persona_id");
            $table->foreign("persona_id")->references("id")->on("persona")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->double('nit');
            $table->string('rut');
            $table->string('organizacion');
            $table->string('correo')->unique();
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
        Schema::dropIfExists('proveedor');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductor', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger("persona_id");
            $table->foreign("persona_id")->references("id")->on("persona")
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->double("salario");
            $table->string("transportadora");
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
        Schema::dropIfExists('conductor');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOriginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('origins', function (Blueprint $table) {
            $table->id();
            $table->string('direcciones_guardadas')->nullable();
            $table->string('nombre')->nullable();
            $table->string('empresa')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('pais')->nullable();
            $table->string('calle')->nullable();
            $table->string('numero')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('zona')->nullable();
            $table->string('referencia')->nullable();
            $table->string('origin')->nullable();
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
        Schema::dropIfExists('origins');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestiniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinies', function (Blueprint $table) {
            $table->id();
            $table->string('direcciones_guardadas')->nullable();
            $table->string('nombre')->nullable();
            $table->string('empresa')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('pais')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('localidad')->nullable();
            $table->string('barrio')->nullable();
            $table->string('direccion')->nullable();
            $table->string('referencia')->nullable();
            
            $table->unsignedBigInteger('guide_id')
            ->nullable();
            $table->foreign('guide_id')
            ->references('id')
            ->on('guides');
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
        Schema::dropIfExists('destinies');
    }
}

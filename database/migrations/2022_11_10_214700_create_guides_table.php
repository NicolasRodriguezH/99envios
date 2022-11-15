<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_de_envio');
            $table->string('paquetes_guardados');
            $table->string('contenido');
            $table->string('unidad');
            $table->string('valor_agregado');
            $table->string('cantidad_de_paquetes');
            $table->string('largo');
            $table->string('ancho');
            $table->string('altura');
            $table->string('peso');
            $table->string('seguro');
            $table->string('pago_contraentrega');
            $table->string('recogida_de_envio');
            $table->string('urlguia');
            $table->string('origin');
            $table->string('destiny');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
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
        Schema::dropIfExists('guides');
    }
}

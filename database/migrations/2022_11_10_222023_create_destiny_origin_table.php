<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinyOriginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destiny_origin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin_id')
            ->nullable();
            $table->foreign('origin_id')
            ->references('id')
            ->on('origins');

            $table->unsignedBigInteger('destiny_id')
            ->nullable();
            $table->foreign('destiny_id')
            ->references('id')
            ->on('destinies');
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
        Schema::dropIfExists('destiny_origin');
    }
}

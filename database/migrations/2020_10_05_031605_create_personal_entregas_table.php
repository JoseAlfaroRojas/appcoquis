<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_entregas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->unsignedInteger('vehiculo_id');

            $table->timestamps();

            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign('personal_entregas_vehiculo_id_foreign');
        });
        Schema::dropIfExists('personal_entregas');
    }
}

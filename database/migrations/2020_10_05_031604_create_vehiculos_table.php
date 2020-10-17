<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plate');
            $table->string('model');

            $table->unsignedInteger('tipovehiculo_id');
            $table->unsignedInteger('marca_id');

            $table->timestamps();

            $table->foreign('tipovehiculo_id')->references('id')->on('tipovehiculos');
            $table->foreign('marca_id')->references('id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehiculos', function (Blueprint $table) {
            $table->dropForeign('vehiculos_tipovehiculo_id_foreign');
            $table->dropForeign('vehiculos_marca_id_foreign');
        });
        Schema::dropIfExists('vehiculos');
    }
}

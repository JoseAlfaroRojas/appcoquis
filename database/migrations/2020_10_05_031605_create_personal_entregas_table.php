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
            $table->string('email')->unique();
            $table->string('name');
            $table->string('telephone_number');

            $table->unsignedInteger('vehiculo_id');
            $table->unsignedInteger('estadousuario_id');

            $table->timestamps();

            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            $table->foreign('estadousuario_id')->references('id')->on('estadousuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_entregas', function (Blueprint $table) {
            $table->dropForeign('personal_entregas_vehiculo_id_foreign');
        });
        Schema::dropIfExists('personal_entregas');
    }
}

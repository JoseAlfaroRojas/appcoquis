<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->double('price', 10, 2);
            $table->string('photo', 500)->nullable();;

            $table->unsignedInteger('clasificacion_id');
            $table->unsignedInteger('estadoproducto_id');

            $table->timestamps();

            $table->foreign('clasificacion_id')->references('id')->on('clasificacions');
            $table->foreign('estadoproducto_id')->references('id')->on('estadoproductos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('productos_clasificacion_id_foreign');
            $table->dropForeign('productos_estadoproducto_id_foreign');
        });
        Schema::dropIfExists('productos');
    }
}

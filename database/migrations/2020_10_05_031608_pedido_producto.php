<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PedidoProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_producto', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('pedido_id');

            $table->integer('amount');
            $table->double('total', 14, 2);

            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido_producto', function (Blueprint $table) {
            $table->dropForeign('pedido_producto_producto_id_foreign');
            $table->dropForeign('pedido_producto_pedido_id_foreign');
        });
        Schema::dropIfExists('pedido_producto');
    }
}

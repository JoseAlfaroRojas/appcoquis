<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->double('total', 14, 2);

            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('pedido_id');

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
        Schema::table('producto_pedido', function (Blueprint $table) {
            $table->dropForeign('producto_pedido_producto_id_foreign');
            $table->dropForeign('producto_pedido_pedido_id_foreign');
        });
        Schema::dropIfExists('producto_pedido');
    }
}

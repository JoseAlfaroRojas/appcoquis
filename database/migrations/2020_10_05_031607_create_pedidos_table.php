<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('instructions');

            $table->double('cost_shipping', 14, 2)->default(0);
            $table->double('discount', 14, 2)->default(0);
            $table->double('tax', 14, 2);
            $table->double('subtotal', 14, 2);
            $table->double('total', 14, 2);

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('personal_entrega_id');
            $table->unsignedInteger('tipoentrega_id');
            $table->unsignedInteger('estadopedido_id');
            $table->unsignedInteger('direccion_id');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('personal_entrega_id')->references('id')->on('personal_entregas');
            $table->foreign('tipoentrega_id')->references('id')->on('tipoentregas');
            $table->foreign('estadopedido_id')->references('id')->on('estadopedidos');
            $table->foreign('direccion_id')->references('id')->on('direccions');
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
            $table->dropForeign('pedidos_client_id_foreign');
            $table->dropForeign('pedidos_personal_entrega_id');
            $table->dropForeign('pedidos_tipoentrega_id_foreign');
            $table->dropForeign('pedidos_estadopedido_id_foreign');
            $table->dropForeign('pedidos_direccion_id_foreign');
        });
        Schema::dropIfExists('pedidos');
    }
}

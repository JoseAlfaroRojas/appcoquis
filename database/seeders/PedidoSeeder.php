<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //1
        $Pedido = new \App\Models\Pedido();
        $Pedido->instructions = 'Sin cebolla';
        $Pedido->cost_shipping = 1500;
        $Pedido->discount = 0;
        $Pedido->tax = 400;
        $Pedido->subtotal = 6990;
        $Pedido->total = 7390;
        $Pedido->client_id = 1;
        $Pedido->dealer_id = 3;
        $Pedido->vehiculo_id = 2;
        $Pedido->tipoentrega_id = 1;
        $Pedido->estadopedido_id = 1;
        $Pedido->direccion_id = 1;
        $Pedido->save();
        $Pedido->productos()->attach([1]);

        //2
        $Pedido = new \App\Models\Pedido();
        $Pedido->instructions = 'Extra queso';
        $Pedido->cost_shipping = 1500;
        $Pedido->discount = 0;
        $Pedido->tax = 400;
        $Pedido->subtotal = 16990;
        $Pedido->total = 17390;
        $Pedido->client_id = 2;
        $Pedido->dealer_id = 2;
        $Pedido->vehiculo_id = 2;
        $Pedido->tipoentrega_id = 1;
        $Pedido->estadopedido_id = 2;
        $Pedido->direccion_id = 3;
        $Pedido->save();
        $Pedido->productos()->attach([1, 2, 3]);

        //3
        $Pedido = new \App\Models\Pedido();
        $Pedido->instructions = 'Doble torta';
        $Pedido->cost_shipping = 0;
        $Pedido->discount = 300;
        $Pedido->tax = 400;
        $Pedido->subtotal = 11150;
        $Pedido->total = 13450;
        $Pedido->client_id = 1;
        $Pedido->dealer_id = 3;
        $Pedido->vehiculo_id = 3;
        $Pedido->tipoentrega_id = 2;
        $Pedido->estadopedido_id = 3;
        $Pedido->direccion_id = 2;
        $Pedido->save();
        $Pedido->productos()->attach([1, 3]);
    }
}

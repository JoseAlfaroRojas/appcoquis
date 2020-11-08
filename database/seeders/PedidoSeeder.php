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
        $Pedido->client_name = 'Carl Johnson';
        $Pedido->client_telephone_number = '85954262';
        $Pedido->address = 'Grove Street';
        $Pedido->cost_shipping = 1500;
        $Pedido->discount = 0;
        $Pedido->tax = 400;
        $Pedido->subtotal = 6990;
        $Pedido->total = 7390;
        $Pedido->user_id = 1;
        $Pedido->personal_entrega_id = 3;
        $Pedido->tipoentrega_id = 1;
        $Pedido->estadopedido_id = 1;

        $Pedido->save();
        $Pedido->productos()->attach(1, ['amount' => 1, 'total' => 2000]);


        //2
        $Pedido = new \App\Models\Pedido();
        $Pedido->instructions = 'Extra queso';
        $Pedido->client_name = 'Jean Ramírez';
        $Pedido->client_telephone_number = '85235257';
        $Pedido->address = 'El bosque, Tambor, Alajuela';
        $Pedido->cost_shipping = 1500;
        $Pedido->discount = 0;
        $Pedido->tax = 400;
        $Pedido->subtotal = 16990;
        $Pedido->total = 17390;
        $Pedido->user_id = 2;
        $Pedido->personal_entrega_id = 2;
        $Pedido->tipoentrega_id = 1;
        $Pedido->estadopedido_id = 2;

        $Pedido->save();
        $Pedido->productos()->attach(1, ['amount' => 3, 'total' => 2000]);
        $Pedido->productos()->attach(2, ['amount' => 7, 'total' => 8000]);
        $Pedido->productos()->attach(3, ['amount' => 6, 'total' => 10000]);


        //3
        $Pedido = new \App\Models\Pedido();
        $Pedido->instructions = 'Doble torta';
        $Pedido->client_name = 'Julio (Mi niño)';
        $Pedido->client_telephone_number = '63449321';
        $Pedido->address = 'La casa de maraña';
        $Pedido->cost_shipping = 0;
        $Pedido->discount = 300;
        $Pedido->tax = 400;
        $Pedido->subtotal = 11150;
        $Pedido->total = 13450;
        $Pedido->user_id = 1;
        $Pedido->personal_entrega_id = 3;
        $Pedido->tipoentrega_id = 2;
        $Pedido->estadopedido_id = 3;

        $Pedido->save();
        $Pedido->productos()->attach(1, ['amount' => 2, 'total' => 2000]);
        $Pedido->productos()->attach(3, ['amount' => 5, 'total' => 5000]);
    }
}

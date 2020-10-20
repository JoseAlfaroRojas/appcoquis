<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estadopedido;

class EstadoPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Estadopedido = new Estadopedido();
        $Estadopedido->name = 'Por facturar';
        $Estadopedido->save();

        //2
        $Estadopedido = new Estadopedido();
        $Estadopedido->name = 'En proceso';
        $Estadopedido->save();

        //2
        $Estadopedido = new Estadopedido();
        $Estadopedido->name = 'Facturado';
        $Estadopedido->save();

    }
}

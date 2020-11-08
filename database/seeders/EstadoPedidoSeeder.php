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
        $Estadopedido->name = 'Pendiente';
        $Estadopedido->save();

        //2
        $Estadopedido = new Estadopedido();
        $Estadopedido->name = 'En preparación';
        $Estadopedido->save();

        //3
        $Estadopedido = new Estadopedido();
        $Estadopedido->name = 'Listo para entregar';
        $Estadopedido->save();

        //4
        $Estadopedido = new Estadopedido();
        $Estadopedido->name = 'Listo para retirar';
        $Estadopedido->save();

        //5
        $Estadopedido = new Estadopedido();
        $Estadopedido->name = 'Facturado';
        $Estadopedido->save();

        //6
        $Estadopedido = new Estadopedido();
        $Estadopedido->name = 'Completado';
        $Estadopedido->save();
    }
}

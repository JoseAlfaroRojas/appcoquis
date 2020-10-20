<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Vehiculo = new \App\Models\Vehiculo();
        $Vehiculo->plate = 'ISW-420';
        $Vehiculo->model = '2020';
        $Vehiculo->tipovehiculo_id = 2;
        $Vehiculo->marca_id = 3;
        $Vehiculo->save();

        //2
        $Vehiculo = new \App\Models\Vehiculo();
        $Vehiculo->plate = 'BMX-666';
        $Vehiculo->model = '2012';
        $Vehiculo->tipovehiculo_id = 1;
        $Vehiculo->marca_id = 2;
        $Vehiculo->save();

        //3
        $Vehiculo = new \App\Models\Vehiculo();
        $Vehiculo->plate = 'BRKVFRS2S';
        $Vehiculo->model = '2018';
        $Vehiculo->tipovehiculo_id = 3;
        $Vehiculo->marca_id = 1;
        $Vehiculo->save();
    }
}

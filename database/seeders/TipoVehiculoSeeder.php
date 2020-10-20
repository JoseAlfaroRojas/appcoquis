<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipoVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Tipovehiculo = new \App\Models\Tipovehiculo();
        $Tipovehiculo->name = 'Motocicleta';
        $Tipovehiculo->save();

        //2
        $Tipovehiculo = new \App\Models\Tipovehiculo();
        $Tipovehiculo->name = 'Automovil';
        $Tipovehiculo->save();

        //3
        $Tipovehiculo = new \App\Models\Tipovehiculo();
        $Tipovehiculo->name = 'Bici-Moto';
        $Tipovehiculo->save();
    }
}

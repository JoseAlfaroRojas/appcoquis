<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DireccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Direccion = new \App\Models\Direccion();
        $Direccion->description = 'Alajuela, Pueblo Nuevo, Bunker#3';
        $Direccion->user_id = 1;
        $Direccion->save();

        //2
        $Direccion = new \App\Models\Direccion();
        $Direccion->description = 'San José, Escazú';
        $Direccion->user_id = 2;
        $Direccion->save();

        //3
        $Direccion = new \App\Models\Direccion();
        $Direccion->description = 'Heredia, Belén';
        $Direccion->user_id = '3';
        $Direccion->save();
    }
}

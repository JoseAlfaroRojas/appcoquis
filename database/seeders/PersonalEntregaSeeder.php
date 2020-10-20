<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonalEntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $PersonalEntrega = new \App\Models\PersonalEntrega();
        $PersonalEntrega->name = 'Miguelito Piedra';
        $PersonalEntrega->vehiculo_id = 3;
        $PersonalEntrega->save();

        //2
        $PersonalEntrega = new \App\Models\PersonalEntrega();
        $PersonalEntrega->name = 'Billy Perry';
        $PersonalEntrega->vehiculo_id = 2;
        $PersonalEntrega->save();

        //3
        $PersonalEntrega = new \App\Models\PersonalEntrega();
        $PersonalEntrega->name = 'Marcelo Prieto';
        $PersonalEntrega->vehiculo_id = 1;
        $PersonalEntrega->save();
    }
}

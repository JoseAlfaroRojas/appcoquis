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
        $PersonalEntrega->email = 'migpiedrerex@gmail.com';
        $PersonalEntrega->name = 'Miguelito Piedra';
        $PersonalEntrega->telephone_number = '69525723';
        $PersonalEntrega->vehiculo_id = 3;
        $PersonalEntrega->estadousuario_id = 1;
        $PersonalEntrega->save();

        //2
        $PersonalEntrega = new \App\Models\PersonalEntrega();
        $PersonalEntrega->email = 'followtheleader@hotmail.com';
        $PersonalEntrega->name = 'Billy Perry';
        $PersonalEntrega->telephone_number = '62517896';
        $PersonalEntrega->vehiculo_id = 2;
        $PersonalEntrega->estadousuario_id = 2;
        $PersonalEntrega->save();

        //3
        $PersonalEntrega = new \App\Models\PersonalEntrega();
        $PersonalEntrega->email = 'prietex@utn.ac.cr';
        $PersonalEntrega->name = 'Marcelo Prieto';
        $PersonalEntrega->telephone_number = '84722691';
        $PersonalEntrega->vehiculo_id = 1;
        $PersonalEntrega->estadousuario_id = 1;
        $PersonalEntrega->save();

        //4
        $PersonalEntrega = new \App\Models\PersonalEntrega();
        $PersonalEntrega->email = 'chocokrispis@gmail.com';
        $PersonalEntrega->name = 'Mélvin Núñez';
        $PersonalEntrega->telephone_number = '83698425';
        $PersonalEntrega->vehiculo_id = 3;
        $PersonalEntrega->estadousuario_id = 1;
        $PersonalEntrega->save();
    }
}

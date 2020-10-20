<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class CalificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Calificacion = new \App\Models\Calificacion();
        $Calificacion->value = 5;
        $Calificacion->producto_id = 1;
        $Calificacion->user_id = 1;
        $Calificacion->save();

        //2
        $Calificacion = new \App\Models\Calificacion();
        $Calificacion->value = 3;
        $Calificacion->producto_id = 3;
        $Calificacion->user_id = 2;
        $Calificacion->save();

        //3
        $Calificacion = new \App\Models\Calificacion();
        $Calificacion->value = 4;
        $Calificacion->producto_id = 2;
        $Calificacion->user_id = 1;
        $Calificacion->save();
    }
}

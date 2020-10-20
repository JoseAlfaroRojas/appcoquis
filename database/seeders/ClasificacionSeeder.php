<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clasificacion;

class ClasificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Clasificacion = new Clasificacion();
        $Clasificacion->name = 'Res';
        $Clasificacion->save();

        //2
        $Clasificacion = new Clasificacion();
        $Clasificacion->name = 'Cerdo';
        $Clasificacion->save();

        //3
        $Clasificacion = new Clasificacion();
        $Clasificacion->name = 'Vegetariano';
        $Clasificacion->save();
    }
}

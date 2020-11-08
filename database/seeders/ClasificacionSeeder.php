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
        $Clasificacion->name = 'Platillo';
        $Clasificacion->save();

        //2
        $Clasificacion = new Clasificacion();
        $Clasificacion->name = 'Refresco';
        $Clasificacion->save();

        //3
        $Clasificacion = new Clasificacion();
        $Clasificacion->name = 'Extra';
        $Clasificacion->save();
    }
}

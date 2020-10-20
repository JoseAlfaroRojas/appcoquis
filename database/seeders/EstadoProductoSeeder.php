<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estadoproducto;

class EstadoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Estadoproducto = new Estadoproducto();
        $Estadoproducto->name = 'Activo';
        $Estadoproducto->save();

        //2
        $Estadoproducto = new Estadoproducto();
        $Estadoproducto->name = 'Inactivo';
        $Estadoproducto->save();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipoentrega;

class TipoEntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Tipoentrega = new Tipoentrega();
        $Tipoentrega->name = 'Express';
        $Tipoentrega->save();

        //2
        $Tipoentrega = new Tipoentrega();
        $Tipoentrega->name = 'Presencial';
        $Tipoentrega->save();
    }
}

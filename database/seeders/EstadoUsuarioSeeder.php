<?php

namespace Database\Seeders;

use App\Models\Estadousuario;
use Illuminate\Database\Seeder;

class EstadoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Estadousuario = new Estadousuario();
        $Estadousuario->name = 'Habilitado';
        $Estadousuario->save();

        //2
        $Estadousuario = new Estadousuario();
        $Estadousuario->name = 'Deshabilitado';
        $Estadousuario->save();
    }
}

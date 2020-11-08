<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Categoria = new Categoria();
        $Categoria->name = 'Hamburguesa';
        $Categoria->save();

        //2
        $Categoria = new Categoria();
        $Categoria->name = 'Carne de res';
        $Categoria->save();

        //3
        $Categoria = new Categoria();
        $Categoria->name = 'Carne de cerdo';
        $Categoria->save();

        //4
        $Categoria = new Categoria();
        $Categoria->name = 'Pollo';
        $Categoria->save();

        //5
        $Categoria = new Categoria();
        $Categoria->name = 'Verdura';
        $Categoria->save();

        //6
        $Categoria = new Categoria();
        $Categoria->name = 'Ensalada';
        $Categoria->save();

        //7
        $Categoria = new Categoria();
        $Categoria->name = 'Dip';
        $Categoria->save();

        //8
        $Categoria = new Categoria();
        $Categoria->name = 'Gaseosa';
        $Categoria->save();

        //9
        $Categoria = new Categoria();
        $Categoria->name = 'Natural';
        $Categoria->save();
    }
}

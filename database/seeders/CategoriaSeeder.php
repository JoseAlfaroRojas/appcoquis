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
        $Categoria->name = 'Verduras';
        $Categoria->save();

        //2
        $Categoria = new Categoria();
        $Categoria->name = 'Carnes y huevos';
        $Categoria->save();

        //3
        $Categoria = new Categoria();
        $Categoria->name = 'Legumbres';
        $Categoria->save();

    }
}

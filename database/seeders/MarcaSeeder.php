<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $marca = new \App\Models\Marca();
        $marca->name = 'Toyota';
        $marca->save();

        //2
        $marca = new \App\Models\Marca();
        $marca->name = 'Honda';
        $marca->save();

        //3
        $marca = new \App\Models\Marca();
        $marca->name = 'BMW';
        $marca->save();
    }
}

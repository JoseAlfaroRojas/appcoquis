<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $Producto = new \App\Models\Producto();
        $Producto->name = 'Veggie Burguer';
        $Producto->description = 'Torta a base de garbanzos y especias mixtas, queso mozarella, zuchini a la parrilla, cebolla caramelizada, albahaca fresca, y aderezo de pepinillo boom.';
        $Producto->price = 4950;
        $Producto->photo = 'NA';
        $Producto->clasificacion_id = 3;
        $Producto->estadoproducto_id = 1;
        $Producto->save();
        $Producto->categorias()->attach([1, 3]);

        //2
        $Producto = new \App\Models\Producto();
        $Producto->name = 'Coquis fries';
        $Producto->description = 'Papas fritas con tocino crocante, mucho chedar, cebollino fino y prapika.';
        $Producto->price = 3500;
        $Producto->photo = 'NA';
        $Producto->clasificacion_id = 2;
        $Producto->estadoproducto_id = 1;
        $Producto->save();
        $Producto->categorias()->attach([1, 2]);

        //3
        $Producto = new \App\Models\Producto();
        $Producto->name = 'Urban Burguer';
        $Producto->description = 'Torta de res angus a la parrilla, queso amarillo, aros de cebolla morada, ruedas de pepinillos, cebolla caramelizada, coronada con tocineta, crocante y huevo frito suave + Aderezo Mayostaza.';
        $Producto->price = 4950;
        $Producto->photo = 'NA';
        $Producto->clasificacion_id = 1;
        $Producto->estadoproducto_id = 1;
        $Producto->save();
        $Producto->categorias()->attach([2, 3]);
    }
}

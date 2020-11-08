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
        $Producto->photo = 'https://instagram.fsyq1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s750x750/118465717_173851420859356_4414292622694130824_n.jpg?_nc_ht=instagram.fsyq1-1.fna.fbcdn.net&_nc_cat=104&_nc_ohc=h2O6NRODr4UAX9SiOfB&_nc_tp=24&oh=d23078d0d7ce356eb5c35757415a7280&oe=5FCA10B3';
        $Producto->clasificacion_id = 1;
        $Producto->estadoproducto_id = 1;
        $Producto->save();
        $Producto->categorias()->attach([1, 5]);

        //2
        $Producto = new \App\Models\Producto();
        $Producto->name = 'Coquis fries';
        $Producto->description = 'Papas fritas con tocino crocante, mucho chedar, cebollino fino y prapika.';
        $Producto->price = 3500;
        $Producto->photo = 'https://instagram.fsyq1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s750x750/106022323_1328424647548473_57356304120549057_n.jpg?_nc_ht=instagram.fsyq1-1.fna.fbcdn.net&_nc_cat=109&_nc_ohc=Hos8uPeI-gEAX8Na4-A&_nc_tp=24&oh=a75ce07aa0d024e67c71d39c8a9cf865&oe=5FC75288';
        $Producto->clasificacion_id = 3;
        $Producto->estadoproducto_id = 2;
        $Producto->save();
        $Producto->categorias()->attach([1, 2]);

        //3
        $Producto = new \App\Models\Producto();
        $Producto->name = 'Urban Burguer';
        $Producto->description = 'Torta de res angus a la parrilla, queso amarillo, aros de cebolla morada, ruedas de pepinillos, cebolla caramelizada, coronada con tocineta, crocante y huevo frito suave + Aderezo Mayostaza.';
        $Producto->price = 4950;
        $Producto->photo = 'https://instagram.fsyq1-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s750x750/106231563_594022471249292_5342358063767304765_n.jpg?_nc_ht=instagram.fsyq1-1.fna.fbcdn.net&_nc_cat=108&_nc_ohc=OvQcApavl4oAX91YuBo&_nc_tp=24&oh=d6513f3fa591227d1901733060f45e83&oe=5FC78E66';
        $Producto->clasificacion_id = 1;
        $Producto->estadoproducto_id = 1;
        $Producto->save();
        $Producto->categorias()->attach([1, 2]);
    }
}

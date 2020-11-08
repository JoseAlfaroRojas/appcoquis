<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $objetoUsuario = User::create([
            'name' => 'Jose Mario',
            'email' => 'correo1@prueba.com',
            'password' => bcrypt('123456'),
            'telephone_number' => '11223344',
            'photo' => 'NA',
            'rol_id' => 1,
            'estadousuario_id' => 2
        ]);
        $objetoUsuario->save();

        //2
        $objetoUsuario = User::create([
            'name' => 'Sleepy Joe Biden',
            'email' => 'correo2@prueba.com',
            'password' => bcrypt('123456'),
            'telephone_number' => '99887766',
            'photo' => 'NA',
            'rol_id' => 1,
            'estadousuario_id' => 1
        ]);
        $objetoUsuario->save();

        //3
        $objetoUsuario = User::create([
            'name' => 'Cliente',
            'email' => 'correo3@prueba.com',
            'password' => bcrypt('123456'),
            'telephone_number' => '22334455',
            'photo' => 'NA',
            'rol_id' => 2,
            'estadousuario_id' => 1
        ]);
        $objetoUsuario->save();
    }
}

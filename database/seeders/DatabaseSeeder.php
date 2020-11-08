<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(EstadoUsuarioSeeder::class);
        $this->call(EstadoPedidoSeeder::class);
        $this->call(EstadoProductoSeeder::class);

        $this->call(MarcaSeeder::class);
        $this->call(TipoEntregaSeeder::class);
        $this->call(TipoVehiculoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(ClasificacionSeeder::class);
        $this->call(CategoriaSeeder::class);

        $this->call(VehiculoSeeder::class);
        $this->call(PersonalEntregaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(PedidoSeeder::class);
    }
}

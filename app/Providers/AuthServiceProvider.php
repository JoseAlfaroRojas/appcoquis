<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

        Passport::tokensCan([
            'Administrador' => 'Gestión de pedidos y usuarios, registro de productos.  Generación de reportes.',
            'Vendedor' => 'Ver el menú y realizar pedidos.',
        ]);
        Passport::setDefaultScope([
            'Vendedor'
        ]);
    }
}

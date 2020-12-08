<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RolController;
use App\Http\Controllers\EstadousuarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EstadoproductoController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\ClasificacionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EstadopedidoController;
use App\Http\Controllers\TipoentregaController;
use App\Http\Controllers\TipovehiculoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\PersonalEntregaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//http://127.0.0.1:8000/v1/
Route::group(['prefix' => 'v1'], function () {
    //coquis/
    Route::group(['prefix' => 'coquis'], function () {
        //auth/
        Route::group(['prefix' => 'auth'], function ($router) {
            //register/
            Route::post('register', [AuthController::class, 'register']);
            //login/
            Route::post('login', [AuthController::class, 'login']);
            //logout/
            Route::post('logout', [AuthController::class, 'logout']);
        });

        //users/
        Route::group([
            'prefix' => 'users'
        ], function ($router) {
            //-/
            Route::get('', [UserController::class, 'index'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
            //user/#
            Route::get('user/{id}', [UserController::class, 'show'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
            //roles/
            Route::group(['prefix' => 'roles'], function ($router) {
                //-/
                Route::get('', [RolController::class, 'index']);
                //rol/#
                Route::get('rol/{id}', [RolController::class, 'show']);
            });
            //estado-user/
            Route::get('estado-user', [EstadousuarioController::class, 'index']);
        });

        //productos/
        Route::group(['prefix' => 'productos'], function ($router) {
            //-/
            Route::get('', [ProductoController::class, 'index'])->middleware(['auth:api']);
            //store/
            Route::post('store', [ProductoController::class, 'store'])->middleware(['auth:api', 'scope:Administrador']);
            //update/
            Route::patch('update/{id}', [ProductoController::class, 'update'])->middleware(['auth:api', 'scope:Administrador']);
            //producto/#
            Route::get('producto/{id}', [ProductoController::class, 'show'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
            //categorias/
            Route::group(['prefix' => 'categorias'], function ($router) {
                //-/#
                Route::get('', [CategoriaController::class, 'index'])->middleware(['auth:api']);
                //categoria/#
                Route::get('categoria/{id}', [CategoriaController::class, 'show'])->middleware(['auth:api']);
            });
            //estado-producto/
            Route::get('estado-producto', [EstadoproductoController::class, 'index'])->middleware(['auth:api']);
            //clasificaciones/
            Route::get('clasificaciones', [ClasificacionController::class, 'index'])->middleware(['auth:api']);
            //clasificacion/#
            Route::get('clasificacion/{id}', [ClasificacionController::class, 'show'])->middleware(['auth:api']);
        });

        //pedidos/
        Route::group(['prefix' => 'pedidos'], function ($router) {
            //-/
            Route::get('', [PedidoController::class, 'index'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
            //store/
            Route::post('store', [PedidoController::class, 'store'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
            //update/
            Route::patch('update/{id}', [PedidoController::class, 'update'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
            //pedido/#
            Route::get('pedido/{id}', [PedidoController::class, 'show'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
            //personal-de-entrega/
            Route::group(['prefix' => 'personal-de-entrega'], function ($router) {
                //-/
                Route::get('', [PersonalEntregaController::class, 'index'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
                //store/
                Route::post('store', [PersonalEntregaController::class, 'store'])->middleware(['auth:api', 'scope:Administrador']);
                //update/
                Route::patch('update/{id}', [PersonalEntregaController::class, 'update'])->middleware(['auth:api', 'scope:Administrador']);
                //repartidor/#
                Route::get('repartidor/{id}', [PersonalEntregaController::class, 'show'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
                //vehiculos/
                Route::group(['prefix' => 'vehiculos'], function ($router) {
                    //-/
                    Route::get('', [VehiculoController::class, 'index'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
                    //vehiculo/#
                    Route::get('vehiculo/{id}', [VehiculoController::class, 'show'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
                    //marcas/
                    Route::get('marcas', [MarcaController::class, 'index'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
                    //tipo-vehiculo/
                    Route::get('tipo-vehiculo', [TipovehiculoController::class, 'index'])->middleware(['auth:api', 'scope:Administrador,Vendedor']);
                });
            });
            //estado-pedido/
            Route::get('estado-pedido', [EstadopedidoController::class, 'index']);
            //tipos-entrega/
            Route::get('tipos-entrega', [TipoentregaController::class, 'index']);
        });
    });
});

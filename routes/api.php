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
            Route::get('', [UserController::class, 'index']);
            //user/#
            Route::get('user/{id}', [UserController::class, 'show'])->middleware(['auth:api']);
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
            Route::get('', [ProductoController::class, 'index']);
            //store/
            Route::post('store', [ProductoController::class, 'store'])->middleware(['auth:api']);
            //update/
            Route::patch('update/{id}', [ProductoController::class, 'update'])->middleware(['auth:api']);
            //producto/#
            Route::get('producto/{id}', [ProductoController::class, 'show']);
            //categorias/
            Route::group(['prefix' => 'categorias'], function ($router) {
                //-/#
                Route::get('', [CategoriaController::class, 'index']);
                //categoria/#
                Route::get('categoria/{id}', [CategoriaController::class, 'show']);
            });
            //estado-producto/
            Route::get('estado-producto', [EstadoproductoController::class, 'index']);
            //clasificaciones/
            Route::get('clasificaciones', [ClasificacionController::class, 'index']);
            //clasificacion/#
            Route::get('clasificacion/{id}', [ClasificacionController::class, 'show']);
        });

        //pedidos/
        Route::group(['prefix' => 'pedidos'], function ($router) {
            //-/
            Route::get('', [PedidoController::class, 'index']);
            //store/
            Route::get('store', [PedidoController::class, 'store'])->middleware(['auth:api']);
            //pedido/#
            Route::get('pedido/{id}', [PedidoController::class, 'show']);
            //personal-de-entrega/
            Route::group(['prefix' => 'personal-de-entrega'], function ($router) {
                //-/
                Route::get('', [PersonalEntregaController::class, 'index']);
                //store/
                Route::post('store', [PersonalEntregaController::class, 'store'])->middleware(['auth:api']);
                //update/
                Route::patch('update/{id}', [PersonalEntregaController::class, 'update'])->middleware(['auth:api']);
                //repartidor/#
                Route::get('repartidor/{id}', [PersonalEntregaController::class, 'show']);
                //vehiculos/
                Route::group(['prefix' => 'vehiculos'], function ($router) {
                    //-/
                    Route::get('', [VehiculoController::class, 'index']);
                    //vehiculo/#
                    Route::get('vehiculo/{id}', [VehiculoController::class, 'show']);
                    //marcas/
                    Route::get('marcas', [MarcaController::class, 'index']);
                    //tipo-vehiculo/
                    Route::get('tipo-vehiculo', [TipovehiculoController::class, 'index']);
                });
            });
            //estado-pedido/
            Route::get('estado-pedido', [EstadopedidoController::class, 'index']);
            //tipos-entrega/
            Route::get('tipos-entrega', [TipoentregaController::class, 'index']);
        });
    });
});

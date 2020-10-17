<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

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
        //users/
        Route::group([
            'prefix' => 'users'
        ], function ($router) {
            //-/
            Route::get('', [UserController::class, 'index']);
            //user/#
            Route::post('user/{id}', [UserController::class, 'show']);
            //login/
            Route::post('login', [UserController::class, 'login']);
            //register/
            Route::post('register', [UserController::class, 'register']);
            //logout/
            Route::post('logout', [UserController::class, 'logout']);

            //roles/
            Route::group(['prefix' => 'roles'], function ($router) {
                //-/
                Route::get('', [RolController::class, 'index']);
                //rol/#
                Route::get('rol/{id}', [RolController::class, 'show']);
            });

            //direcciones/
            Route::group(['prefix' => 'direcciones'], function ($router) {
                //user/#
                //Route::get('user/{id}', [DireccionController::class, 'index']);
                //direccion/#
                Route::get('direccion/{id}', [DireccionController::class, 'show']);
            });
        });

        //productos/
        Route::group(['prefix' => 'productos'], function ($router) {
            //-/
            Route::get('', [ProductoController::class, 'index']);
            //producto/#
            Route::get('producto/{id}', [ProductoController::class, 'show']);
            //categorias/
            Route::group(['prefix' => 'categorias'], function ($router) {
                //-/#
                Route::get('', [CategoriaController::class, 'index']);
                //categoria/#
                Route::get('categoria/{id}', [CategoriaController::class, 'show']);
            });
        });
    });
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{BookController, TypeController, UserController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas API para su aplicación. Estas
| RouteServiceProvider carga las rutas dentro de un grupo que
| se le asigna el grupo de middleware "api". ¡Disfruta construyendo tu API!
|
*/

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);



Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('types',TypeController::class);
    Route::apiResource('books',BookController::class);
});


//instalar passport

/*
 *composer require laravel/passport
 * archivo config/a.php 
 *  providers
 *      Laravel\Passport\PassportServiceProvider::class, 
 * ejecutamos las migraciones
 * php artisan passport:install
 * 
 * app/providers
 *   AuthServiceProvider.php
 *      en funcion boot
 *          Passport::routes();
 * 
 * config/auth.php
 *      api
 *          driver = passport
 * 
 * 
 * 
 */
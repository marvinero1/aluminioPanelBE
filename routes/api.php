<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Categoria;
use App\Producto;
use App\Http\Controllers\ProductoController;
//use App\Http\Controllers\Api\LoginController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::group(['middleware' => ['auth:api']], function(){
    Route::post('login', [App\Http\Controllers\Api\Auth\LoginController::class,'login']); 

});
    

// Route::group(['middleware' => ['auth:api','scope:root,admin,cliente']], function(){
   
    Route::get('productos',[ProductoController::class, 'getProducto']);
    Route::get('productos/{id}',[ProductoController::class, 'showProducto']);

    Route::resource('subCategoria',SubcategoriaController::class);

    //Route::resource('producto',ProductoController::class);

    Route::resource('favoritos',FavoritoController::class);

    
    Route::resource("user", UserController::class);
    Route::get('user/{id}',[UserController::class, 'show']);

    //Route::get("logout", LoginController::class,'logout');
//});
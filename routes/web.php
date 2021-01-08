<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
// Route::update('updatepassword','UserController@updatepassword');
Route::post('store1','UserController@store1')->name('user.store1');
Route::resource('user', 'UserController');

Route::middleware(['auth'])->group(function () {
Route::put('user/{user}/updatepassword','UserController@updatepassword')->name('user.updatepassword');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('profile','UserController@index1')->name('profile');    

Route::resource('categoria', 'CategoriaController');
Route::resource('sub-categoria', 'SubcategoriaController');
Route::resource('favoritos', 'FavoritoController');
Route::resource('productos', 'ProductoController');    
});

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
Route::get('download/{file}','PedidoController@download')->name('download'); 

Route::middleware(['auth'] )->group(function () {
Route::put('user/{user}/convertVendedor','UserController@convertVendedor')->name('user.convertVendedor');
Route::put('user/{user}/updatepassword','UserController@updatepassword')->name('user.updatepassword');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/importadoras', 'UserController@importadoras')->name('importadoras');
Route::get('/vendedores', 'UserController@vendedores')->name('vendedores');
Route::get('profile','UserController@index1')->name('profile'); 
Route::get('mis-productos','ProductoController@misProductos')->name('mis-productos'); 
Route::get('viewHistorialCotizaciones','PedidoController@getMisCotizacionesConfirmadas')->name('viewHistorialCotizaciones'); 

#Registros para admin
Route::get('viewRegisUsuario','UserController@viewRegisUsuario')->name('user.viewRegisUsuario'); 
Route::get('viewRegisEmpresa','UserController@viewRegisEmpresa')->name('user.viewRegisEmpresa'); 
Route::get('index','PedidoController@index')->name('pedido'); 
Route::get('viewRegisVendedor','UserController@viewRegisVendedor')->name('user.viewRegisVendedor'); 

Route::put('user/{user}/subscripcion','UserController@subscripcion')->name('user.subscripcion'); 
Route::put('producto/{producto}/addNovedad','ProductoController@addNovedad')->name('producto.addNovedad'); 

Route::resource('categoria', 'CategoriaController');
Route::resource('sub-categoria', 'SubcategoriaController');
Route::resource('favoritos', 'FavoritoController');
Route::resource('productos', 'ProductoController');    
Route::resource('novedad', 'NovedadController');
Route::resource('suscripcion', 'SubscripcionController');
Route::resource('pedido', 'PedidoController');
Route::resource('pedidoRealizado', 'PedidoRealizadoController');
Route::resource('carritoDetalle', 'CarritoDetalleController');
Route::resource('carrito', 'CarritoController');
Route::resource('contacto', 'ContactanoController');

});
Route::get('images/{filename}', function ($filename)
{
    $file = \Illuminate\Support\Facades\Storage::get($filename);
    return response($file, 200)->header('Content-Type', 'image/jpeg');
});

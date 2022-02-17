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
Route::get('downloads/{file}','PedidoController@download')->name('downloads');

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
Route::get('cortadoraPerfil','CortadoraController@cortadoraPerfil')->name('cortadora.cortadoraPerfil'); 
Route::get('cortadoraInfoGeneral/{id}','CortadoraController@cortadoraInfoGeneral')->name('cortadora.cortadoraInfoGeneral'); 
Route::get('cortadoraInfoVentanas/{id}','CortadoraController@cortadoraInfoVentanas')->name('cortadora.cortadoraInfoVentanas'); 
Route::get('cotizadorCortadoraPerfil/{id}','CortadoraController@cotizacion')->name('cotizacion.cotizacion'); 
Route::get('precioEditCortadora/{id}','CortadoraController@precioEditCortadora')->name('precioEditCortadora.precioEditCortadora'); 
Route::get('confirmacionBlade/{id}','BarraController@confirmacionBlade')->name('cortadora.confirmacionBlade'); 

Route::put('user/{user}/subscripcion','UserController@subscripcion')->name('user.subscripcion'); 
Route::put('producto/{producto}/addNovedad','ProductoController@addNovedad')->name('producto.addNovedad');
Route::put('updateHojaPerfil/{id}/','CortadoraController@updateHojaPerfil')->name('hojaPerfil.updateHojaPerfil');
Route::put('updatePerfil/{id}/','PerfilController@updatePerfil')->name('perfil.updatePerfil');
Route::delete('destroyHojaPerfil/{id}','CortadoraController@destroyHojaPerfil')->name('cortadora.destroyHojaPerfil');

Route::resource('user', 'UserController');
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
Route::resource('cortadora', 'CortadoraController');
Route::resource('hojaCalculo', 'HojaCalculoController');
Route::resource('perfil', 'PerfilController');
Route::resource('barra', 'BarraController');
Route::resource('corte', 'CorteController');

});
Route::get('images/{filename}', function ($filename)
{
    $file = \Illuminate\Support\Facades\Storage::get($filename);
    return response($file, 200)->header('Content-Type', 'image/jpeg');
});

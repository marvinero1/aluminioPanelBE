<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Categoria;
use App\Producto;
use App\User;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PedidoRealizadoController;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\CalculadoraHistorialController;
use App\Http\Controllers\CarritoDetalleController;
use App\Http\Controllers\ContactanoController;
use App\Http\Controllers\HojaCalculoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\CortadoraController;
use App\Http\Controllers\PerfilController;

//use App\Http\Controllers\Api\Auth\LoginController;

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

Auth::routes();

Route::post('login', 'UserController@login'); //ESTE FUNCIONA
Route::get("logout", 'UserController@logout');


Route::group(['middleware' => ['auth:api']], function(){
  
//  Route::post('login', [App\Http\Controllers\Api\Auth\LoginController::class,'login']);



});
    Route::put('actualizarCalculo/{id}', [CalculadoraHistorialController::class,'actualizarCalculo']);  
    Route::put('updateStatusCart/{id}', [CarritoController::class,'updateStatusCart']);  
    Route::put('updateStatusHoja/{id}', [HojaCalculoController::class,'updateStatusHoja']);  
    Route::put('updateStatusHojaCortadora/{id}', [CortadoraController::class,'updateStatusHojaCortadora']);  
    Route::put('updatepasswordIonic/{id}', [UserController::class,'updatepasswordIonic']);  
    
    Route::get('productos',[ProductoController::class, 'getProducto']);
    Route::get('getSubCategoria',[CategoriaController::class, 'getSubCategoria']);
    Route::get('calculos/{id}/{hoja_id}',[CalculadoraController::class, 'calculos']);
    Route::get('productosNovedad',[ProductoController::class, 'getProductoNovedad']);
    Route::get('favoritos/{id}',[FavoritoController::class, 'getFavoritos']);
    Route::get('importadoras',[UserController::class, 'getImportadora']);
    Route::get('getPedido',[CarritoController::class, 'getPedido']);
    Route::get('getPedidoRealizado',[PedidoRealizadoController::class, 'getPedidoRealizado']);
    Route::get('carritoProductos',[CarritoDetalleController::class, 'carritoProductos']);
    Route::get('carritoProductosIonic/{id}',[CarritoDetalleController::class, 'carritoProductosIonic']);
    Route::get('usuariosStorage/{id}',[UserController::class, 'usuariosStorage']);

    Route::get('productos/{id}',[ProductoController::class, 'showProducto']);
    Route::get('misProductos',[ProductoController::class, 'misProductos']);
    Route::get('getcontactos','ContactanoController@getContactosIonic')->name('getcontactos'); 
    Route::get('historialCalculos/{id}',[CalculadoraHistorialController::class, 'historialCalculos']);
    Route::get('getMyProducts/{id}', [ProductoController::class,'getMyProducts']); 
    Route::get('getMyProducto/{id}', [ProductoController::class,'getMyProducto']); 
    Route::get('getCartAttribute/{id}', [CarritoController::class,'getCartAttribute']); 
    Route::get('getHojaCalculo/{id}', [HojaCalculoController::class,'getHojaCalculo']); 
    Route::get('getHojaCalculoPerfil/{id}', [HojaCalculoController::class,'getHojaCalculoPerfil']);
    Route::get('getMisCotizaciones/{id}', [PedidoController::class,'getMisCotizaciones']); 
    Route::get('getHistorialCalculos/{id}', [PerfilController::class,'getHistorialCalculos']); 
    Route::get('downloads/{file}','PedidoController@download')->name('downloads');

    Route::delete('favoritoDelete/{id}/', [FavoritoController::class, 'delete']);
    Route::delete('pedidoDelete/{id}/', [CarritoController::class, 'delete']);
    Route::delete('carritoDelete/{id}/', [CarritoController::class, 'carritoDelete']);
    Route::delete('calculadoraDelete/{id}/', [CalculadoraController::class, 'calculadoraDelete']);
    Route::delete('calculadoraDeleteAll/{id}', [CalculadoraController::class, 'calculadoraDeleteAll']);
    Route::delete('calculadoraHistorialDelete/{id}/', [CalculadoraHistorialController::class,'calculadoraHistorialDelete']);
    Route::delete('deleteProductoCarrito/{id}/', [CarritoDetalleController::class,'deleteProductoCarrito']);
    
    Route::post('guardarPedido',[CarritoDetalleController::class, 'guardarPedido']);
    Route::post('guardarCarrito',[CarritoController::class, 'guardarCarrito']);
    Route::post('guardarPedidoRealizado',[PedidoRealizadoController::class, 'guardarPedidoRealizado']);
    Route::post('guardarCalculadora',[CalculadoraController::class, 'guardarCalculadora']);
    Route::post('guardarCalculadoraHistorial',[CalculadoraHistorialController::class, 'guardarCalculadoraHistorial']);
    Route::post('guardarFavorito',[FavoritoController::class, 'guardarFavorito']);
    Route::post('guardarHoja',[HojaCalculoController::class, 'guardarHoja']);
    Route::post('guardarHojaCortadoraPerfil',[HojaCalculoController::class, 'guardarHojaCortadoraPerfil']);
    Route::post('guardarCombinacion',[HojaCalculoController::class, 'guardarCombinacion']);
    

    //Route get contactos
    Route::get('contactgetLPZ',[ContactanoController::class, 'contactgetLPZ']);
    Route::get('contactgetCBBA',[ContactanoController::class, 'contactgetCBBA']);
    Route::get('contactgetSTCZ',[ContactanoController::class, 'contactgetSTCZ']);
    Route::get('contactgetOR',[ContactanoController::class, 'contactgetOR']);
    Route::get('contactgetPOT',[ContactanoController::class, 'contactgetPOT']);
    Route::get('contactgetSUC',[ContactanoController::class, 'contactgetSUC']);
    Route::get('contactgetTAR',[ContactanoController::class, 'contactgetTAR']);
    Route::get('contactgetBENI',[ContactanoController::class, 'contactgetBENI']);
    Route::get('contactgetPANDO',[ContactanoController::class, 'contactgetPANDO']);

<?php

namespace App\Http\Controllers;

use App\Carrito;
use App\carrito_detalle;
use DB;
use Session;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function getCartAttribute(Request $request, $id){
        $carrito = Carrito::where('estado','false')
        ->where('carritos.user_id', '=', $id)
        ->first();

        return response()->json($carrito, 201);
    }

    public function guardarCarrito(Request $request){
        $carrito = Carrito::create($request->all());
        return response()->json($carrito, 200);
    }

    public function getPedido(){
        $carrito = Carrito::orderBy('importadora', 'asc')->where('estado','false')->first();
         return response()->json($carrito, 200);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(Carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
   
        $mensaje = "Cotizacion Confirmada Exitosamente!!!";

        $carrito = Carrito::findOrFail($id);
        $carrito->update($request->all());

        if($carrito){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
        return redirect()->route('pedido.index'); 
    }

    public function updateStatusCart(Request $request, $id)
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->update($request->all());

        return response()->json($carrito, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrito $carrito)
    {
        //
    }

    public function delete($id){
        $carrito = Carrito::findOrFail($id);

        $carrito->delete();

        return response()->json($carrito, 200); 
    }

    public function carritoDelete($id){
        $carrito = Carrito::findOrFail($id);
        $carrito->delete();
        return response()->json($carrito, 200); 
    }
}

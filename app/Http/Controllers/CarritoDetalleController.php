<?php

namespace App\Http\Controllers;

use App\carrito_detalle;
use App\Carrito;
use Illuminate\Http\Request;

class CarritoDetalleController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function guardarPedido(Request $request)
    {
        $carrito_detalle = carrito_detalle::create($request->all());
        return response()->json($carrito_detalle, 201);
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
     * @param  \App\carrito_detalle  $carrito_detalle
     * @return \Illuminate\Http\Response
     */
    public function show(carrito_detalle $carrito_detalle, $id)
    {
        $carrito = Carrito::find($id);
        $carrito_detalle = carrito_detalle::where('carrito_detalles.carro_id','=', $id)->get();

        //dd($carrito_detalle);
        return view('pedidos.show', compact('carrito_detalle','carrito')); 
    }

    public function carritoProductos(carrito_detalle $carrito_detalle, $id)
    {
        $carrito = Carrito::find($id)->first();
        $carrito_detalle = carrito_detalle::where('carrito_detalles.carro_id','=', $id)->get();

        //dd($carrito_detalle);
        return view('pedidos.show', compact('carrito_detalle','carrito')); 
    }

    public function carritoProductosIonic(carrito_detalle $carrito_detalle, $id)
    {
        $carrito = Carrito::find($id)->first();
        $carrito_detalle = carrito_detalle::where('carrito_detalles.carro_id','=', $id)->get();

        //dd($carrito_detalle);
        return response()->json($carrito_detalle, 201);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\carrito_detalle  $carrito_detalle
     * @return \Illuminate\Http\Response
     */
    public function edit(carrito_detalle $carrito_detalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\carrito_detalle  $carrito_detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carrito_detalle $carrito_detalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\carrito_detalle  $carrito_detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(carrito_detalle $carrito_detalle)
    {
        //
    }

    public function deleteProductoCarrito($id)
    {
         $carrito_detalle = carrito_detalle::findOrFail($id);

        $carrito_detalle->delete();

        return response()->json($carrito_detalle, 200);    }
}

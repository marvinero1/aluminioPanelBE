<?php

namespace App\Http\Controllers;

use App\carrito_detalle;
use App\Carrito;
use DB;
use Session;
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

        $tamanio = count($carrito_detalle);

        $totalTotal = 0;
        foreach($carrito_detalle as $carrito_detalles){

            $total = $carrito_detalles->precio * $carrito_detalles->cantidad_pedido;

            $totalTotal +=  $total;

        }
        //dd($tamanio); 
        return view('pedidos.show', compact('carrito_detalle','carrito','tamanio', 'total','totalTotal')); 
    }


    public function carritoProductos(carrito_detalle $carrito_detalle, $id)
    {
        $carrito = Carrito::find($id)->first();
        $carrito_detalle = carrito_detalle::where('carrito_detalles.carro_id','=', $id)->get(); 

        foreach($carrito_detalles as $carrito_detalle){
        $total = $carrito_detalles->cantidad_pedido * $carrito_detalles->precio;
        }

        //dd($carrito_detalle);
        return view('pedidos.show', compact('carrito_detalle','carrito','total')); 
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
    public function edit($id){

        $carrito = Carrito::find($id);
        $carrito_detalle = carrito_detalle::where('carrito_detalles.carro_id','=', $id)->get();

        return view('pedidos.edit', compact('carrito_detalle','carrito')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\carrito_detalle  $carrito_detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  dd($request);
        $mensaje = "Precio Unitario Editado Exitosamente!!!";

        $carrito_detalle = carrito_detalle::findOrFail($id);
        $carrito_detalle->update($request->all());

        if($carrito_detalle){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
        return back()->withInput();
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

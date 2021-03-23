<?php

namespace App\Http\Controllers;

use App\PedidoRealizado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoRealizadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('buscarpor');

        $pedidoRealizado = PedidoRealizado::where('nombre','like',"%$nombre%")
        ->where('pedido_realizados.importadora', '=', Auth::user()->name)->get();
         
        //dd( $producto );
        return view('pedidosRealizados.index', compact('pedidoRealizado'));
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

    public function guardarPedidoRealizado(Request $request)
    {
        $pedidoRealizado = PedidoRealizado::create($request->all());
        return response()->json($pedidoRealizado, 201);
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
     * @param  \App\PedidoRealizado  $pedidoRealizado
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoRealizado $pedidoRealizado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PedidoRealizado  $pedidoRealizado
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoRealizado $pedidoRealizado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PedidoRealizado  $pedidoRealizado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoRealizado $pedidoRealizado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PedidoRealizado  $pedidoRealizado
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoRealizado $pedidoRealizado)
    {
        //
    }
}

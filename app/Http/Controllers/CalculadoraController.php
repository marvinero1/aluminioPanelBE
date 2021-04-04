<?php

namespace App\Http\Controllers;

use App\calculadora;
use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calculos()
    {
        return calculadora::orderBy('nombre', 'asc')->get();
    }

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
     * @param  \App\calculadora  $calculadora
     * @return \Illuminate\Http\Response
     */
    public function show(calculadora $calculadora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\calculadora  $calculadora
     * @return \Illuminate\Http\Response
     */
    public function edit(calculadora $calculadora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\calculadora  $calculadora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calculadora $calculadora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\calculadora  $calculadora
     * @return \Illuminate\Http\Response
     */
    public function destroy(calculadora $calculadora)
    {
        //
    }

    public function guardarCalculadora(Request $request)
    {
        
        $calculadora = calculadora::create($request->all());
        return response()->json($calculadora, 201);
    }
}

<?php

namespace App\Http\Controllers;

use App\calculadoraHistorial;
use Illuminate\Http\Request;

class CalculadoraHistorialController extends Controller
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

    

    public function historialCalculos(Request $request, $id)
    {
        $calculadoraHistorial = calculadoraHistorial::where('calculadora_historials.user_id', '=', $id)
        ->orderBy('created_at','desc')
        ->get();

        return response()->json($calculadoraHistorial, 200);
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

    public function guardarCalculadoraHistorial(Request $request)
    {
        $calculadoraHistorial = calculadoraHistorial::create($request->all());
        return response()->json($calculadoraHistorial, 201);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\calculadoraHistorial  $calculadoraHistorial
     * @return \Illuminate\Http\Response
     */
    public function show(calculadoraHistorial $calculadoraHistorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\calculadoraHistorial  $calculadoraHistorial
     * @return \Illuminate\Http\Response
     */
    public function edit(calculadoraHistorial $calculadoraHistorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\calculadoraHistorial  $calculadoraHistorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, calculadoraHistorial $calculadoraHistorial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\calculadoraHistorial  $calculadoraHistorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(calculadoraHistorial $calculadoraHistorial)
    {
        //
    }

    public function actualizarCalculo(Request $request, $id){
        
        $calculadoraHistorial = calculadoraHistorial::findOrFail($id);
        $calculadoraHistorial->update($request->all());

        return response()->json($calculadoraHistorial, 200);
    }


    public function calculadoraHistorialDelete($id)
    {
        $calculadoraHistorial = calculadoraHistorial::findOrFail($id);

        $calculadoraHistorial->delete();

        return response()->json($calculadoraHistorial, 200);     
    }

    public function calculadoraHistorialUpdate($id){
        $calculadoraHistorial = calculadoraHistorial::findOrFail($id);

        $calculadoraHistorial->update();

        return response()->json($calculadoraHistorial, 200); 
    }
    
}

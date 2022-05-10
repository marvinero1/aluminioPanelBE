<?php

namespace App\Http\Controllers;

use App\CalculoVidrio;
use App\HojaVidrio;
use Illuminate\Http\Request;

class CalculoVidrioController extends Controller
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

    public function calculosVidrio(Request $request, $id, $hoja_id){
        $calculoVidrio = CalculoVidrio::where('calculo_vidrios.user_id', '=', $id)
        ->where('calculo_vidrios.hoja_calculo_id', '=', $hoja_id)
        ->get();

        return response()->json($calculoVidrio, 200);
    }

    public function establecerGrafico($hoja_id){ 
        $calculoVidrio = CalculoVidrio::where('calculo_vidrios.hoja_calculo_id', '=', $hoja_id)
        ->get();

        $hojaVidrio = HojaVidrio::findOrFail($hoja_id)
        ->get();

        return view('vidrios.grafico', ['calculoVidrio' => $calculoVidrio, 'hojaVidrio'=>$hojaVidrio]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
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

    public function guardarCalculadoraVidrio(Request $request){
        $calculoVidrio = CalculoVidrio::create($request->all());
        return response()->json($calculoVidrio, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CalculoVidrio  $calculoVidrio
     * @return \Illuminate\Http\Response
     */
    public function show(CalculoVidrio $calculoVidrio){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CalculoVidrio  $calculoVidrio
     * @return \Illuminate\Http\Response
     */
    public function edit(CalculoVidrio $calculoVidrio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CalculoVidrio  $calculoVidrio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalculoVidrio $calculoVidrio){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CalculoVidrio  $calculoVidrio
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalculoVidrio $calculoVidrio){
        //
    }

    public function calculadoraDeleteVidrio($id){
        $calculoVidrio = CalculoVidrio::findOrFail($id);
        $calculoVidrio->delete();
        return response()->json($calculoVidrio, 200); 
    }
}
